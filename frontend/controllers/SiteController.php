<?php
namespace frontend\controllers;

use common\models\Cart;
use common\models\CartProduct;
use common\models\Order;
use common\models\OrderProduct;
use common\models\Product;
use common\models\Type;
use common\models\User;
use common\models\UserInfo;
use frontend\models\SearchForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * @return string
     */
    public function actionCart()
    {
        $query = Cart::find();
        if (!Yii::$app->user->isGuest){
           $cart = $query->where(['user_id' => Yii::$app->user->id])->one();
        }else{
           $cart = $query->where(['user_ip' => Yii::$app->request->userIP])->one();
        }

        if (($user_info = UserInfo::findOne(['user_id' => Yii::$app->user->id])) === null){
            $user_info = new UserInfo();
            $user_info->user_id = Yii::$app->user->id;
            $user_info->save();
        }

        return $this->render('cart', [
            'cart' => $cart,
            'user_info' => $user_info,
        ]);
    }

    public function actionAddToCart()
    {
        if (Yii::$app->request->post()) {
            $id = Yii::$app->request->post('product');
            if (!Yii::$app->user->isGuest) {
                if (($cart = Cart::find()->where(['user_id' => Yii::$app->user->id])->one()) !== null) {
                    $cartProduct = new CartProduct();
                    $cartProduct->product_id = $id;
                    $cartProduct->cart_id = $cart->id;
                    $cartProduct->save();
                } else {
                    $cart = new Cart();
                    $cart->user_id = Yii::$app->user->id;
                    if ($cart->save()) {
                        $cartProduct = new CartProduct();
                        $cartProduct->product_id = $id;
                        $cartProduct->cart_id = $cart->id;
                        $cartProduct->save();
                    }
                }
            } else {
                if (($cart = Cart::find()->where(['user_ip' => Yii::$app->request->userIP])->one()) !== null) {
                    $cartProduct = new CartProduct();
                    $cartProduct->product_id = $id;
                    $cartProduct->cart_id = $cart->id;
                    $cartProduct->save();
                } else {
                    $cart = new Cart();
                    $cart->user_ip = Yii::$app->request->userIP;
                    if ($cart->save()) {
                        $cartProduct = new CartProduct();
                        $cartProduct->product_id = $id;
                        $cartProduct->cart_id = $cart->id;
                        $cartProduct->save();
                    }
                }
            }
        }
            return $this->redirect(['site/index']);
    }

    public function actionDeleteFromCart($id)
    {
        if (($cartProduct = CartProduct::findOne($id)) !== null){
            $cartProduct->delete();
        }else{
            throw new NotFoundHttpException();
        }
        return $this->redirect(['site/cart']);
    }

    public function actionOrder()
    {

        $model = new Order();
        if (!Yii::$app->user->isGuest) {
            if (($user_info = UserInfo::findOne(['user_id' => Yii::$app->user->id])) !== null) {
                $model->user_id = Yii::$app->user->id;
                $model->last_name = $user_info->last_name;
                $model->first_name = $user_info->first_name;
                $model->phone = $user_info->phone;
                $model->email = User::findIdentity(Yii::$app->user->id)->email;
            }
        }else{
            $model->user_ip = Yii::$app->request->userIP;
        }
        if($model->load(Yii::$app->request->post())){
            $model->status = Order::STATUS_CONFIRMED;
            if($model->save()){
                if (!Yii::$app->user->isGuest){
                    $cart = Cart::findOne(['user_id' => Yii::$app->user->id]);
                }else{
                    $cart = Cart::findOne(['user_ip' => Yii::$app->request->userIP]);
                }
                foreach ($cart->cartProducts as $cartProduct){
                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id = $model->id;
                    $orderProduct->product_id = $cartProduct->product_id;
                    $orderProduct->save();
                }

                return $this->render('order_confirm', [
                    'order' => $model,
                ]);
            }
        }

        return $this->render('order', [
            'model' => $model,
        ]);
    }

    public function actionOrderConfirm()
    {
        if (Yii::$app->request->post()) {
            if (!Yii::$app->user->isGuest) {
                if (($order = Order::findOne(['user_id' => Yii::$app->user->id])) !== null) {
                    $order->status = Order::STATUS_ORDER;
                    if ($order->save()) {
                        $cart = Cart::findOne(['user_id' => Yii::$app->user->id]);
                    }
                }
            } else {
                if (($order = Order::findOne(['user_ip' => Yii::$app->request->userIP])) !== null) {
                    $order->status = Order::STATUS_ORDER;
                    if ($order->save()) {
                        $cart = Cart::findOne(['user_ip' => Yii::$app->request->userIP]);
                    }
                }
            }
            if ($cart !== null) {
                foreach ($cart->cartProducts as $cartProduct) {
                    $cartProduct->delete();
                }
                $cart->delete();
            }
            $order->sendEmail();
            return $this->goHome();
        }else{
            throw new NotFoundHttpException();
        }
    }


    public function actionCategory($id)
    {
        $models = $this->findProductsByCategory($id);

        return $this->render('type', [
            'models' => $models,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionType($id)
    {
        $models = $this->findProductsByType($id);

        return $this->render('type', [
            'models' => $models,
            'type' => Type::findOne($id),
        ]);
    }


    /**
     * @param $id
     * @return string
     */
    public function actionProduct($id)
    {
        $model = $this->findProduct($id);

        return $this->render('product', [
           'model' => $model,
        ]);
    }

    public function actionUpdateUserInfo()
    {
       if (($model = UserInfo::findOne(['user_id' => Yii::$app->user->id])) === null){
           $model = new UserInfo();
           $model->user_id = Yii::$app->user->id;
       }

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['site/cart']);
        } else {
            return $this->render('update_user_info', [
                'model' => $model,
            ]);
        }
    }

    public function actionSearch()
    {
        $model = new SearchForm();

        if($model->load(Yii::$app->request->post())){

            return $this->render('search', [
               'products' => $model->searchResults(),
            ]);
        }else{
            return $this->goHome();
        }
    }

    protected function findProduct($id)
    {
        if (($model = Product::findOne($id)) !== null){
            return $model;
        } else {
          throw new NotFoundHttpException('Продукт не найден');
        }
    }

    protected function findProductsByType($id)
    {
        if (($model = Product::findAll(['type_id' => $id])) !== null){
            return $model;
        }else{
            throw new NotFoundHttpException('Нет продуктов в даной категории');
        }
    }

    protected function findProductsByCategory($id)
    {
        if (($model = Product::findAll(['category_id' => $id])) !== null){
            return $model;
        }else {
            throw new NotFoundHttpException('Нет продуктов в категории');
        }
    }

}

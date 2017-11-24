<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $user_ip
 * @property integer $status
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $region
 * @property string $city
 * @property string $address
 * @property string $index
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OrderProduct[] $orderProducts
 */
class Order extends \yii\db\ActiveRecord
{

    const STATUS_CONFIRMED = 1;
    const STATUS_ORDER = 2;
    const STATUS_CLOSED = 3;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name', 'email', 'phone'], 'required'],
            [['first_name', 'last_name', 'email', 'phone', 'region', 'city', 'address', 'user_ip'], 'string', 'max' => 255],
            [['index'], 'string', 'max' => 16],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_ip' => 'User_IP',
            'status' => 'Status',
            'first_name' => 'Имя*',
            'last_name' => 'Фамилия*',
            'email' => 'Email*',
            'phone' => 'Телефон*',
            'region' => 'Регион',
            'city' => 'Город',
            'address' => 'Адрес',
            'index' => 'Индекс',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::className(), ['order_id' => 'id']);
    }

    /**
     * @return float|int
     */
    public function getOrderPrice()
    {
        $price = 0;
        foreach ($this->orderProducts as $orderProduct){
            $price = $price + $orderProduct->product->price;
        }
        return $price;
    }

    public function sendEmail()
    {
        return Yii::$app
            ->mailer_order
            ->compose(
                ['html' => 'order-html', 'text' => 'order-text'],
                ['id' => $this->id]
            )
            ->setFrom([Yii::$app->params['orderEmail'] => Yii::$app->name . ' robot'])
            ->setTo('zakaz.c-tim.corp@yandex.ru')
            ->setSubject('New order in ' . Yii::$app->name)
            ->send();
    }
}

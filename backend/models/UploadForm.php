<?php


namespace backend\models;


use common\models\Image;
use common\models\NewsPromotion;
use common\models\NewsPromotionImage;
use common\models\ProductImage;
use common\models\SliderImage;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Product;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    public $productId;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['productId'], 'integer'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $product = Product::findOne($this->productId);
                if (!isset($product->productImages[0]->image)){
                    $image = new Image();
                }else{
                    $image = $product->productImages[0]->image;
                }
                $path = '../uploads/product/' . $file->baseName . time(). '.' . $file->extension;
                $file->saveAs($path);
                $image->src = $path;
                if ($image->save()){
                    $productImage = new ProductImage();
                    $productImage->product_id = $this->productId;
                    $productImage->image_id = $image->id;
                    $productImage->save();
                }
            }
            return true;
        } else {
            return false;
        }
    }
    public function uploadSlider()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $image = new Image();
                $path = '../uploads/slider/' . $file->baseName . time(). '.' . $file->extension;
                $file->saveAs($path);
                $image->src = $path;
                if ($image->save()){
                    $productImage = new SliderImage();
                    $productImage->slider_id = $this->productId;
                    $productImage->image_id = $image->id;
                    $productImage->save();
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function uploadNewsPromotion()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $product = NewsPromotion::findOne($this->productId);
                if (!isset($product->productImages[0]->image)){
                    $image = new NewsPromotionImage();
                    $image->news_promotion_id = $product->id;
                }else{
                    $image = $product->newsPromotionImage->src;
                }
                $path = '../uploads/news_promotion/' . $file->baseName . time(). '.' . $file->extension;
                $file->saveAs($path);
                $image->src = $path;
                $image->save();
            }
            return true;
        } else {
            return false;
        }
    }
}
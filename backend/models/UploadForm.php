<?php


namespace backend\models;


use common\models\Image;
use common\models\ProductImage;
use common\models\SliderImage;
use yii\base\Model;
use yii\web\UploadedFile;

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
                $image = new Image();
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
                $path = 'uploads/slider/' . $file->baseName . time(). '.' . $file->extension;
                $file->saveAs('../../frontend/web/'.$path);
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
}
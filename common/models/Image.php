<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $src
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ProductImage[] $productImages
 * @property Slider[] $sliders
 */
class Image extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['src'], 'string', 'max' => 255],
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
            'src' => 'Src',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['image_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliders()
    {
        return $this->hasMany(Slider::className(), ['image_id' => 'id']);
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $imageFile){
                $path = 'uploads/' . $imageFile->baseName . '.' . $imageFile->extension;
                $imageFile->saveAs($path);
                $this->src = $path;
                $this->save();
            }
            return true;
        } else {
            return false;
        }
    }
}

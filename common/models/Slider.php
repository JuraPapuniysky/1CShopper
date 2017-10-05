<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $num
 *
 * @property SliderImage[] $sliderImages
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'num'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['num'], 'unique'],
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
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'num' => 'Num',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderImages()
    {
        return $this->hasMany(SliderImage::className(), ['slider_id' => 'id']);
    }
}

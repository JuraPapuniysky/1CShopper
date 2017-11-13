<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "news_promotion".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property NewsPromotionImage $newsPromotionImage
 */
class NewsPromotion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_promotion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsPromotionImage()
    {
        return $this->hasOne(NewsPromotionImage::className(), ['news_promotion_id' => 'id']);
    }

    public function beforeDelete()
    {
        $this->newsPromotionImage->delete();
        return parent::beforeDelete();
    }
}

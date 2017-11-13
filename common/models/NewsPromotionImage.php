<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_promotion_image".
 *
 * @property integer $id
 * @property integer $news_promotion_id
 * @property string $src
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property NewsPromotion $newsPromotion
 */
class NewsPromotionImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_promotion_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_promotion_id'], 'required'],
            [['news_promotion_id', 'created_at', 'updated_at'], 'integer'],
            [['src'], 'string', 'max' => 255],
            [['news_promotion_id'], 'unique'],
            [['news_promotion_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsPromotion::className(), 'targetAttribute' => ['news_promotion_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_promotion_id' => 'News Promotion ID',
            'src' => 'Src',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsPromotion()
    {
        return $this->hasOne(NewsPromotion::className(), ['id' => 'news_promotion_id']);
    }
}

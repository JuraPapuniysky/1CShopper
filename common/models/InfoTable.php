<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "info_table".
 *
 * @property integer $id
 * @property string $main_phone
 * @property string $phone1
 * @property string $phone2
 * @property string $email
 * @property string $city
 */
class InfoTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_phone', 'phone1', 'phone2', 'email', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_phone' => 'Main Phone',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'email' => 'Email',
            'city' => 'City',
        ];
    }
}

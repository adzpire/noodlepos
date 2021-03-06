<?php

namespace frontend\modules\noodlepos\models;

use Yii;

/**
 * This is the model class for table "noodle_type".
 *
 * @property integer $id
 * @property string $name
 */
class NoodleType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noodle_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อ',
        ];
    }
}

<?php

namespace frontend\modules\noodlepos\models;

use Yii;

/**
 * This is the model class for table "noodle_addon".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cost
 */
class NoodleAddon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noodle_addon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cost'], 'required'],
            [['cost'], 'integer'],
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
            'cost' => 'ราคา',
        ];
    }
}

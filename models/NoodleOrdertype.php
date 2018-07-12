<?php

namespace frontend\modules\noodlepos\models;

use Yii;

/**
 * This is the model class for table "noodle_ordertype".
 *
 * @property integer $id
 * @property string $name
 *
 * @property NoodleOrder[] $noodleOrders
 */
class NoodleOrdertype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noodle_ordertype';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoodleOrders()
    {
        return $this->hasMany(NoodleOrder::className(), ['status' => 'id']);
    }
}

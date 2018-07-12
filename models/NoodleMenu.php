<?php

namespace frontend\modules\noodlepos\models;

use Yii;

/**
 * This is the model class for table "noodle_menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $cost
 *
 * @property NoodleOrderdetail[] $noodleOrderdetails
 */
class NoodleMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noodle_menu';
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoodleOrderdetails()
    {
        return $this->hasMany(NoodleOrderdetail::className(), ['menuid' => 'id']);
    }
}

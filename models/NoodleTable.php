<?php

namespace frontend\modules\noodlepos\models;

use Yii;

/**
 * This is the model class for table "noodle_table".
 *
 * @property integer $id
 * @property string $name
 * @property integer $num
 *
 * @property NoodleOrderdetail[] $noodleOrderdetails
 */
class NoodleTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noodle_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'num'], 'required'],
            [['num'], 'integer'],
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
            'num' => 'หมายเลข',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoodleOrderdetails()
    {
        return $this->hasMany(NoodleOrderdetail::className(), ['tableid' => 'id']);
    }
}

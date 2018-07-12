<?php

namespace frontend\modules\noodlepos\models;

use Yii;

/**
 * This is the model class for table "noodle_order".
 *
 * @property integer $id
 * @property integer $userid
 * @property string $datetime
 * @property integer $status
 * @property integer $total
 *
 * @property NoodleUser $user
 * @property NoodleOrdertype $status0
 * @property NoodleOrderdetail[] $noodleOrderdetails
 */
class NoodleOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noodle_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'datetime', 'status', 'total'], 'required'],
            [['userid', 'status', 'total'], 'integer'],
            [['datetime'], 'safe'],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => NoodleUser::className(), 'targetAttribute' => ['userid' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => NoodleOrdertype::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'ผู้ใช้',
            'datetime' => 'วันเวลา',
            'status' => 'สถานะ',
            'total' => 'ราคารวม',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(NoodleUser::className(), ['id' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(NoodleOrdertype::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoodleOrderdetails()
    {
        return $this->hasMany(NoodleOrderdetail::className(), ['orderid' => 'id']);
    }
}

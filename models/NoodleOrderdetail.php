<?php

namespace frontend\modules\noodlepos\models;

use Yii;

/**
 * This is the model class for table "noodle_orderdetail".
 *
 * @property integer $id
 * @property integer $orderid
 * @property integer $menuid
 * @property string $noodletype
 * @property string $addons
 * @property integer $tableid
 * @property integer $price
 * @property string $note
 *
 * @property NoodleOrder $order
 * @property NoodleMenu $menu
 * @property NoodleTable $table
 */
class NoodleOrderdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noodle_orderdetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderid', 'menuid', 'tableid', 'price', 'note'], 'required'],
            [['orderid', 'menuid', 'tableid', 'price'], 'integer'],
            [['note'], 'string'],
            [['noodletype', 'addons'], 'string', 'max' => 255],
            [['orderid'], 'exist', 'skipOnError' => true, 'targetClass' => NoodleOrder::className(), 'targetAttribute' => ['orderid' => 'id']],
            [['menuid'], 'exist', 'skipOnError' => true, 'targetClass' => NoodleMenu::className(), 'targetAttribute' => ['menuid' => 'id']],
            [['tableid'], 'exist', 'skipOnError' => true, 'targetClass' => NoodleTable::className(), 'targetAttribute' => ['tableid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderid' => 'รายการซื้อ',
            'menuid' => 'เมนู',
            'noodletype' => 'เส้น',
            'addons' => 'เพิ่มพิเศษ',
            'tableid' => 'โต็ะ',
            'price' => 'ราคา',
            'note' => 'หมายเหตุ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(NoodleOrder::className(), ['id' => 'orderid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(NoodleMenu::className(), ['id' => 'menuid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTable()
    {
        return $this->hasOne(NoodleTable::className(), ['id' => 'tableid']);
    }
}

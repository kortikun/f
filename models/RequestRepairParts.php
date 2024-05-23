<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request_repair_parts".
 *
 * @property int $id
 * @property float $price
 * @property int $count
 * @property int $request_id
 * @property int $repair_parts_id
 *
 * @property RepairParts $repairParts
 * @property Request $request
 */
class RequestRepairParts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_repair_parts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'count', 'request_id', 'repair_parts_id'], 'required'],
            [['price'], 'number'],
            [['count', 'request_id', 'repair_parts_id'], 'integer'],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::class, 'targetAttribute' => ['request_id' => 'id']],
            [['repair_parts_id'], 'exist', 'skipOnError' => true, 'targetClass' => RepairParts::class, 'targetAttribute' => ['repair_parts_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'count' => 'Count',
            'request_id' => 'Request ID',
            'repair_parts_id' => 'Repair Parts ID',
        ];
    }

    /**
     * Gets query for [[RepairParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRepairParts()
    {
        return $this->hasOne(RepairParts::class, ['id' => 'repair_parts_id']);
    }

    /**
     * Gets query for [[Request]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::class, ['id' => 'request_id']);
    }
}

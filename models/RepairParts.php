<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "repair_parts".
 *
 * @property int $id
 * @property int $name
 * @property int $count
 *
 * @property RequestRepairParts[] $requestRepairParts
 */
class RepairParts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'repair_parts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'count'], 'required'],
            [['name', 'count'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[RequestRepairParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestRepairParts()
    {
        return $this->hasMany(RequestRepairParts::class, ['repair_parts_id' => 'id']);
    }
}

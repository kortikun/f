<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request_master".
 *
 * @property int $id
 * @property int $request_id
 * @property int $master_id
 *
 * @property User $master
 * @property Request $request
 */
class RequestMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_id', 'master_id'], 'required'],
            [['request_id', 'master_id'], 'integer'],
            [['master_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['master_id' => 'id']],
            [['request_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::class, 'targetAttribute' => ['request_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'master_id' => 'Master ID',
        ];
    }

    /**
     * Gets query for [[Master]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(User::class, ['id' => 'master_id']);
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

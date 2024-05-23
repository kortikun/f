<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $start_date
 * @property string $home_tech_type
 * @property string $home_tech_model
 * @property string $problem_description
 * @property int $request_status_id
 * @property string $completion_date
 * @property int $client_id
 *
 * @property User $client
 * @property Comment[] $comments
 * @property RequestMaster[] $requestMasters
 * @property RequestRepairParts[] $requestRepairParts
 * @property RequestStatus $requestStatus
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_date', 'home_tech_type', 'home_tech_model', 'problem_description', 'completion_date', 'client_id'], 'required'],
            [['start_date', 'completion_date'], 'safe'],
            [['problem_description'], 'string'],
            [['request_status_id', 'client_id'], 'integer'],
            [['home_tech_type', 'home_tech_model'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['client_id' => 'id']],
            [['request_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => RequestStatus::class, 'targetAttribute' => ['request_status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Start Date',
            'home_tech_type' => 'Home Tech Type',
            'home_tech_model' => 'Home Tech Model',
            'problem_description' => 'Problem Description',
            'request_status_id' => 'Request Status ID',
            'completion_date' => 'Completion Date',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[RequestMasters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestMasters()
    {
        return $this->hasMany(RequestMaster::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[RequestRepairParts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestRepairParts()
    {
        return $this->hasMany(RequestRepairParts::class, ['request_id' => 'id']);
    }

    /**
     * Gets query for [[RequestStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestStatus()
    {
        return $this->hasOne(RequestStatus::class, ['id' => 'request_status_id']);
    }
}

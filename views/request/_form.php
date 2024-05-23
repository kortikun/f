<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'home_tech_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'home_tech_model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'problem_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'request_status_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\RequestStatus::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'completion_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'client_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->where(['user_role_id' => '4'])->all(), 'id', 'surname')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

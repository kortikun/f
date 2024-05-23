<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RequestMaster $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'request_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Request::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'master_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->where(['user_role_id' => '2'])->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

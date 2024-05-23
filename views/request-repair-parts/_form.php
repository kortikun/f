<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RequestRepairParts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="request-repair-parts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'request_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Request::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'repair_parts_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\RepairParts::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

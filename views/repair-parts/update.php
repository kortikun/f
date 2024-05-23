<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RepairParts $model */

$this->title = 'Update Repair Parts: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Repair Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repair-parts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

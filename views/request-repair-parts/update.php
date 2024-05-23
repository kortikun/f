<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RequestRepairParts $model */

$this->title = 'Update Request Repair Parts: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Request Repair Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-repair-parts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

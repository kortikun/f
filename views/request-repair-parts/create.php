<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RequestRepairParts $model */

$this->title = 'Create Request Repair Parts';
$this->params['breadcrumbs'][] = ['label' => 'Request Repair Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-repair-parts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

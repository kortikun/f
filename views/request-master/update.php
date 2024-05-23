<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RequestMaster $model */

$this->title = 'Update Request Master: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Request Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="request-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

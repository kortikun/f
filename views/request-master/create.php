<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RequestMaster $model */

$this->title = 'Create Request Master';
$this->params['breadcrumbs'][] = ['label' => 'Request Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

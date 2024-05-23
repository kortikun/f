<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Статистика';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Количество выполненных заявок <?= \app\models\Request::find()->where(['request_status_id' => '4'])->count() ?></h4>
    <h4>Среднее время выполнения заявки <?= intval(\app\models\Request::find()->average('completion_date')) ?></h4>
</div>

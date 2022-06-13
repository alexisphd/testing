<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Protokol */

$this->title = 'Update Protokol: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Protokols', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="protokol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'person' => $person,
    ]) ?>

</div>

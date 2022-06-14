<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fire */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Пожарный риск', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fire-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'class',
            'chastotaFire',
            'escapedPeople',
            'unescapedPeople',
            'smogDefence',
            'fireDefence',
            'alarmSystem',
            'fireStationNear',
            'fireThings',
            'fireFreeEscapes',
            'timeOnwork:datetime',
            'escapeTime:datetime',
            'escapeBlocking',
            'startEscape',
            'timeZator:datetime',
        ],
    ]) ?>

</div>

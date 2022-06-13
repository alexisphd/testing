<?php

use app\models\Fire;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FireSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fires';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fire-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fire', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'class',
            'chastotaFire',
            'escapedPeople',
            'unescapedPeople',
            //'smogDefence',
            //'fireDefence',
            //'alarmSystem',
            //'fireStationNear',
            //'fireThings',
            //'fireFreeEscapes',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fire $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    </div>

</div>

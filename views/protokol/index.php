<?php

use app\models\Protokol;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProtokolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Протоколы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protokol-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать протокол об обучении', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
            'companyName:ntext',
            'detailPrikaz:ntext',
            'detailComission:ntext',
            'obuchenieName:ntext',
            ['attribute' => 'idUser',
                'value' => 'user.surname'],
            'userResult',
            'detailReestr',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Protokol $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    </div>

</div>

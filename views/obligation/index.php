<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObligationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обязанности';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obligation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Внести обязанности', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Obligation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    </div>

</div>

<?php

use app\models\Library;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LibrarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обучащие материалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Внести материалы', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'filename',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Library $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }

            ],
        ],
    ]); ?>
    </div>

</div>

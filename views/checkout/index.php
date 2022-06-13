<?php

use app\models\Checkout;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CheckoutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тестирование';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkout-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Пройти тестирование', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'idUser',
            ['attribute' => 'idUser',
                'value' => 'user.surname'],
            ['attribute' => 'idCategory',
                'value' => 'category.name'],
          //  'idCategory',
            'result',

            [
                'class' => ActionColumn::className(),
                'template' => '{view} {delete}',
                'urlCreator' => function ($action, Checkout $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
    </div>

</div>

<?php

use app\models\Checkout;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CheckoutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты тестирования';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkout-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="btn-group">
        <?= Html::a('Пройти тест', ['/checkout/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обучающие материалы', ['/library/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Задать вопрос', ['site/contact'], ['class' => 'btn btn-success']) ?>
</div>



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive table-sm">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
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
            ['attribute' => 'Вопросов',
                'value' => function(){
        return \app\models\Question::find()->select('id')->count();
                }],


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

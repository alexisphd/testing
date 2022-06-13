<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Панель специалиста по охране труда';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="justify-content-sm-between">

        <?= Html::a('Внести сотрудника', ['user/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Внести обучающие материалы', ['library/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Внести должности', ['position/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Внести обязанности', ['obligation/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Внести отделы', ['department/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Создать тесты', ['question/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Внести темы тестирования', ['category/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Оценка риска пожара', ['fire/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Тестирование', ['checkout/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Протоколы об обучении', ['protokol/index'], ['class' => 'btn btn-success']) ?>

</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>




</div>

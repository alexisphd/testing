<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Панель специалиста по охране труда';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>
       <h3>Выберите необходимые функции: </h3>
    </div>
    <div class="btn-group" role="group">
    <?= Html::a('Оценка риска пожара', ['fire/create'], ['class' => 'btn btn-success']) ?>
        <div class="btn-group" role="group">
    <button class="btn btn-secondary dropdown-toggle " data-toggle="dropdown" aria-expanded="true" >
        Еще функции:
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <?= Html::a('Внести сотрудника', ['user/create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Внести обучающие материалы', ['library/create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Внести должности', ['position/create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Внести обязанности', ['obligation/create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Внести отделы', ['department/create'], ['class' => 'btn btn-success']) ?>
           <?= Html::a('Создать тесты', ['question/create'], ['class' => 'btn btn-success']) ?>
           <?= Html::a('Внести темы тестирования', ['category/create'], ['class' => 'btn btn-success']) ?>
           <?= Html::a('Тестирование', ['checkout/index'], ['class' => 'btn btn-success']) ?>
           <?= Html::a('Протоколы об обучении', ['protokol/index'], ['class' => 'btn btn-success']) ?>
        </div>
       </div>
</div>
</div>


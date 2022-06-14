<?php

use app\models\Fire;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пожарный риск';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fire-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Рассчитать индивидуальный пожарный риск', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<? echo '<h5>'.'Величина рассчитанного индивидуального пожарного риска составляет: '. $risk .'</h5>'?>
<h5> Величина нормативного индивидуального пожарного риска составляет: 1E-6 </h5>
<h5> В соответствии с Методикой определения расчетных величин пожарного риска в зданиях, сооружениях и строениях различных классов функциональной пожарной опасности, можно утверждать, что: </h5>
    <?
    if ($risk<=0.000001)
        echo '<h3 style="color:green">'.'величина рассчитанного индивидуального пожарного риска отвечает требованиям законодательства'.'</h3>';
    else
    echo '<h3 style="color: #a71d2a">'.'величина рассчитанного индивидуального пожарного риска не отвечает требованиям законодательства'.'</h3>';
    ?>
  <!--  --><?/*= GridView::widget([
        'dataProvider' => $dataProvider,
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
            //'timeOnwork:datetime',
            //'escapeTime:datetime',
            //'escapeBlocking',
            //'startEscape',
            //'timeZator:datetime',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fire $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]);*/?>


</div>

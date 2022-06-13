<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Checkout */

$this->title = 'Пройти тестирование';
$this->params['breadcrumbs'][] = ['label' => 'Тестирование', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category'=>$category,
        'counts' => $counts,
        'questions' => $questions,
    ]) ?>

</div>

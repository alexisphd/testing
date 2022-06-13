<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Obligation */

$this->title = 'Внести обязанности';
$this->params['breadcrumbs'][] = ['label' => 'Обязанности', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obligation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

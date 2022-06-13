<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Library */

$this->title = 'Внести материалы';
$this->params['breadcrumbs'][] = ['label' => 'Обучающие материалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

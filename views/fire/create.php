<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fire */

$this->title = 'Create Fire';
$this->params['breadcrumbs'][] = ['label' => 'Fires', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fire-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

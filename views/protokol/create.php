<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Protokol */

$this->title = 'Создать протокол об обучении';
$this->params['breadcrumbs'][] = ['label' => 'Протоколы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protokol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'person' => $person,
    ]) ?>

</div>

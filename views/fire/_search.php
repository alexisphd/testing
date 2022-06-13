<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FireSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fire-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'chastotaFire') ?>

    <?= $form->field($model, 'escapedPeople') ?>

    <?= $form->field($model, 'unescapedPeople') ?>

    <?php // echo $form->field($model, 'smogDefence') ?>

    <?php // echo $form->field($model, 'fireDefence') ?>

    <?php // echo $form->field($model, 'alarmSystem') ?>

    <?php // echo $form->field($model, 'fireStationNear') ?>

    <?php // echo $form->field($model, 'fireThings') ?>

    <?php // echo $form->field($model, 'fireFreeEscapes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

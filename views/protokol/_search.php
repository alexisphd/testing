<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProtokolSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protokol-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'companyName') ?>

    <?= $form->field($model, 'detailPrikaz') ?>

    <?= $form->field($model, 'detailComission') ?>

    <?= $form->field($model, 'obuchenieName') ?>

    <?php // echo $form->field($model, 'idUser') ?>

    <?php // echo $form->field($model, 'userResult') ?>

    <?php // echo $form->field($model, 'detailReestr') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

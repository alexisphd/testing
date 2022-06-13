<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fire */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fire-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chastotaFire')->textInput() ?>

    <?= $form->field($model, 'escapedPeople')->textInput() ?>

    <?= $form->field($model, 'unescapedPeople')->textInput() ?>

    <?= $form->field($model, 'smogDefence')->textInput() ?>

    <?= $form->field($model, 'fireDefence')->textInput() ?>

    <?= $form->field($model, 'alarmSystem')->textInput() ?>

    <?= $form->field($model, 'fireStationNear')->textInput() ?>

    <?= $form->field($model, 'fireThings')->textInput() ?>

    <?= $form->field($model, 'fireFreeEscapes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

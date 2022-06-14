<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fire */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fire-form">

    <?php $form = ActiveForm::begin(['action' => 'calculate']); ?>

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

    <?= $form->field($model, 'timeOnwork')->textInput() ?>

    <?= $form->field($model, 'escapeTime')->textInput() ?>

    <?= $form->field($model, 'escapeBlocking')->textInput() ?>

    <?= $form->field($model, 'startEscape')->textInput() ?>

    <?= $form->field($model, 'timeZator')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Рассчитать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

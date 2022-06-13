<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Protokol */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="protokol-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'companyName')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detailPrikaz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'detailComission')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'obuchenieName')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idUser')->dropDownList($person) ?>

<!--    <?/*= $form->field($model, 'userResult')->textInput() */?>

    --><?/*= $form->field($model, 'detailReestr')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

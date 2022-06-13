<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'correct')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idCategory')->dropDownList($category) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить данные', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

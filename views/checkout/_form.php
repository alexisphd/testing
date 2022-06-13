<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Checkout */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="checkout-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'idCategory')->dropDownList($category) ?>

    <?php

    echo '<h3>'.'Всего вопросов в тесте = '.$counts. '</h3>';

    foreach ($questions as $question) {

        echo '<h5>' .$question->name . '</h5>';

        echo '<ul type="none">';
        echo "<li>". "<input type='checkbox' name='$question->id'  value ='$question->correct'>". $question->correct;
        echo "<li>". "<input type='checkbox' name='$question->id' value ='$question->answer1'>". $question->answer1;
        echo "<li>". "<input type='checkbox' name='$question->id' value ='$question->answer2'>". $question->answer2;
        echo '</ul>';
    }

    ?>


    <div class="form-group">
        <?= Html::submitButton('Ответить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

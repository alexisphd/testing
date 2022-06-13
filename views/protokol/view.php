<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Protokol */
/*
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Protokols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
\yii\web\YiiAsset::register($this);
?>
<div class="protokol-view">

  <!--  <h1><?/*= Html::encode($this->title) */?></h1>

    <p>
        <?/*= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
        <?/*= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
        <?/*= Html::a('PDF', [
            'pdf',
            'id' => $model->id,
        ], [
            'class' => 'btn btn-primary',
            'target' => '_blank',
        ]); */?>

    </p>-->
    <div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 //           'id',
            'companyName:ntext',
            'detailPrikaz:ntext',
            'detailComission:ntext',
            'obuchenieName:ntext',
            ['label'=>'name',
            'value'=> \app\models\User::find()->select('name')->where(['id'=>$model->idUser])->scalar()],
            ['label'=>'surname',
                'value'=> \app\models\User::find()->select('surname')->where(['id'=>$model->idUser])->scalar()],
            ['label'=>'result',
                'value'=> \app\models\Checkout::find()->select('result')->where(['idUser'=>$model->idUser])->scalar()],
            'userResult',
            'detailReestr',
        ],
    ]) ?>
<br>
    <p>
    Председатель комиссии: <br>
    _______________________/__________________
</p>

    <p>
    Секретарь: <br>
    _______________________/__________________
</p>

    <p>
    Члены комиссии: <br>
                        _______________________/__________________<br>
                        _______________________/__________________<br>
                        _______________________/__________________<br>
                        _______________________/__________________<br>
                        _______________________/__________________<br>
                        _______________________/__________________<br>

</p>

    </div>
</div>

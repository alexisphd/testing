
<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'О приложении';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p style="font-size: 16px">
Данное приложение в настоящий момент ограничено функциональностью:
        модуль обучения,
        модуль тестирования,
        модуль формирования протоколов об обучении.
    </p>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Asesoria */

$this->title = 'Nueva asesoría';
$this->params['breadcrumbs'][] = ['label' => 'Asesorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asesoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

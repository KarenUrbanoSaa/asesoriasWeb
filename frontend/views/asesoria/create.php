<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AsesoriaCurso */

$this->title = '¿De qué tratará tu asesoría?';
$this->params['breadcrumbs'][] = ['label' => 'Asesoria Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asesoria-curso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

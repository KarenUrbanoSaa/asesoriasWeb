<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Asesor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Asesors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asesor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'apellido',
            'telefono',
            'mail',
            'pass',
            'estudios:ntext',
            'aptitudes:ntext',
            'temas_asesoria:ntext',
            'about_me:ntext',
            'foto',
            'categoria_id',
            'subcategoria_id',
            'user_id',
        ],
    ]) ?>

</div>

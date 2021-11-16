<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AsesoriaCursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asesoria Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asesoria-curso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Asesoria Curso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo',
            'descripcion',
            'imagen',
            'url_video:url',
            //'fecha',
            //'status',
            //'likes',
            //'created_by',
            //'num_subscriptores',
            //'categoria_id',
            //'subcategoria_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

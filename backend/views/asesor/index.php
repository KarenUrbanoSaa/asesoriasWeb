<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AsesorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asesors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asesor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Asesor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apellido',
            'telefono',
            'mail',
            //'pass',
            //'estudios:ntext',
            //'aptitudes:ntext',
            //'temas_asesoria:ntext',
            //'about_me:ntext',
            //'foto',
            //'categoria_id',
            //'subcategoria_id',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

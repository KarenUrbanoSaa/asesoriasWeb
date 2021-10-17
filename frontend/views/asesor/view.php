<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Asesor */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Asesores', 'url' => ['index?id='.$model->subcategoria_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asesor-view">

    <h1><?= Html::encode($this->title) ?></h1>


<div class="container">
  <div class="row row-cols-3">
    <div class="col"><?php echo "Nombre: ".$model->nombre?></div>
    <div class="col"><?php echo "Apellido: ".$model->apellido?></div>
    <div class="col"><?php echo "Estudios: ".$model->estudios?></div>
    <div class="col"><?php echo "Aptitudes: ".$model->aptitudes?></div>
    <div class="col"><?php echo "Sobre mi: ".$model->about_me?></div>
  </div>


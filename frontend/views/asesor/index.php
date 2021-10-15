<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsesorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asesores';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_asesor_item',
    'layout' => '<div id="holder"">{items}</div>{pager}',
    
]) ?>

<?php
?>
<div style="padding-top: 100px;">
<?php
$this->title = 'Asesores';
$this->params['breadcrumbs'][] = ['label' => 'Categorías', 'url' => ['categoria/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container">
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_asesor_item',
        'layout' => '<div id="holder"">{items}</div>{pager}',
        
    ]) ?>
</div>

</div>

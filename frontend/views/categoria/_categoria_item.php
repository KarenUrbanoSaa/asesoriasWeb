<php 
use yii\helpers\Url;
?>

<div class="box box-1" style="width: 18rem; height: 21rem">
    <h3><?php echo $model->nombre?></h3>
    <div class="image">
        <img src="<?php echo $model->getUrlImagen().$model->imagen?>" alt="" width="130">
    </div>
    <p class="h6">
    <?php echo $model->descripcion;?>
    </p>
    <nav class="navbar navbar-expand">
        <div class="navbar-nav">
            <ul class="navbar-nav">
            <?php 
            foreach($model->subcategorias as $k => $v){
                echo "<li class='nav-item'><a class='nav-link text-white' href='asesor/index?id=".$v->id."'>".$v->nombre."</a></li>";
            }
            ?>
            </ul>
            </div>
    </nav>
    <nav class="navbar navbar-expand">
        <div class="navbar-nav">
            
        </div>
    </nav>
</div>
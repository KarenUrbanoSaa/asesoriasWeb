<div class="card">
    <div class="encabezado">
        <img src="<?php echo $model->getUrlImagen()."media/".$model->pass?>" width="200" height="200" alt="">
    </div>

    <div class="contenido">
        <div class="info_personal desplazar disabled"><?php echo $model->nombre." ".$model->apellido?></div>
        <div class="info_personal desplazar"><?php echo $model->estudios?></div>
        <div class="info_personal desplazar"><?php echo $model->aptitudes?></div>
    </div>
    <div class="container">

        <div class="social">
            <li class="agrandar">
                <a href="#"><img src="<?php echo $model->getUrlImagen()."media/facebook.png"?>" alt="facebook" width="25" height="25"></a>
            </li>
            <li class="agrandar">
                <a href="#"><img src="<?php echo $model->getUrlImagen()."media/youtube.png"?>" alt="youtube" width="25" height="25"></a>
            </li>
            <li class="agrandar">
                <a href="#"><img src="<?php echo $model->getUrlImagen()."media/linkedin.png"?>" alt="linkedin" width="25" height="25"></a>
            </li>
            <li class="agrandar">
                <a href="#"><img src="<?php echo $model->getUrlImagen()."media/instagram.png"?>" alt="instagram" width="25" height="25"></a>
            </li>
        </div>
    </div>
    <div class="acciones">
        <button class="boton">
        <span class="fas fa-envelope"></span>
        Agendar
    </button>
    </div>
    <div class="txt-center">
        <form>
            <div class="rating">
                <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                <label for="star5">&#9734;</label>
                <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                <label for="star4">☆</label>
                <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                <label for="star3">☆</label>
                <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                <label for="star2">☆</label>
                <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                <label for="star1">☆</label>
                <div class="clear"></div>
            </div>
        </form>
    </div>
    <div class="comentarios">
        <a href="javascript:void(0);" onclick="window.open('./comentarios',  'popup', 'top=100, left=200, width=853, height=480, toolbar=NO, resizable=NO, Location=NO, Menubar=NO,  Titlebar=No, Status=NO')" rel="nofollow" class="button">Opiniones</a>
    </div>
</div>
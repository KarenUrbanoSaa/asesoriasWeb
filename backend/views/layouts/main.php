<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php');
?>
<main class="d-flex mt-5">
    <div class="row">
        <div class="col-3">
            <?php echo $this->render('_sidebar') ?>
        </div>
        <div class="col-9">
            <div class="content-wrapper">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</main>
<?php $this->endContent() ?>
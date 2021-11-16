<?php
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
<!-- <div class="content-wrapper"> -->
<main style="margin-top: 90px" class="d-flex">
    
    <?php echo $this->render('_sidebar_front') ?>

    <div class="content-wrapper p-3">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endContent() ?>

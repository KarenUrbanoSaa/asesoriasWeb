<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
<main style="margin-top:90px" class="d-flex">
    <?php echo $this->render('_sidebar_back') ?>

    <div class="content-wrapper p-3">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endContent() ?>
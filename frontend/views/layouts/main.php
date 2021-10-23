<?php
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
    
<div class="content-wrapper">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    
    <?= $content ?>
</div>
    
<?php $this->endContent() ?>

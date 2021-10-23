<?php
use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
    
    <?= Alert::widget() ?>
    
    <?= $content ?>
    
<?php $this->endContent() ?>
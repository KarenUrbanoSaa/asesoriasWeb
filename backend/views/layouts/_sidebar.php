<?php
/**
 * User: TheCodeholic
 * Date: 4/17/2020
 * Time: 9:20 AM
 */

?>

<aside class="shadow" style="flex:1">
    <?php echo \yii\bootstrap4\Nav::widget([
    'options' => [
        'class' => 'd-flex flex-column nav-pills col-6 mt-5 style="flex:1"'
    ],
    'items' => [
        [
            'label' => 'Tus cursos',
            'url' => ['/curso/index']
        ],
        [
            'label' => 'Mensajes',
            'url' => ['/mensajes/index']
        ],
        [
            'label' => 'Facturas',
            'url' => ['/factura/index']
        ],
        [
            'label' => 'Cesta',
            'url' => ['/factura/index']
        ],
        [
            'label' => 'Configuración',
            'url' => ['/factura/index']
        ]
    ]
]) ?>
</aside>

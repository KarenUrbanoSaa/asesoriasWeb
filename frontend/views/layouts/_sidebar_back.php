<?php
/**
 * User: TheCodeholic
 * Date: 4/17/2020
 * Time: 9:20 AM
 */

?>

<aside class="shadow">
    <?php echo \yii\bootstrap4\Nav::widget([
    'options' => [
        'class' => 'd-flex flex-column nav-pills'
    ],
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<i class="fas fa-home"></i> Crear asesoría',
            'url' => ['/asesoria/create']
        ],
        [
            'label' => '<i class="fas fa-history"></i> Tus asesorías',
            'url' => ['/asesoria/index']
        ],
        [
            'label' => '<i class="fas fa-history"></i> Preguntas',
            'url' => ['/pregunta/index']
        ],
        [
            'label' => '<i class="fas fa-history"></i> asesorías sincrónicas',
            'url' => ['/clases/index']
        ]

    ]
]) ?>
</aside>

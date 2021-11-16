<?php
/**
 * User: TheCodeholic
 * Date: 4/17/2020
 * Time: 9:20 AM
 */

$menuLateral = [
    [
        'label' => '<i class="fas fa-home"></i> Finanzas',
        'url' => ['/video/index']
    ],
    [
        'label' => '<i class="fas fa-history"></i> Idiomas',
        'url' => ['/video/history']
    ]
];

if( !Yii::$app->user->isGuest ){
    $menuLateral[] = [
        'label' => '<i class="fas fa-home"></i> Subscripciones',
        'url' => ['/video/index']
    ];
    $menuLateral[] =[
        'label' => '<i class="fas fa-history"></i> Asesorías sincrónicas',
        'url' => ['/video/history']
    ];
    $menuLateral[] =[
        'label' => '<i class="fas fa-history"></i>Comunidad',
        'url' => ['/video/history']
    ];
}

?>

<aside class="shadow">
    <?php echo \yii\bootstrap4\Nav::widget([
    'options' => [
        'class' => 'd-flex flex-column nav-pills'
    ],
    'encodeLabels' => false,
    'items' => $menuLateral
])
?>
</aside>

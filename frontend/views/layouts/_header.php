<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
    ],
]);
$menuItems = [
    ['label' => 'Inicio', 'url' => ['/categoria/index']],
    ['label' => 'Servicios', 'url' => ['/site/about']],
    ['label' => 'Contacto', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Regístrate', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Ingresa', 'url' => ['/site/login']];
    $menuItems[] = ['label' => 'Ser asesor', 'url' => ['/site/signup']];
} else {
    $menuItems[] = ['label' => 'Cursos tomados', 'url' => ['/estudiante/cursos']];
    if( Yii::$app->user->identity->rol !== 'estudiante' ){
        $menuItems[] = ['label' => 'Área de asesores', 'url' => ['/tutor/cursos']];
    }else{
        $menuItems[] = ['label' => 'Ser asesor', 'url' => ['/user/update?id='.Yii::$app->user->identity->id]];
    }
    $menuItems[] = [
        'label' => 'Salir('.Yii::$app->user->identity->username.')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post'
        ]
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();

?>

<?php
  echo \yii\bootstrap4\Nav::widget([
    'options' => [
      'class' => ''
    ],
    'items' => [
      [
        'label' => 'Cesta',
        'url' => ['/cesta/index']
      ],
      [
        'label' => 'Asesorías',
        'url' => ['/asesoria/index']
      ],
      [
        'label' => 'Mensajes',
        'url' => ['/mensaje/index']
      ],
      [
        'label' => 'Factura',
        'url' => ['/factura/index']
      ],
      [
        'label' => 'Configuración',
        'url' => ['/configuracion/index']
      ]

    ]

  ])
?>


<!-- <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    A list item
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    A second list item
    <span class="badge bg-primary rounded-pill">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    A third list item
    <span class="badge bg-primary rounded-pill">1</span>
  </li>
</ul> -->

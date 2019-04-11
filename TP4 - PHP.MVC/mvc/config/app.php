<?php
return [
    'Router' => [
        'accionPorDefecto' => [
            'controlador' => 'Inicio',
            'accion' => 'index'
        ],
		'reservar' => [
            'controlador' => 'Reservar',
            'accion' => 'cargar'
        ],
		'administrar' => [
            'controlador' => 'Administracion',
            'accion' => 'listar'
        ]
    ]
];

<?php
return [
    'Router' => [
        'accionPorDefecto' => [
            'controlador' => 'Test',
            'accion' => 'index'
        ],
		'reservar' => [
            'controlador' => 'Reservar',
            'accion' => 'cargar'
        ],
		'administrar' => [
            'controlador' => 'Administracion',
            'accion' => 'listarTurnos'
        ]
    ]
];

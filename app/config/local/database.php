<?php

return array(
 	
 	'profile' => true,

    'default' => 'mysql',
 
    'connections' => array(
 
        'mysql' => array(
			'driver'   => 'mysql',
			'host'     => 'localhost',
			'database' => 'lv_tarefas',
			'username' => 'root',
			'password' => 'mysql',
			'charset'  => 'utf8',
			'prefix'   => '',
        )
 
    )
 
);
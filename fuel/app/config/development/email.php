<?php

return array(
    'defaults' => array(
        'useragent' => 'FuelPHP, PHP 5.3 Framework',
        'driver'    => 'smtp',
        'from' => array(
			'email' => 'example@example.com',
			'name'  => 'Name',
		),
        'smtp' => array(
			'host'		=> 'HOST',
			'port'		=> 587,
			'username'	=> 'example@example.com',
			'password'	=> 'password',
			'timeout'	=> 30,
		)
    )
);
<?php

return array(
    'defaults' => array(
        'useragent' => 'FuelPHP, PHP 5.3 Framework',
        'driver'    => 'smtp',
        'from' => array(
			'email' => 'dev@tboom.net',
			'name'  => 'Tboom',
		),
        'smtp' => array(
			'host'		=> 'smtp.tboom.net',
			'port'		=> 587,
			'username'	=> 'dev@tboom.net',
			'password'	=> 'tboomdev_1342',
			'timeout'	=> 30,
		)
    )
);
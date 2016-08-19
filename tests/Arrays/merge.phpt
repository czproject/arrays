<?php

use CzProject\Arrays;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {

	$defaultConfig = array(
		'parameters' => array(
			'database' => array(
				'host' => 'localhost',
				'database' => 'lorem_ipsum',
				'driver' => 'mysql',
			),
		),

		'messages' => array(
			'success' => 'Success!',
			'error' => 'Error!',
		),
	);

	$config = array(
		'parameters' => array(
			'database' => array(
				'user' => 'user123',
				'password' => 'password123',
			),
		),

		'messages' => array(
			'error' => 'Fatal Error!',
		),
	);

	$data = Arrays::merge($config, $defaultConfig);

	Assert::same(array(
		'parameters' => array(
			'database' => array(
				'host' => 'localhost',
				'database' => 'lorem_ipsum',
				'driver' => 'mysql',
				'user' => 'user123',
				'password' => 'password123',
			),
		),

		'messages' => array(
			'success' => 'Success!',
			'error' => 'Fatal Error!',
		)
	), $data);

});


test(function () {

	$data = array(
		'parameters' => array(
			'host' => 'localhost',
		),
	);

	Assert::same($data, Arrays::merge(NULL, $data));

});


test(function () {

	$data = array(
		'parameters' => array(
			'host' => 'localhost',
		),
	);

	Assert::same($data, Arrays::merge($data, NULL));

});


test(function () {

	$default = array(
		'parameters' => array(
			'host' => 'localhost',
		),
		'ignore' => array(
			'.git*',
			'/vendor/',
		),
	);

	$config = array(
		'ignore' => array(
			'*.txt',
		),
	);

	Assert::same(array(
		'parameters' => array(
			'host' => 'localhost',
		),
		'ignore' => array(
			'.git*',
			'/vendor/',
			'*.txt',
		),
	), Arrays::merge($config, $default));

});

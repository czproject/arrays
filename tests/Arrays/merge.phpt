<?php

declare(strict_types=1);

use CzProject\Arrays;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {

	$defaultConfig = [
		'parameters' => [
			'database' => [
				'host' => 'localhost',
				'database' => 'lorem_ipsum',
				'driver' => 'mysql',
			],
		],

		'messages' => [
			'success' => 'Success!',
			'error' => 'Error!',
		],
	];

	$config = [
		'parameters' => [
			'database' => [
				'user' => 'user123',
				'password' => 'password123',
			],
		],

		'messages' => [
			'error' => 'Fatal Error!',
		],
	];

	$data = Arrays::merge($config, $defaultConfig);

	Assert::same([
		'parameters' => [
			'database' => [
				'host' => 'localhost',
				'database' => 'lorem_ipsum',
				'driver' => 'mysql',
				'user' => 'user123',
				'password' => 'password123',
			],
		],

		'messages' => [
			'success' => 'Success!',
			'error' => 'Fatal Error!',
		]
	], $data);

});


test(function () {

	$data = [
		'parameters' => [
			'host' => 'localhost',
		],
	];

	Assert::same($data, Arrays::merge(NULL, $data));

});


test(function () {

	$data = [
		'parameters' => [
			'host' => 'localhost',
		],
	];

	Assert::same($data, Arrays::merge($data, NULL));

});


test(function () {

	$default = [
		'parameters' => [
			'host' => 'localhost',
		],
		'ignore' => [
			'.git*',
			'/vendor/',
		],
	];

	$config = [
		'ignore' => [
			'*.txt',
		],
	];

	Assert::same([
		'parameters' => [
			'host' => 'localhost',
		],
		'ignore' => [
			'.git*',
			'/vendor/',
			'*.txt',
		],
	], Arrays::merge($config, $default));

});

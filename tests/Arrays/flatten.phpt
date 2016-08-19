<?php

use CzProject\Arrays;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {

	Assert::same(array(
		'value 1',
		'value 2-1',
		'value 2-2',
		'value 2-3',
		'value 3',
	), Arrays::flatten(array(
		'value 1',
		'values' => array(
			'value 2-1',
			'value 2-2',
			'value 2-3',
		),
		'value 3',
	)));

});

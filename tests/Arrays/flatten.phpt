<?php

declare(strict_types=1);

use CzProject\Arrays;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {

	Assert::same([
		'value 1',
		'value 2-1',
		'value 2-2',
		'value 2-3',
		'value 3',
	], Arrays::flatten([
		'value 1',
		'values' => [
			'value 2-1',
			'value 2-2',
			'value 2-3',
		],
		'value 3',
	]));

});

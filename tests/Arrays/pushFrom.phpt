<?php

declare(strict_types=1);

use CzProject\Arrays;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {
	$a = ['A1', 'A2', 'A3', 'A4'];
	$b = ['B1', 'B2'];
	$result = [];

	Arrays::pushFrom($result, $a);
	Arrays::pushFrom($result, $b);

	Arrays::pushFrom($result, $a);
	Arrays::pushFrom($result, $b);

	Arrays::pushFrom($result, $a);
	Arrays::pushFrom($result, $b);

	Arrays::pushFrom($result, $a);
	Arrays::pushFrom($result, $b);

	Assert::same([
		'A1',
		'B1',
		'A2',
		'B2',
		'A3',
		'A4',
	], $result);
});

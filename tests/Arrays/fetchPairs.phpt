<?php

use CzProject\Arrays;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';


test(function () {

	$rows = array(
		array(
			'id' => 1,
			'name' => 'Row #1',
		),

		array(
			'id' => 2,
			'name' => 'Row #2',
		),

		array(
			'id' => 3,
			'name' => 'Row #3',
		),
	);

	$data = Arrays::fetchPairs($rows, 'id', 'name');

	Assert::same(array(
		1 => 'Row #1',
		2 => 'Row #2',
		3 => 'Row #3',
	), $data);

});


test(function () {

	$rows = array(
		array(
			'id' => 1,
			'name' => 'Row #1',
		),

		array(
			'id' => 2,
			'name' => 'Row #2',
		),

		array(
			'id' => 3,
			'name' => 'Row #3',
		),
	);

	$data = Arrays::fetchPairs($rows, function ($row) {
		return $row['id'] + 10;

	}, function ($row) {
		return strtoupper($row['name']);
	});

	Assert::same(array(
		11 => 'ROW #1',
		12 => 'ROW #2',
		13 => 'ROW #3',
	), $data);

});

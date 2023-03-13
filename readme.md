# CzProject\Arrays

[![Build Status](https://github.com/czproject/arrays/workflows/Build/badge.svg)](https://github.com/czproject/arrays/actions)
[![Downloads this Month](https://img.shields.io/packagist/dm/czproject/arrays.svg)](https://packagist.org/packages/czproject/arrays)
[![Latest Stable Version](https://poser.pugx.org/czproject/arrays/v/stable)](https://github.com/czproject/arrays/releases)
[![License](https://img.shields.io/badge/license-New%20BSD-blue.svg)](https://github.com/czproject/arrays/blob/master/license.md)

Array tools library.

<a href="https://www.janpecha.cz/donate/"><img src="https://buymecoffee.intm.org/img/donate-banner.v1.svg" alt="Donate" height="100"></a>


## Installation

[Download a latest package](https://github.com/czproject/arrays/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/arrays
```

`CzProject\Arrays` requires PHP 5.6.0 or later.


## Usage


``` php
use CzProject\Arrays;

```

### `flatten()`

``` php
$data = Arrays::flatten(array(
	'value 1',
	'values' => array(
		'value 2-1',
		'value 2-2',
		'value 2-3',
	),
	'value 3',
));

/* Returns:
[
	'value 1',
	'value 2-1',
	'value 2-2',
	'value 2-3',
	'value 3',
]
*/
```


### `fetchPairs()`

``` php
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

/* Returns:
[
	1 => 'Row #1',
	2 => 'Row #2',
	3 => 'Row #3',
]
*/
```


### `merge()`

``` php
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

/* Returns:
[
	parameters => [
		database => [
			host => 'localhost',
			database => 'lorem_ipsum',
			driver => 'mysql',
			user => 'user123',
			password => 'password123',
		]
	],

	messages => [
		success => 'Success!',
		error => 'Fatal Error!',
	]
]
*/
```


### `pushFrom()`

``` php
$a = ['A1', 'A2', 'A3', 'A4'];
$b = ['B1', 'B2'];
$result = [];

for ($i = 0; $i < 4; $i++) {
	Arrays::pushFrom($result, $a);
	Arrays::pushFrom($result, $b);
}

/* Returns:
[
	'A1',
	'B1',
	'A2',
	'B2',
	'A3',
	'A4',
]
*/
```

------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, https://www.janpecha.cz/

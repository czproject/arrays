
# CzProject\Arrays

[![Build Status](https://travis-ci.org/czproject/arrays.svg?branch=master)](https://travis-ci.org/czproject/arrays)

Array tools library.

<a href="https://www.patreon.com/bePatron?u=9680759"><img src="https://c5.patreon.com/external/logo/become_a_patron_button.png" alt="Become a Patron!" height="35"></a>
<a href="https://www.paypal.me/janpecha/1eur"><img src="https://buymecoffee.intm.org/img/button-paypal-white.png" alt="Buy me a coffee" height="35"></a>


## Installation

[Download a latest package](https://github.com/czproject/arrays/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/arrays
```

`CzProject\Arrays` requires PHP 5.4.0 or later.


## Usage


``` php
<?php

use CzProject\Arrays;

```

### `flatten()`

``` php
<?php

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
<?php

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
<?php

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

------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, https://www.janpecha.cz/

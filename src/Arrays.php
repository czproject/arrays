<?php

	namespace CzProject;


	class Arrays
	{
		/**
		 * @param  array<string|int, mixed> $arr
		 * @param  array<string|int, mixed> $arrFrom
		 * @return void
		 */
		public static function pushFrom(array &$arr, array &$arrFrom)
		{
			if (empty($arrFrom)) {
				return;
			}

			array_push($arr, array_shift($arrFrom));
		}


		/**
		 * @param  iterable<string|int, mixed> $arr
		 * @return array<string|int, mixed>
		 */
		public static function flatten($arr)
		{
			$res = [];

			static::recursiveWalk($arr, function ($val, $key) use (&$res) {
				if (is_scalar($val)) {
					$res[] = $val;
				}
			});

			return $res;
		}


		/**
		 * @param  iterable<string|int, mixed> $arr
		 * @return void
		 */
		public static function recursiveWalk($arr, callable $callback)
		{
			foreach ($arr as $key => $value) {
				if (is_array($value) || $value instanceof \Traversable) {
					static::recursiveWalk($value, $callback);

				} else {
					call_user_func_array($callback, [$value, $key]);
					// $callback($value, $key);
				}
			}
		}


		/**
		 * @param  array<array<string|int, mixed>|object> $data
		 * @param  string|callable $key
		 * @param  string|callable $value
		 * @return mixed[]
		 */
		public static function fetchPairs($data, $key, $value)
		{
			$list = [];

			foreach ($data as $row) {
				$itemKey = NULL;
				$itemLabel = NULL;

				if (is_callable($key)) {
					$itemKey = call_user_func_array($key, [$row]);

				} else {
					$itemKey = is_array($row) ? $row[$key] : $row->{$key};
				}

				if (is_callable($value)) {
					$itemLabel = call_user_func_array($value, [$row]);

				} else {
					$itemLabel = is_array($row) ? $row[$value] : $row->{$value};
				}

				$list[$itemKey] = $itemLabel;
			}

			return $list;
		}


		/**
		 * Merges arrays. Left has higher priority than right one.
		 * @param  mixed|NULL $left
		 * @param  mixed|NULL $right
		 * @return mixed|NULL
		 * @see    https://github.com/nette/di/blob/master/src/DI/Config/Helpers.php
		 */
		public static function merge($left, $right)
		{
			if (is_array($left) && is_array($right)) {
				foreach ($left as $key => $val) {
					if (is_int($key)) {
						$right[] = $val;

					} else {
						if (isset($right[$key])) {
							$val = static::merge($val, $right[$key]);
						}
						$right[$key] = $val;
					}
				}
				return $right;

			} elseif ($left === NULL && is_array($right)) {
				return $right;

			} else {
				return $left;
			}
		}
	}

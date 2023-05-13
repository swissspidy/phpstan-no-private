<?php

namespace CheckPrivateStaticMethodCall;

class Foo
{

	public static function foo()
	{

	}

	/**
	 * @access private
	 */
	public static function privateFoo()
	{

	}
}

class Bar extends Foo
{

	public static function privateFoo()
	{

	}

}

/**
 * @access private
 */
class PrivateBar extends Foo
{

}

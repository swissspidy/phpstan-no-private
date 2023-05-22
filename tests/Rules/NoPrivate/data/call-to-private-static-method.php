<?php

namespace CheckPrivateStaticMethodCall;

Foo::foo();
Foo::privateFoo();

Bar::privateFoo();

PrivateBar::foo();
PrivateBar::privateFoo();

class Bar2 extends Foo
{

	public static function privateFoo()
	{
		parent::foo();
		parent::privateFoo();
	}

}

class Bar3 extends Foo
{
	public static function callOtherPrivateMethod()
	{
		parent::privateFoo();
	}
}

class Child extends Foo
{
	/**
	 * @access private
	 */
	public static function privateOtherFoo()
	{

	}

	public static function foo()
	{
		self::privateFoo();
		self::privateOtherFoo();
		static::privateFoo();
		static::privateOtherFoo();
	}
}

class Baz
{

	public static function publicBaz()
	{
		self::privateBaz();
		self::reallyPrivateBaz();
	}

	/**
	 * @access private
	 */
	public static function privateBaz()
	{

	}

	/**
	 * @access private
	 */
	private static function reallyPrivateBaz()
	{

	}
}

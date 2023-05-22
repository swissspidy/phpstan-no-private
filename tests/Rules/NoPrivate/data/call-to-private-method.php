<?php

namespace CheckPrivateMethodCall;

$foo = new Foo();
$foo->foo();
$foo->privateFoo();

class Bar
{

	public function publicBar()
	{
		$this->privateBar();
		$this->reallyPrivateBar();
	}

	/**
	 * @access private
	 */
	public function privateBar()
	{

	}

	/**
	 * @access private
	 */
	private function reallyPrivateBar()
	{

	}
}

class Baz extends Foo
{

	public function foo()
	{
		$this->privateFoo();
	}
}

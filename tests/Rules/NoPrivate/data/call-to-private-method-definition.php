<?php

namespace CheckPrivateMethodCall;

class Foo
{

	public function foo()
	{

	}

	/**
	 * @access private
	 */
	public function privateFoo()
	{

	}
}

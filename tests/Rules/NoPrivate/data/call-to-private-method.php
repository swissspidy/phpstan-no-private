<?php

namespace CheckPrivateMethodCall;

$foo = new Foo();
$foo->foo();
$foo->privateFoo();

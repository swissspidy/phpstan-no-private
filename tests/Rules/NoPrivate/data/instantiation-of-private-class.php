<?php

namespace InstantiationOfPrivateClass;

$foo = new Foo();
$privateFoo = new PrivateFoo();

// #1: `namespacedName` property doesn't exist in anonymous classes
new class() extends Foo {

};

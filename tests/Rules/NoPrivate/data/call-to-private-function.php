<?php

namespace CheckPrivateFunctionCall;

public_function();
\CheckPrivateFunctionCall\public_function();

private_function();
\CheckPrivateFunctionCall\private_function();

file_exists('');

define('foo', 'bar');

<?php declare(strict_types = 1);

namespace Swissspidy\PHPStan\Rules\NoPrivate;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use PHPStan\Type\FileTypeMapper;

/**
 * @extends RuleTestCase<CallToPrivateFunctionRule>
 */
class CallToPrivateFunctionRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new CallToPrivateFunctionRule($this->createReflectionProvider(), self::getContainer()->getByType(FileTypeMapper::class));
	}

	public function testPrivateFunctionCall(): void
	{
		require_once __DIR__ . '/data/call-to-private-function-definition.php';
		$this->analyse(
			[__DIR__ . '/data/call-to-private-function.php'],
			[
				[
					'Call to private function CheckPrivateFunctionCall\private_function().',
					8,
				],
				[
					'Call to private function CheckPrivateFunctionCall\private_function().',
					9,
				],
			]
		);
	}

}

<?php declare(strict_types = 1);

namespace Swissspidy\PHPStan\Rules\NoPrivate;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;
use PHPStan\Type\FileTypeMapper;

/**
 * @extends RuleTestCase<CallToPrivateMethodRule>
 */
class CallToPrivateMethodRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new CallToPrivateMethodRule($this->createReflectionProvider(), self::getContainer()->getByType(FileTypeMapper::class));
	}

	public function testPrivateMethodCall(): void
	{
		require_once __DIR__ . '/data/call-to-private-method-definition.php';
		$this->analyse(
			[__DIR__ . '/data/call-to-private-method.php'],
			[
				[
					'Call to private/internal method privateFoo() of class CheckPrivateMethodCall\Foo.',
					7,
				],
			]
		);
	}

}

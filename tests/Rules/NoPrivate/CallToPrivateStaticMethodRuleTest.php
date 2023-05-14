<?php declare(strict_types = 1);

namespace Swissspidy\PHPStan\Rules\NoPrivate;

use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Testing\RuleTestCase;
use PHPStan\Type\FileTypeMapper;

/**
 * @extends RuleTestCase<CallToPrivateStaticMethodRule>
 */
class CallToPrivateStaticMethodRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new CallToPrivateStaticMethodRule($this->createReflectionProvider(), self::getContainer()->getByType(RuleLevelHelper::class), self::getContainer()->getByType(FileTypeMapper::class));
	}

	public function testPrivateStaticMethodCall(): void
	{
		require_once __DIR__ . '/data/call-to-private-static-method-definition.php';
		$this->analyse(
			[__DIR__ . '/data/call-to-private-static-method.php'],
			[
				[
					'Call to private/internal method privateFoo() of class CheckPrivateStaticMethodCall\Foo.',
					6,
				],
				[
					'Call to method foo() of private/internal class CheckPrivateStaticMethodCall\Foo.',
					10,
				],
				[
					'Call to method privateFoo() of private/internal class CheckPrivateStaticMethodCall\Foo.',
					11,
				],
				[
					'Call to private/internal method privateFoo() of class CheckPrivateStaticMethodCall\Foo.',
					19,
				],
				[
					'Call to private/internal method privateFoo() of class CheckPrivateStaticMethodCall\Foo.',
					28,
				],
				[
					'Call to private/internal method privateFoo() of class CheckPrivateStaticMethodCall\Foo.',
					44,
				],
				[
					'Call to private/internal method privateOtherFoo() of class CheckPrivateStaticMethodCall\Child.',
					45,
				],
				[
					'Call to private/internal method privateFoo() of class CheckPrivateStaticMethodCall\Foo.',
					46,
				],
				[
					'Call to private/internal method privateOtherFoo() of class CheckPrivateStaticMethodCall\Child.',
					47,
				],
			]
		);
	}

}

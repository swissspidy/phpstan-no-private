<?php declare(strict_types = 1);

namespace Swissspidy\PHPStan\Rules\NoPrivate;

use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<InstantiationOfPrivateClassRule>
 */
class InstantiationOfPrivateClassRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new InstantiationOfPrivateClassRule($this->createReflectionProvider(), self::getContainer()->getByType(RuleLevelHelper::class));
	}

	public function testInstantiationOfPrivateClass(): void
	{
		require_once __DIR__ . '/data/instantiation-of-private-class-definition.php';
		$this->analyse(
			[__DIR__ . '/data/instantiation-of-private-class.php'],
			[
				[
					'Instantiation of private/internal class InstantiationOfPrivateClass\PrivateFoo.',
					6,
				],
			]
		);
	}

}

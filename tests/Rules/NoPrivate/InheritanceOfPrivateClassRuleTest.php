<?php declare(strict_types = 1);

namespace Swissspidy\PHPStan\Rules\NoPrivate;

use PHPStan\Rules\Rule;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<InheritanceOfPrivateClassRule>
 */
class InheritanceOfPrivateClassRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new InheritanceOfPrivateClassRule($this->createReflectionProvider());
	}

	public function testInheritanceOfPrivateClassInClasses(): void
	{
		require_once __DIR__ . '/data/inheritance-of-private-class-definition.php';
		$this->analyse(
			[__DIR__ . '/data/inheritance-of-private-class-in-classes.php'],
			[
				[
					'Class InheritanceOfPrivateClass\Bar2 extends private class InheritanceOfPrivateClass\PrivateFoo.',
					10,
				],
			]
		);
	}

	public function testInheritanceOfPrivateClassInAnonymousClasses(): void
	{
		require_once __DIR__ . '/data/inheritance-of-private-class-definition.php';
		$this->analyse(
			[__DIR__ . '/data/inheritance-of-private-class-in-anonymous-classes.php'],
			[
				[
					'Anonymous class extends private class InheritanceOfPrivateClass\PrivateFoo.',
					9,
				],
			]
		);
	}

}

# Detect usage of pseudo-private code elements

[![Build](https://github.com/swissspidy/phpstan-no-private/workflows/Build/badge.svg)](https://github.com/swissspidy/phpstan-no-private/actions)
[![Latest Stable Version](https://poser.pugx.org/swissspidy/phpstan-no-private/v/stable)](https://packagist.org/packages/swissspidy/phpstan-no-private)
[![License](https://poser.pugx.org/swissspidy/phpstan-no-private/license)](https://packagist.org/packages/swissspidy/phpstan-no-private)

This PHPStan extension emits deprecation warnings on code which uses properties/functions/methods/classes which are annotated as `@access private`.

## Installation

To use this extension, require it in [Composer](https://getcomposer.org/):

```shell
composer require --dev swissspidy/phpstan-no-private
```

If you also install [phpstan/extension-installer](https://github.com/phpstan/extension-installer) then you're all set!

<details><summary>Manual installation</summary>

If you don't want to use `phpstan/extension-installer`, include rules.neon in your project's PHPStan config:

```neon
includes:
    - vendor/swissspidy/phpstan-no-private/rules.neon
```

</details>

## Credits

This project is a fork of the excellent [phpstan/phpstan-deprecation-rules](https://github.com/phpstan/phpstan-deprecation-rules),
which provides rules that detect usage of deprecated classes, methods, properties, constants and traits.

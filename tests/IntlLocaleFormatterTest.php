<?php
  declare(strict_types=1);

  namespace PHP81_BC\Tests;

  use PHP81_BC\Tests\LocaleFormatterTestTrait;
  use PHPUnit\Framework\TestCase;
  use function PHP81_BC\strftime;

  /**
   * @requires extension intl
   */
  class IntlLocaleFormatterTest extends TestCase {
    use LocaleFormatterTestTrait;

    public static function setUpBeforeClass () : void {
      date_default_timezone_set('Europe/Madrid');
    }
  }

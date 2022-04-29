<?php
  declare(strict_types=1);

  namespace PHP81_BC\Tests;

  use PHP81_BC\Tests\LocaleFormatterTestTrait;
  use PHPUnit\Framework\TestCase;
  use function PHP81_BC\strftime;

  class DateLocaleFormatterTest extends TestCase {
    use LocaleFormatterTestTrait;

    public static function setUpBeforeClass () : void {
      date_default_timezone_set('Europe/Madrid');
      $_SERVER['STRFTIME_NO_INTL'] = true;
    }

    public static function tearDownAfterClass () : void {
      unset($_SERVER['STRFTIME_NO_INTL']);
    }
  }
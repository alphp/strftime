<?php
  declare(strict_types=1);

  use PHPUnit\Framework\TestCase;
  use function PHP81_BC\strftime;

  class strftimeTest extends TestCase {
    public function setUp () : void {
      setlocale(LC_TIME, 'en');
      date_default_timezone_set('Europe/Madrid');
    }

    public function test_int_timestamp () {
      $result = strftime('%Y-%m-%d %H:%M:%S', strtotime('20220306 01:02:03'));
      $this->assertEquals('2022-03-06 01:02:03', $result);
    }

    public function test_string_timestamp () {
      $result = strftime('%Y-%m-%d %H:%M:%S', '20220306 01:02:03');
      $this->assertEquals('2022-03-06 01:02:03', $result);
    }

    public function test_datetime_timestamp () {
      $result = strftime('%Y-%m-%d %H:%M:%S', new DateTime('20220306 01:02:03'));
      $this->assertEquals('2022-03-06 01:02:03', $result);
    }

    public function test_exception () {
      $this->expectException(InvalidArgumentException::class);
      $result = strftime('%Y-%m-%d %H:%M:%S', 'InvalidArgumentException');

      $this->expectException(InvalidArgumentException::class);
      $result = strftime('%ñ', '20220306 13:02:03');
    }

    public function test_formats_day () {
      $result = strftime('%a', '20220306 13:02:03');
      $this->assertEquals('Sun', $result);

      $result = strftime('%A', '20220306 13:02:03');
      $this->assertEquals('Sunday', $result);

      $result = strftime('%d', '20220306 13:02:03');
      $this->assertEquals('06', $result);

      $result = strftime('%e', '20220306 13:02:03');
      $this->assertEquals(' 6', $result);

      $result = strftime('%j', '20220306 13:02:03');
      $this->assertEquals('065', $result);

      $result = strftime('%u', '20220306 13:02:03');
      $this->assertEquals('7', $result);

      $result = strftime('%w', '20220306 13:02:03');
      $this->assertEquals('0', $result);
    }

    public function test_formats_week () {
      $result = strftime('%U', '20220306 13:02:03');
      $this->assertEquals('10', $result);

      $result = strftime('%V', '20220306 13:02:03');
      $this->assertEquals('09', $result);

      $result = strftime('%W', '20220306 13:02:03');
      $this->assertEquals('09', $result);
    }

    public function test_formats_month () {
      $result = strftime('%b', '20220306 13:02:03');
      $this->assertEquals('Mar', $result);

      $result = strftime('%B', '20220306 13:02:03');
      $this->assertEquals('March', $result);

      $result = strftime('%h', '20220306 13:02:03');
      $this->assertEquals('Mar', $result);

      $result = strftime('%m', '20220306 13:02:03');
      $this->assertEquals('03', $result);
    }

    public function test_formats_year () {
      $result = strftime('%C', '20220306 13:02:03');
      $this->assertEquals('20', $result);

      $result = strftime('%g', '20220306 13:02:03');
      $this->assertEquals('22', $result);

      $result = strftime('%G', '20220306 13:02:03');
      $this->assertEquals('2022', $result);

      $result = strftime('%y', '20220306 13:02:03');
      $this->assertEquals('22', $result);

      $result = strftime('%Y', '20220306 13:02:03');
      $this->assertEquals('2022', $result);
    }

    public function test_formats_time () {
      $result = strftime('%H', '20220306 13:02:03');
      $this->assertEquals('13', $result);

      $result = strftime('%k', '20220306 01:02:03');
      $this->assertEquals('1', $result);

      $result = strftime('%I', '20220306 13:02:03');
      $this->assertEquals('01', $result);

      $result = strftime('%l', '20220306 13:02:03');
      $this->assertEquals(' 1', $result);

      $result = strftime('%M', '20220306 13:02:03');
      $this->assertEquals('02', $result);

      $result = strftime('%p', '20220306 13:02:03');
      $this->assertEquals('PM', $result);

      $result = strftime('%P', '20220306 13:02:03');
      $this->assertEquals('pm', $result);

      $result = strftime('%r', '20220306 13:02:03');
      $this->assertEquals('01:02:03 PM', $result);

      $result = strftime('%R', '20220306 13:02:03');
      $this->assertEquals('13:02', $result);

      $result = strftime('%S', '20220306 13:02:03');
      $this->assertEquals('03', $result);

      $result = strftime('%T', '20220306 13:02:03');
      $this->assertEquals('13:02:03', $result);

      $result = strftime('%X', '20220306 13:02:03');
      $this->assertEquals('1:02:03 PM', $result);

      $result = strftime('%z', '20220306 13:02:03');
      $this->assertEquals('+0100', $result);

      $result = strftime('%Z', '20220306 13:02:03');
      $this->assertEquals('CET', $result);
    }

    public function test_formats_stamps () {
      $result = strftime('%c', '20220306 13:02:03');
      $this->assertEquals('March 6, 2022 at 1:02 PM', $result);

      $result = strftime('%D', '20220306 13:02:03');
      $this->assertEquals('03/06/2022', $result);

      $result = strftime('%F', '20220306 13:02:03');
      $this->assertEquals('2022-03-06', $result);

      $result = strftime('%s', '20220306 13:02:03');
      $this->assertEquals('1646568123', $result);

      $result = strftime('%x', '20220306 13:02:03');
      $this->assertEquals('3/6/22', $result);
    }

    public function test_formats_miscellaneous () {
      $result = strftime('%n', '20220306 13:02:03');
      $this->assertEquals("\n", $result);

      $result = strftime('%t', '20220306 13:02:03');
      $this->assertEquals("\t", $result);

      $result = strftime('%%', '20220306 13:02:03');
      $this->assertEquals('%', $result);
    }
  }

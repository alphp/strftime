<?php
  declare(strict_types=1);

  use PHPUnit\Framework\TestCase;
  use function PHP81_BC\strftime;

  class strftimeTest extends TestCase {
    public $str_date = '20220312 01:02:03';
    public $int_date = null;

    public function setUp () : void {
      $this->int_date = strtotime($this->str_date);
    }

    public function test_int_timestamp () {
      $result = strftime('%Y-%m-%d %H:%M:%S', $this->int_date);
      $this->assertEquals('2022-03-12 01:02:03', $result);
    }

    public function test_string_timestamp () {
      $result = strftime('%Y-%m-%d %H:%M:%S', $this->str_date);
      $this->assertEquals('2022-03-12 01:02:03', $result);
    }

    public function test_datetime_timestamp () {
      $result = strftime('%Y-%m-%d %H:%M:%S', new DateTime($this->str_date));
      $this->assertEquals('2022-03-12 01:02:03', $result);
    }

    public function test_exception () {
      $this->expectException(InvalidArgumentException::class);
      $result = strftime('%Y-%m-%d %H:%M:%S', 'InvalidArgumentException');
    }
  }

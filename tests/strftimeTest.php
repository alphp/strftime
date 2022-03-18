<?php
  use PHPUnit\Framework\TestCase;
  use function PHP81_BC\strftime;

  class strftimeTest extends TestCase {
    public $str_date = '20220312 01:02:03';
    public $int_date = null;

    public function setUp () : void {
      $this->int_date = strtotime($this->str_date);
    }

    public function test_ymdhms () {
        $result = strftime('%Y-%m-%d %H:%M:%S', $this->str_date);
        $this->assertEquals('2022-03-12 01:02:03', $result);
        $result = strftime('%Y-%m-%d %H:%M:%S', $this->int_date);
        $this->assertEquals('2022-03-12 01:02:03', $result);
    }
  }

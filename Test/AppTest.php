<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 22/08/2018
 * Time: 17:10
 */

namespace Test;


use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function testPHPUnit()
    {
        $word = "Hey!";
        $this->assertSame("Hey!", $word);
    }
}

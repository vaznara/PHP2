<?php

namespace App\tests;

use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    /**
     * @param $a
     * @param $b
     * @param $actualSum
     * @dataProvider getSumData
     */

    public function testFirst($a, $b, $actualSum)
    {
        $sum = $this->sum($a, $b);
        $this->assertEquals($actualSum, $sum);
    }

    protected function sum($a, $b)
    {
        return $a + $b;
    }

    public function getSumData()
    {
        return [
            [2, 2, 4],
            [16, 24, 40],
            [25, 25, 50]
        ];
    }
}
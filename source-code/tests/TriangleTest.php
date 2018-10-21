<?php

namespace nattaponra\testing\tests;


use nattaponra\testing\Triangle;
use nattaponra\testing\TriangleForTesting;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{
    private  $triangle;
    protected function setUp()
    {
        //$this->triangle = new Triangle();
        $this->triangle = new TriangleForTesting();

    }

    public function testEquilateralTriangle(){

         $result = $this->triangle->validateTriangle("P1",5,5,5);
         $this->assertEquals("Equilateral",$result);
     }

    public function testScaleneTriangle(){

        $result = $this->triangle->validateTriangle("P2",5,10,14);
        $this->assertEquals("Scalene",$result);
    }

    public function testIsoscelesTriangle(){
        $result = $this->triangle->validateTriangle("P3",5,10,10);
        $this->assertEquals("Isosceles",$result);
    }

    public function testNotATriangleTriangle(){
        $result = $this->triangle->validateTriangle("P4",5,10,20);
        $this->assertEquals("Not a Triangle",$result);
    }


}
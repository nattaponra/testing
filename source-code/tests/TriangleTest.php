<?php

namespace nattaponra\testing\tests;


use nattaponra\testing\Triangle;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{

     public function testEquilateralTriangle(){
         $triangle = new  Triangle();
         $result = $triangle->validateTriangle(1,1,1);
         $this->assertEquals("Equilateral",$result);
     }

    public function testScaleneTriangle(){
        $triangle = new  Triangle();
        $result = $triangle->validateTriangle(5,10,14);
        $this->assertEquals("Scalene",$result);
    }

    public function testIsoscelesTriangle(){
        $triangle = new  Triangle();
        $result = $triangle->validateTriangle(5,10,10);
        $this->assertEquals("Isosceles",$result);
    }

    public function testNotATriangleTriangle(){
        $triangle = new  Triangle();
        $result = $triangle->validateTriangle(5,10,20);
        $this->assertEquals("Not a Triangle",$result);
    }


}
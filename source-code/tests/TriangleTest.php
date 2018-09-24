<?php

namespace nattaponra\testing\tests;


use nattaponra\testing\Triangle;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{
     public function testAction(){
         $this->assertTrue(True);
     }


     public function testTriangle(){
         $triangle = new  Triangle();
         $result = $triangle->validateTriangle(1,2,3);
         $this->assertTrue($result);
     }
}
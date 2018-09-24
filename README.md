### Source Code
```php

public function validateTriangle($a, $b, $c)
    {
        $isATriangle = False;
        if (($a < $b + $c) && ($b < $a + $c) && ($c < $a + $b)) {
            $isATriangle = True;
        }
        if ($isATriangle) {
            if ($a == $b && $b == $c) {
                return "Equilateral";
            } else if ($a != $b && $a != $c && $b != $c) {
                return "Scalene";
            } else {
                return "Isosceles";
            }
        } else {
            return "Not a Triangle";
        }
    }
```


### Control Flow Graph
![alt text](https://nattaponra.github.io/testing/img/Flow-Graph.png)

### Coverage Table (Branch Coverage) 

 
| Path  | Node 2 |	 Node 5 |	Node 6 |	Node 8 | Inputs | Expected Output |
| -------------  | -------------  | -------------  | -------------  | -------------  | -------------  | -------------  |
| P1:1-2-3-4-5-6-7-15 | TRUE |	TRUE |	TRUE |	- |	a=5,b=5,c=5	| Equilateral |
| P2:1-2-3-4-5-6-8-9-15 |	TRUE |	TRUE |	FALSE |	TRUE |	a=5,b=10,c=14 |	Scalene |
| P3:1-2-3-4-5-6-8-10-11-12-15 |	TRUE |	TRUE |	FALSE |	FALSE |	a=5,b=10,c=10 |	Isosceles |
| P4:1-2-4-5-13-14-15 |	FALSE |	FALSE |	- |	- |	a=5,b=10,c=20 |	Not a Triangle |

### Test Case
```php
class TriangleTest extends TestCase
{

     public function testEquilateralTriangle(){
         $triangle = new  Triangle();
         $result = $triangle->validateTriangle(5,5,5);
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
```


## Using run testing with docker container.

#### 1. Clone repository from github
```bash
$ git Clone https://github.com/nattaponra/testing.git
```

#### 2. Run phpfpm container.
```bash
cd testing/
$ docker-compose up -d
```

#### 3. Install php packages with Composer.
```bash
$ docker exec -i phpfpm composer install
```
#### 4. Run Testing
```bash
$ docker exec -i phpfpm ./vendor/bin/phpunit tests
```
#### Result:
```bash
PHPUnit 6.5.13 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 26 ms, Memory: 4.00MB

OK (4 tests, 4 assertions)
```


## Using run testing with php on host.

#### 1. Clone repository from github
```bash
$ git clone https://github.com/nattaponra/testing.git
```

#### 2. Install php packages with Composer.
```bash
cd testing/source-code
$ composer install
```
#### 3. Run Testing
```bash
$ php ./vendor/bin/phpunit tests
```
#### Result:
```bash
PHPUnit 6.5.13 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 26 ms, Memory: 4.00MB

OK (4 tests, 4 assertions)
```


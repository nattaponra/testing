### Source Code (Main Version)
```php
    public function validateTriangle($a, $b, $c)
    {
        $isATriangle = False;                                       # 1

        if (($a < $b + $c) && ($b < $a + $c) && ($c < $a + $b)) {   # 2
            $isATriangle = True;                                    # 3
        }

        if ($isATriangle) {                                         # 4

            if ($a == $b && $b == $c) {                             # 5
                $TriangleType = "Equilateral";                      # 6

            } else if ($a != $b && $a != $c && $b != $c) {          # 7
                $TriangleType = "Scalene";                          # 8

            } else {                                                # 9
                $TriangleType = "Isosceles";                        # 10
            }

        } else {                                                    # 11
            $TriangleType = "Not a Triangle";                       # 12
        }

        return $TriangleType;                                       # 13
    }
```
### Source Code (Instrumented Version)
```php
class TriangleForTesting
{

    /**
     * @param $name
     * @param $a double
     * @param $b double
     * @param $c double
     * @return string
     */
    public function validateTriangle($name, $a, $b, $c)
    {
        $path = [];  

        $isATriangle = False;                                       $path[] = "1";  # Node 1

                                                                    $path[] = "2";
        if (($a < $b + $c) && ($b < $a + $c) && ($c < $a + $b)) {                   # Node 2
            $isATriangle = True;                                    $path[] = "3";  # Node 3
        }

        if ($isATriangle) {                                         $path[] = "4";  # Node 4

            if ($a == $b && $b == $c) {                             $path[] = "5";  # Node 5
                $TriangleType = "Equilateral";                      $path[] = "6";  # Node 6

            } else if ($a != $b && $a != $c && $b != $c) {          $path[] = "5";  $path[] = "7"; # Node 7
                $TriangleType = "Scalene";                          $path[] = "8";  # Node 8

            } else {                                                $path[] = "5"; $path[] = "7"; $path[] = "9";  # Node 9
                $TriangleType = "Isosceles";                        $path[] = "10"; # Node 10
            }

        } else {                                                    $path[] = "4"; $path[] = "11"; # Node 11
            $TriangleType = "Not a Triangle";                       $path[] = "12"; # Node 12
        }
                                                                    $path[] = "13"; # Node 13
        /** Print Path */
        sort($path);

        print_r(PHP_EOL.$name.":".implode("-", $path));

        return $TriangleType;
    }
    
}
```


### Control Flow Graph
![alt text](https://nattaponra.github.io/testing/img/Flow-Graph.png)

### Coverage Table (Branch Coverage) 

 
| Path  | Node 2 |	 Node 4 |	Node 5 |	Node 7 | Node 9 | Inputs | Expected Output |
| -------------  | -------------  | -------------  | -------------  | -------------  | -------------  | -------------  | -------------  |
| P1:1-2-3-4-5-6-13 | TRUE | TRUE |	TRUE |	- | - |	a=5,b=5,c=5	| Equilateral |
| P2:1-2-3-4-5-7-8-13 |	TRUE | TRUE |	FALSE |	TRUE | - |	a=5,b=10,c=14 |	Scalene |
| P3:1-2-3-4-5-7-9-10-13 |	TRUE |	TRUE |	FALSE |	FALSE | TRUE |	a=5,b=10,c=10 |	Isosceles |
| P4:1-2-4-11-12-13 |	FALSE |	FALSE |	- |	- | - | a=5,b=10,c=20 |	Not a Triangle |

### Test Case
```php
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
```


## Using run testing with docker container.

#### 1. Clone repository from github
```bash
$ git clone https://github.com/nattaponra/testing.git
```

#### 2. Install php packages with Composer.
```bash
$ docker run -i --rm --name phpfpm-test -v $(pwd)/source-code:/app bitnami/php-fpm:7.0 composer install
```
#### 3. Run Testing
```bash
$ docker run -i --rm --name phpfpm-test -v $(pwd)/source-code:/app bitnami/php-fpm:7.0 ./vendor/bin/phpunit tests
```
#### Result:
```bash
PHPUnit 6.5.13 by Sebastian Bergmann and contributors.

.
P1:1-2-3-4-5-6-13.
P2:1-2-3-4-5-7-8-13.
P3:1-2-3-4-5-7-9-10-13.                                                                4 / 4 (100%)
P4:1-2-4-11-12-13

Time: 50 ms, Memory: 4.00MB

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

.
P1:1-2-3-4-5-6-13.
P2:1-2-3-4-5-7-8-13.
P3:1-2-3-4-5-7-9-10-13.                                                                4 / 4 (100%)
P4:1-2-4-11-12-13

Time: 50 ms, Memory: 4.00MB

OK (4 tests, 4 assertions)
```


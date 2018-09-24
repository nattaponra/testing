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
| Path  | Decision | Inputs | Expected Output |
| ------------- | ------ | ------- | ------------- | ------------- |
| Content Cell  | Content Cell  | | |
| Content Cell  | Content Cell  | | |

### Coverage Table (Branch Coverage) 

    - Path

    - Decision

    - Inputs

    - Expected Output

 

## Using run testing via docker container.

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


## Using run testing via php on host.

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


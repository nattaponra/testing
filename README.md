## Using run testing via docker container.

#### 1. Cone repository from github
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


### Using with docker container.

#### 1. Run phpfpm container.
```bash
$ docker exec -i phpfpm composer install
```

#### 2. Install php packages with Composer.
```bash
$ docker exec -i phpfpm composer install
```
#### 3. Run Testing
```bash
$ docker exec -it phpfpm ./vendor/bin/phpunit test
```
#### Result:
```bash
PHPUnit 6.5.13 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 25 ms, Memory: 4.00MB

OK (1 test, 1 assertion)
```


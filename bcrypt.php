<?php
/**
 * Created by PhpStorm.
 * User: yonman
 * Date: 10/01/2017
 * Time: 5:09 PM
 */

$autoload = __DIR__ . '/vendor/autoload.php';

if (file_exists($autoload)) {
    require $autoload;
}

if (!class_exists('Zend\Loader\AutoloaderFactory')) {
    throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
}

$bcrypt = new Zend\Crypt\Password\Bcrypt;

if ($argc < 2) {
    printf("Usage: php bcrypt.php <password> [cost]\n");
    printf("where <password> is the user's password and [cost] is the value\nof the cost parameter of bcrypt (default is %d).\n", $bcrypt->getCost());
    exit(1);
}

if (isset($argv[2])) {
    $bcrypt->setCost($argv[2]);
}
printf ("%s\n", $bcrypt->create($argv[1]));

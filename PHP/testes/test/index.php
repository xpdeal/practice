<?php

require_once __DIR__ . '/vendor/autoload.php';

use Elvis\Test\Model\Usuario;


$ob = new Usuario('elvis');

echo var_dump($ob);

?>

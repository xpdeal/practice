<?php
$search = 'Hello, World';

$func = function() use($search) {
    echo str_replace(',', '', $search);
};

echo $func().PHP_EOL; // Hello World

$arrow = fn($texto) => str_replace(',', '',$texto);
echo $arrow($search);
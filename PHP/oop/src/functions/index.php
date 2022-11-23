<?php

echo '<h1> Funções Anônimas e Arrou Functions</h1>';
echo '<hr';
echo '<h2> Funções Anônimas Exemplo 1</h2>';
$numeros =[10,13,15,20,27,29,35,40];
echo"<pre>";print_r($numeros);echo"</pre>";

//FIltarar multiplos de 10

$multiplo = 3;
echo"<pre>";print_r($multiplo);echo"</pre>";
$filtrar = function($item) use ($multiplo){
    return ($item % $multiplo) == 0;
};
$numeros = array_filter($numeros, $filtrar);

// $numeros = array_filter($numeros, function($item){
//     return ($item % 10) == 0;
// });

echo"<pre>";print_r($numeros);echo"</pre>";

echo '<h2> Exemplo 2</h2>';

$formatar = function($texto){
    return '_'.strtoupper($texto).'_';
};

// $texto = $formatar('elvis');
echo"<pre>"; print_r($formatar('elvis'));echo"</pre>";
echo"<pre>"; print_r($formatar('tatiana'));echo"</pre>";

echo '<h2> Exemplo 3</h2>';

$functions = [
    'up' => function($texto){
        return strtoupper($texto);
    },
    'down' => function($texto){
        return strtolower($texto);    
    },
    'hide' => function($texto){
        return str_pad('',strlen($texto),'*');
    }
];

echo"<pre>"; print_r($functions['up']('elvis'));echo"</pre>";
echo"<pre>"; print_r($functions['down']('elvis'));echo"</pre>";
echo"<pre>"; print_r($functions['hide']('elvis'));echo"</pre>";


echo '<h2> Exemplo 4</h2>';

function getFunction($tipo){
    switch ($tipo){
        case 'up': 
            return function($texto){
                return strtoupper($texto);
            };
        case 'down': 
            return function($texto){
                return strtolower($texto);
            };
        case 'hide': 
            return function($texto){
                return str_pad('',strlen($texto),'*');
            };
    }
}

echo"<pre>"; print_r(getfunction('up')('elvis'));echo"</pre>";
echo"<pre>"; print_r(getfunction('down')('elvis'));echo"</pre>";
echo"<pre>"; print_r(getfunction('hide')('elvis'));echo"</pre>";



echo '<h2> Exemplo 5</h2>';

$numeros =[10,13,15,20,27,29,35,40];
echo"<pre>";print_r($numeros);echo"</pre>";
$multiplo = 5;
$filtrar = fn($item)=> ($item % $multiplo)==0;
// $numeros = array_filter($numeros, fn($item)=> ($item % 10)==0);
$numeros = array_filter($numeros, $filtrar);
echo"<pre>";print_r($numeros);echo"</pre>";


echo '<h2> Exemplo 6 </h2>';
$arrowFunctions = [
    'numeros' => fn($texto) => preg_replace('/\D/','',$texto),
    'maisculas' => fn($texto) => preg_replace('/[^A-Z]/','',$texto),
    'minusculas' => fn($texto) => preg_replace('/[^a-z]/','',$texto),
];
echo"<pre>";print_r($arrowFunctions['numeros']('elvis-2022'));echo"</pre>";
echo"<pre>";print_r($arrowFunctions['maisculas']('ELVIS 2022'));echo"</pre>";
echo"<pre>";print_r($arrowFunctions['minusculas']('elvis 2022'));echo"</pre>";


echo '<h2> Exemplo 7 </h2>';

function getArrowFunctions($tipo){
    switch($tipo){
        case 'numeros':
            return fn($texto) => preg_replace('/\D/','',$texto);
        case 'maisculas':
            return fn($texto) => preg_replace('/[^A-Z]/','',$texto);
        case 'minusculas':
            return fn($texto) => preg_replace('/[^a-z]/','',$texto);
    };
}

echo"<pre>";print_r(getArrowFunctions('numeros')('elvis-2022'));echo"</pre>";
echo"<pre>";print_r(getArrowFunctions('maisculas')('ELVIS 2022'));echo"</pre>";
echo"<pre>";print_r(getArrowFunctions('minusculas')('elvis 2022'));echo"</pre>";

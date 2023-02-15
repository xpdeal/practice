<?php
// $data = [
// 	1 => [
// 		'titular' => 'alberto',
// 		'saldo' => 300
// 	],
// 	2 => [
// 		'titular' => 'Maria',
// 		'saldo' => 500
// 	],
// 	3 => [
// 		'titular' => 'Gabriel',
// 		'saldo' => 100
// 	],
// ];
$data = require 'dados.php';

$members = $data['members'];


var_dump($members);

//VERIFICAÇÂO


// echo array_search(1, $data);
//  var_dump(in_array('Alberto', $data));
// var_dump(array_key_exists(1, $data));



// ORDENAR
// function ordenacao($saldo1, $saldo2): int
// {
// 	return $saldo1['name'] <=> $saldo2['name'];
// }

// uksort($data);
// ksort($data);
// krsort($data);
// rsort($data);
// sort($data);
// asort($data);
// arsort($data);
// uksort($data, 'ordenacao');
// uasort($data['members'], 'ordenacao');
// echo "<pre>";
//  var_dump($data);
// usort($data, 'ordenacao');

// $data['members'] = array_map(function ($base){
// $base['name'] = strtoupper($base['name']);
// return $base;

// }, $data['members']);

// foreach($data['members'] as $key => $value){
// 	 echo $value['name'].PHP_EOL;	
// 	// var_dump($value['name']);
// }

//////////////////SENARIO 1

// function ordenacao($saldo1, $saldo2): int
// {
// 	if ($saldo1['saldo'] > $saldo2['saldo']) {
// 	return -1;
// 	}

// 	if ($saldo2['saldo'] > $saldo1['saldo']) {
// 	return 1;
// 	}

// 	return 0;
// }

// foreach($data as $item){
// 	echo $item['titular']." Saldo".$item['saldo'].PHP_EOL;	
// }
/*-------------------------------------------------------------------*/


///////////////// ARRAYS CONTADORES
// foreach($data as $item){
// $dado[]= $item;
// }

// var_dump($data);
// for ($i=1;$i<=count($data);$i++) {
//     echo $data[$i]['titular'].PHP_EOL;
// }

//MAPA
//  $data = array_map(function($dados){
// $dados['titular'] = strtoupper($dados['titular']);
// return $dados;
// },$data );
// echo $data[1]['titular'];


// $i =0;
// foreach($data as $item){
// echo $item['titular']." Saldo = ".$item['saldo'].PHP_EOL;
// $i++;
// }


// echo "<pre>";
// var_dump($data[1]['titular']);exit;

// foreach($data as $key => $value){
// echo $key.PHP_EOL;
// }

// for($i=1;$i<=count($data);$i++){
// 	echo $data[$i]['titular'].PHP_EOL;
// }

// foreach($data as $item){
// 	echo $item['titular'].PHP_EOL;
// }

// foreach ($data as $key => $val) {
// echo $key." - ";
//     foreach ($val as $item => $value) {
// 		echo $item." = ".$value.PHP_EOL;
//     }
// }


// extract($data);
// echo "\$titulo => $titulo";



///////////////////////////////////////////
/** Função */
// function qualquer(): string
// {
// 	return 'ola mundo';
// }
// echo qualquer();

/** Callable */
// function outra($funcao): void
// {
// 	echo 'Executando outra funcao:';
// 	echo $funcao();
// }
// outra('qualquer');

// outra(function (){
// return 'Uma outra função';
// });

/** Variavvel recebe uma função anonima */
// $funcao = function (){
// 	return 'Uma outra função';
// 	};
// outra($funcao);
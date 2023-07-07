<?php

session_start();

//Define algumas constantes 
const CAPTCHA_NUMCHARS = '6';
define('CAPTCHA_WIDTH', 100);
define('CAPTCHA_HEIGTH', 25);

// Gera a senha aleatória
$pass_phrase = "";
for ($i = 0; $i < CAPTCHA_NUMCHARS; $i++) {
    $pass_phrase .=chr(rand(97,122));
}

//Armazena a senha criotografada em uma variavel de sessão
$_SESSION['pass_phrase'] = sha1($pass_phrase);

//Cria a imagem
$img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGTH);

//Define um fundo branco com texto preto e gráfico cinza
$bg_color = imagecolorallocate($img, 255,255,255); //branco
$text_color = imagecolorallocate($img, 0,0,0); //preto
$graphic_color = imagecolorallocate($img, 64,64,64); //cinza escuro

//Preenche o fundo
imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGTH, $bg_color);

//Desenha algumas linhas aleatorias
for ($i = 0; $i < 5; $i++) {
    imageline($img, 0, rand() % CAPTCHA_HEIGTH, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGTH, $graphic_color);
}

//Insere algums pontos aleatorios
for ($i = 0; $i < 50; $i++) {
    imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGTH, $graphic_color);
}

//Desenha a string da senha
imagettftext($ima, 18, 0, 5, CAPTCHA_HEIGTH - 5, $text_color, "Courier New Bold.tff", $pass_phrase);
//Faz output da imagfem como png, usando um cabeçalho
header("Content-type: image/png");
imagepng($img);
//Apaga a imagem
imagedestroy($img);
?>
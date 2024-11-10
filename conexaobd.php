<?php 
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bd = 'pokedesk';

$conn = mysqli_connect($host, $usuario, $senha, $bd);

if (mysqli_connect_error()) {
    echo "Não foi possível se conectar ao banco.";
    die();
}


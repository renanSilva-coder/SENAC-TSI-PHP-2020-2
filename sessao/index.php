<?php

// ini_set('display_errors', 0);
// ini_set('display_startup_errors',0);
// // error_reporting(E_ALL);

session_start();
$sessaoUsuario = $_SESSION['sessaoDoUser'] = 'Usuário';

$credenciais = [	0 => ['user' => 'renan@senac.br',	'pass' => '123'],
					1 => ['user' => 'bono@senac.br'	, 	'pass' => '321'],
					2 => ['user' => 'nathy@senac.br', 	'pass' => '132']];

if (isset($_SESSION['login'])) { //Caso o usuario ja esteja logado no sistema
	
	include 'index_menu_tpl.php';

} elseif ( isset($_POST['entrar']) ) { // Caso o usuario preencheu o form de login

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	if ( in_array ( ['user' => $login, 'pass'=> $senha], $credenciais)){

		$_SESSION['login'] = $login;

		include 'index_menu_tpl.php';

	}else{
	$msg = 'Credenciais inválidas, tente novamente!';
	include 'index_tpl.php';
	}	

}else{// Caso o usuario tenha acabado de chegar no sistema
	include 'index_tpl.php';
}


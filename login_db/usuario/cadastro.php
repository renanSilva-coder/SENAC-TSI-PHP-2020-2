<?php

require 'model/dados.php';

if(isset($_POST['cadastrar'])){
	
	require 'controller/consistencia_cadastro.php';

	$id = gravar_usuario($_POST['nome'],$_POST['email'],$_POST['senha']);

	if( $id ) {//se for false, null, 0, vazio, ele não entra cai no else;

		session_start();

		$_SESSION['login'] = $_POST['email'];

		header('Location: ../'); //o header('Location: /x') redireciona para algum diretório, arquivo. aqui está voltando duas pastas sem arquivo definido, ou seja, o index.

	}else{

		$erros = ['Não foi possível criar o usuário!'];

	}

}else{

	$erros = [];
}

include 'view/cadastro_tpl.php';
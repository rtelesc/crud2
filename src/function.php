<?php
require_once('crud.php');

    $data = json_decode(file_get_contents('php://input'), true); //recebe json postado pelo oajax
    $data = (array) $data; //  converte o json em um array para poder usar o comando ['field'];
    $_POST['acao'] = $data['acao']; 

    $acao = $_POST['acao'] ? $_POST['acao'] : "0";


if($acao  == 'logar'){
	$class = new CRUD($data);
	$class->logar();
}
<?php

session_start();

require './vendor/autoload.php';
/*
//Chamada para validação de item individualmente
$valida= new \App\Model\User\ValidaUser;
list($erros,$alerts)=$valida->valida('birth', 'Ivan');
 */
//Validação individual campos do usuário


/* Validação de todos os campos do objeto
 
$valida= new \App\Model\User\ValidaUser;
$user= new \App\Model\User\UserModel;
$user->setBairro("Populares");
$user->setBirth("23/12/2014");
$user->setCpf("10417436700");
$user->setEmail("Ivan.alves@outlook.com");
$user->setLogradouro("Argentina Bussular");
$user->setMunicipio_id(125);
$user->setName("Ivan Alves");
$user->setNumero(298);
$user->setSenha("123456");
$user->setSexo('M');


list($erros,$alerts)=$valida->validaAll($user);
*/
//Validação do objeto User - Todos os campos



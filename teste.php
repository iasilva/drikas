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

/*
  $cpf= new \Thirday\Valida\ValidaCpf;

  $my="10417736700";
  $cpf->efetivarValidacao($my);

 */

/*
  var_dump($_SESSION);
  echo '<br>';
  unset($_SESSION['user']);
  var_dump($_SESSION);
 * 
 */
/**
  $user= new App\Model\User\UserModel;
  $user->setEmail("ivan@alves.com");
  $user->setSenha("ivan@alves.com");
  $sess= new \App\Model\User\UserSession($user);
 * 
 */
/* * Testando diferença de datas */

/*
 $hoje = new \DateTime;
 
$_1900 = new \DateTime("1900-01-01");

$dataNascimento = new \DateTime("1817-07-02");

if ($dataNascimento < $_1900 || $dataNascimento > $hoje) {
    echo "Data de Nascimento inválida";
} else {
    echo "Data de Nascimento <b>Válida</b>";
}
 */

//$valida= new \Thirday\Valida\Validacao;
//$valida->validar("birth", "2017-07-10");

/*
$b= \Database::conexao();

$session= new \App\Model\Session\SessionRepository($b);

$a=$session->getAllSessionsActiveByIdUser(2);
var_dump($a);
 
 */
/*
$parser = new parseUserAgentStringClass(); // This creates a new instance of this class object.
$parser->includeAndroidName = true;
$parser->includeWindowsName = true;
$parser->includeMacOSName = true;
$parser->treatClonesAsTheRealThing = true;
$parser->treatProjectSpartanInternetExplorerLikeLegacyInternetExplorer = true;
$strAgent= filter_input(INPUT_SERVER, 'HTTP_USER_AGENT');
@$parser->parseUserAgentString($strAgent); 

echo $parser->type;*/
/*$now= new \DateTime();
$now->setTimezone(new \DateTimeZone('utc'));
echo $now->format('Y-m-d H:i:s');*/

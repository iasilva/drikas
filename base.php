<?php
session_start();
/**
 * Constante <em>DIR</em> sempre remete ao diretório root
 */
define("DIR", dirname(__FILE__));

/**
 * Constante <em>DS</em> será utilizada para separação de diretório
 */
define("DS", DIRECTORY_SEPARATOR);

/**
 * Constante <em>VIEW_DIR</em> sempre remete ao diretório root DE VIEWS
 */
    define("VIEW_DIR", DIR.DS."App".DS.'View');
    
/**
 * Constante <em>HTML_DIR</em> sempre remete ao diretório de include DE VIEWS
 */
    define('HTML_DIR', VIEW_DIR.DS.'includes'.DS);


/**
 * carrega o autoload do composer
 */
require_once DIR . DS . 'vendor' . DS . 'autoload.php';

/**
 * Instância do PDO
 */
$pdo = \Database::conexao();

/** Repositório de produtos */
$produtoRep = new \App\Model\Product\ProductRepository($pdo);

/** Repositório de imagens*/
$imageRep= new \App\Model\Image\ImageRepository($pdo);
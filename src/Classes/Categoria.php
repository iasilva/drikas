<?php


namespace Thirday\Classes;
use SimpleCrud\SimpleCrud;
/**
 * Description of Categoria
 *
 * @author ivana
 */
class Categoria {
    private $db;
    private $categories;//Armazena um array das categorias cadastradas
    public function __construct() {
      $db= \Database::conexao();
      $this->db= new \SimpleCrud\SimpleCrud($db);
    }
    public function getCategories(){
        $categorias= $this->db->category->select()->all()->orderBy('nome ASC')->run();
        return $categorias;
        
    }
    
    
}

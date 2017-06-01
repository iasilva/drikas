<?php

namespace App\Model\Category;

/**
 * Classe responsável pelas interações entre o model ProductCategory com 
 * o Banco de Dados
 *
 * @author ivana
 */
class ProductCategoryRepository implements iProductCategoryRepository {

    private $pdo; 
    private $table;
    

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
        $tbl = new ProductCategoryModel();
        $this->table = $tbl->getTable();
    }

    /**
     * Retorna todas as categorias principais
     * @return array de objetos 
     */
    public function getCategories() {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE parent is null ORDER BY name ASC");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Category\ProductCategoryModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Retorna as subCategorias de primeiro nível relacionadas a uma categoria
     */
    public function getSubCategories($idParent) {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE parent = :idParent ORDER BY name ASC");
        $stmt->bindValue(":idParent", $idParent, \PDO::PARAM_INT);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, '\App\Model\Category\ProductCategoryModel');
        $stmt->execute();
        return $stmt->fetchAll();
    }  
    /**
     * Retorna todas as categorias com a primeira linhagem de subcategorias
     * @return array de objetos
     */
    public function getAllCategories() {
        $allCategories= $this->getCategories();        
        foreach ($allCategories as $value){
            $value->setChildren($this->getSubCategories($value->getId()));
        }
        return  $allCategories;
        
    }

    public function getAllSubCategories($idParent) {
        
    }    

}

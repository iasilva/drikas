<?php

namespace Thirday\Peliculas;
use SimpleCrud\SimpleCrud;

/**
 * Description of IPeliculas
 *
 * @author ivana
 */
abstract class IPeliculas {
    protected $id;
    protected $descricao;
    protected $image_link;
    protected $category_id;
    protected $created_at;
    
    /**
     * @return array todos os dados de uma película
     */
    abstract function getPelicula();
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setImage_link($image_link) {
        $this->image_link = $image_link;
    }

    public function setCategory_id($category_id) {
        $this->category_id = $category_id;
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }


}

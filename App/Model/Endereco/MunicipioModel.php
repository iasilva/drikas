<?php

namespace App\Model\Endereco;

class MunicipioModel {

    private $id;
    private $codigo_ibge;
    private $nome;
    private $estado_id;
    
    function getId() {
        return $this->id;
    }

    function getCodigo_ibge() {
        return $this->codigo_ibge;
    }

    function getNome() {
        return $this->nome;
    }

    function getEstado_id() {
        return $this->estado_id;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setCodigo_ibge($codigo_ibge) {
        $this->codigo_ibge = $codigo_ibge;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setEstado_id($estado_id) {
        $this->estado_id = $estado_id;
        return $this;
    }


}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Endereco;

/**
 * Model da tabela Estado
 *
 * @author ivana
 */
class EstadoModel {

    private $id;
    private $codigo_uf_ibge;
    private $nome;
    private $uf;
    private $regiao_id;

    function getId() {
        return $this->id;
    }

    function getCodigo_uf_ibge() {
        return $this->codigo_uf_ibge;
    }

    function getNome() {
        return $this->nome;
    }

    function getUf() {
        return $this->uf;
    }

    function getRegiao_id() {
        return $this->regiao_id;
    }

    function setId($id) {
        if ($id > 0 and $id < 28) {
            $this->id = (int) $id;
        }
    }

    function setCodigo_uf_ibge($codigo_uf_ibge) {
        $this->codigo_uf_ibge = $codigo_uf_ibge;
       
    }

    function setNome($nome) {
        $this->nome = $nome;
  
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setRegiao_id($regiao_id) {
        $regiao_id = (int) $regiao_id;
        if ($regiao_id > 0 and $regiao_id < 6) {
            $this->regiao_id = $regiao_id;
        }
    }

}

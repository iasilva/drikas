<?php
namespace App\Model\User;

class UserModel {
    private $id;
    private $name;
    private $cpf;
    private $sexo;
    private $email;
    private $senha;
    private $logradouro;
    private $numero;
    private $bairro;
    private $created_at;
    private $birth;
    private $updated_at;
    private $municipio_id;
    private $table="user";
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCreated_at() {
        return $this->created_at;
    }

    function getBirth() {
        return $this->birth;
    }

    function getUpdated_at() {
        return $this->updated_at;
    }

    function getMunicipio_id() {
        return $this->municipio_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    function setBirth($birth) {
        $this->birth = $birth;
    }

    function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    function setMunicipio_id($municipio_id) {
        $this->municipio_id = $municipio_id;
    }


    
}

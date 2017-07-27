<?php

namespace App\Model\User;

use App\Model\User\CreationUser;
use Thirday\Password\Password;

class UserModel {

    private $id;
    private $name;
    private $cpf;
    private $phone;
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
    private $cep;
    private $table = "user";

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

    function getPhone() {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }


    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCpf($cpf) {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
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

    function getTable() {
        return $this->table;
    }

    public function save() {
        $senha = new Password($this->senha);
        $this->senha = $senha->getPass();
        $creation = new CreationUser();
        return $creation->save($this);
    }
   

}

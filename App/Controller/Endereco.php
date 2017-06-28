<?php

namespace App\Controller;

use App\Model\Endereco\MunicipioRepositoryJson;
use App\Model\Endereco\MunicipioRepository;
use Thirday\Request\RequestFactory;

class Endereco extends \App\Mvc\Controller {

    private $pdo;

    public function __construct(\PDO $pdo) {
        parent::__construct();
        $this->pdo = $pdo;
    }

    /**
     * Método deve retornar todos os munícipios do estado de acordo com o nome,
     * ou parte do nome digitado. Limitando-se ao estado informado.
     * [!!!IMPORTANTE!!!] - O nome do município e o id do estado deve ser passado 
     * via POST.
     */
    public function getMunicipiosDoEstadoByNameInJson() {

        $req = new RequestFactory('post');
        $json = new MunicipioRepositoryJson($this->pdo);
        echo $json->getNomeMunicipioByNameAndEstadoId($req->captura('municipio_nome'), $req->captura('estado_id'));
    }

    public function getNomeMunicipiosDoEstadoByIdJson() {
        $req = new RequestFactory('post');
        $json = new MunicipioRepositoryJson($this->pdo);
        echo $json->getNomeMunicipiosByEstadoId($req->captura('estado_id'));
    }

    /**
     * Recebe requisição via ajax e devolve um conjunto de opções para um select de municípios
     */
    public function ajaxSelectMunicipios() {
        $req = new RequestFactory('post');
        $Repository = new MunicipioRepository($this->pdo);
        $municipios= $Repository->getMunicipiosByEstadoId($req->captura('estado_id'));
        echo "<option value=\"\">Selecione um município</option>";
        foreach ($municipios as $municipio) {
            echo "<option value=\"{$municipio->getId()}\">". $municipio->getNome() . "</option>";
        }
    }

}

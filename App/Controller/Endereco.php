<?php

namespace App\Controller;

use App\Model\Endereco\MunicipioRepositoryJson;
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

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Endereco;

/**
 * Description of iMunicipioRepository
 *
 * @author ivana
 */
abstract class iMunicipioRepository {
    abstract function getMunicipiosByEstadoId($estado_id);
    abstract function getMunicipiosByEstadoName($estado_name);
    abstract function getMunicipioById($municipio_id);
    abstract function getMunicipioByName($municipio_name);
    abstract function getMunicipioByNameAndEstadoId($municipio_name,$estado_id);
}

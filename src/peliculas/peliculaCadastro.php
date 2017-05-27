<?php

namespace Thirday\Peliculas;

/**
 * Classe responsável pelo cadastro das películas no Banco de Dados
 *
 * @author ivana
 */
class peliculaCadastro extends \Thirday\Peliculas\IPeliculas {

    private $db;

    public function __construct() {
        $con = \Database::conexao();
        $this->db = new \SimpleCrud\SimpleCrud($con);
    }

    public function exec() {
        $this->capturaFormularioPost();
        $this->verificaIntegridade();
        $this->insert();
    }

    /**
     * Método tem a função de registrar o link para a imagem a partir do root do site
     * 
     */
    public function setImageLink($link) {
        $this->image_link = $link;
    }

    /**
     * Captura os dados do formulário e armazena na classe pai - Interface.
     * O método também gera a data de criação, uma vez que só é chamado no momento de cadastro
     */
    private function capturaFormularioPost() {
        $this->descricao = filter_input(INPUT_POST, "descricao", FILTER_DEFAULT);
        $this->category_id = filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function getPelicula() {
        echo $this->descricao;
    }

    private function verificaIntegridade() {
        if ($this->category_id == "" or $this->created_at == "" or $this->image_link == "") {
            throw new \Exception("Algum dos campos obrigatórios não estão preenchidos");
        }
    }
    private function insert(){
        $novaPelicula = $this->db->pelicula->
                create(['descricao' => $this->descricao,
                        'image_link'=> $this->image_link,
                        'created_at'=> $this->created_at,
                        'category_id'=> $this->category_id
                    ]);
        if(!$novaPelicula->save()){
            throw new \Exception("Houve algum erro ao registrar a película no banco de dados.",E_USER_ERROR);
        }
    }

}

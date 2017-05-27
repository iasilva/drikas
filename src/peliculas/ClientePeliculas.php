<?php

namespace Thirday\Peliculas;

/**
 * Description of ClientePeliculas
 *
 * @author Ivan Alves da Silva
 * @version 1.0
 * @copyright (c) 2017, Ivan Alves da Silva
 */
class ClientePeliculas {

    /**
     * Método promove a exibição de uma película na página de exibição inicial
     * das películas. Responsável por exibir o html formatado com 1 item apenas
     * 
     * @param int $id Código da película a ser visualisada 
     */
    private $db;
    /**
     *
     * @var string define o tipo de visualização 
     */
    private $typeOfView;

    public function __construct() {
        $con = \Database::conexao();
        $this->db = new \SimpleCrud\SimpleCrud($con);
        $this->configure();
    }
    /**
     * Verifica qual ao objetivo inicialmente com as películas
     * Caso exista a variável "view" sendo passada por GET, esse método entende 
     * que se trata de visualizaçao      
     */
    public function configure(){
        if(isset($_GET['view'])){          
            $this->typeOfView=filter_input(INPUT_GET, "view",FILTER_DEFAULT);
            $this->defineView();
        }       
    }
    /**
     * Verífica o tipo de visualização solicitada através da variável GET-> view
     * Caso seja 'all' ele já manda direto para visualizar tudo
     */
    private function defineView(){
        switch ($this->typeOfView) {
            case "all":
                $this->viewAll();
                break;
            case "byCategory":
                if(isset($_GET['id'])){
                    $category_id=filter_input(INPUT_GET, "id",257);
                    $this->viewByCategory($category_id);
                }
            default:
                break;
        }
    }

    











    /**
     * Configura e chama a classe para visualiza uma película
     * @return html com os dados solicitados
     * @param type $id código/id da película
     * @param type $desc - Descrição da película
     * @param type $img_link - Link da imagem a ser exibida
     * @param type $cat id da categoria da película
     * @param type $created - Data da criação / Registro da película no Banco de dados
     */
    private function visualizarUmaPelicula($id,$desc,$img_link,$cat,$created) {
        $pelicula=new \Thirday\Peliculas\ViewPelicula;
        $pelicula->setId($id);
        $pelicula->setDescricao($desc);
        $pelicula->setImage_link($img_link);
        $pelicula->setCategory_id($cat);
        $pelicula->setCreated_at($created);
        $pelicula->getPelicula();
    }
    
    /**
     * Consulta e lista todas as películas
     */
    private function viewAll() {
        $peliculas = $this->db->pelicula
                ->select()
                ->orderBy('id DESC')
                ->limit(300)
                ->run();
        foreach ($peliculas as $pelicula) {
            $this->visualizarUmaPelicula($pelicula->id, $pelicula->descricao, 
                  $pelicula->image_link, $pelicula->category_id,$pelicula->created_at);
        }
    }
/**
 * Lista todas as películas de uma determinada categoria
 * @param int $idCategory Id da categoria buscada
 */
    public function viewByCategory($idCategory) {
        $peliculas = $this->db->pelicula
                ->select()
                ->where("category_id={$idCategory}")
                ->orderBy('id DESC')
                ->limit(100)
                ->run();
        foreach ($peliculas as $pelicula) {
            $this->visualizarUmaPelicula($pelicula->id, $pelicula->descricao, 
                  $pelicula->image_link, $pelicula->category_id,$pelicula->created_at);
        }
    }

}

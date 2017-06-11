<?php

namespace App\Controller;

use App\Mvc\Controller;
use App\Controller\TagWithProduct;
use App\Model\Tag\TagModel;
use App\Model\Tag\CreationTag;
use App\Model\Tag\TagRepository;

/**
 * Description of Tag
 *
 * @author ivana
 */
class Tag extends Controller {

    /**
     * Array de tags tratadas
     * @var array tags 
     */
    private $tags;
    private $pdo;

    public function __construct() {
        parent::__construct();
        $this->pdo = \Database::conexao();
    }

    /**
     * Insere as tags no Banco de dados, caso não exista, e cria chama o controller 
     * TagWithProduct para criar o relacionamento. 
     * @param type $tag
     * @param int $idProduct
     */
    public function insert(string $tag, int $idProduct) {
        $tagModel = new TagModel;
        $relacion = new TagWithProduct;
        $tagRepos = new TagRepository($this->pdo);
        $tagCreat = new CreationTag($this->pdo);
        $this->separeTags($tag);
        foreach ($this->tags as $tag) {
            if ($tag !== '') {
                $tagModel->setName(ucfirst(strtolower($tag)));
                $relacion->create($idProduct, $tagModel->save($tagRepos, $tagCreat));
            }
        }
    }

    /**
     * 
     * @param int $idTag
     * @param int $idProd
     */
    public function relationshipWithProduct(int $idTag, int $idProd) {
//        Método providencia a criação das tags inexistentes e as relaciona com 
//        o produto, se a tag já existir ele apenas relaciona com o produto;
    }

    private function separeTags(string $tag) {
        $delimiter = array(' ', ',', ',,', '-', ';');
        $tags = $tag;
        foreach ($delimiter as $valor) {
            $tags = str_replace($valor, ',', $tags);
        }
        $this->tags = explode(',', $tags);
    }

}

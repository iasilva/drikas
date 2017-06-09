<?php



namespace App\Controller;
use App\Model\Relationship\ProductTagModel;

/**
 * Description of Tag
 *
 * @author ivana
 */
class Tag {
    public function __construct() {
        parent::__construct;
    }
    public function relationshipWithProduct($tags){
//        Método providencia a criação das tags inexistentes e as relaciona com 
//        o produto, se a tag já existir ele apenas relaciona com o produto;
    }
}

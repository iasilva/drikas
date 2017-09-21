<?php

namespace App\Controller;
use App\Mvc\Controller;
use App\Model\Relationship\ProductTagModel as Prodtag;

/**
 * Description of TagWithProduct
 *
 * @author ivana
 */
class TagWithProduct extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create($product_id,$id_tag) {
        $prodTag= new Prodtag;
        $prodTag->setProduct_id($product_id);
        $prodTag->setTag_id($id_tag);
        $prodTag->save();
    }

}

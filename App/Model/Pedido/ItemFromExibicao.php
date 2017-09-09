<?php
/**
 * Created by PhpStorm.
 * User: ivana
 * Date: 06/09/2017
 * Time: 18:20
 */

namespace App\Model\Pedido;

/**
 * Class ItemFromExibicao
 * Classe apenas para criação de um model virtual para os itens que são exibidos na tela de itens em detalhamento de um pedido
 * na tela do usuário
 * @package App\Model\Pedido
 */
class ItemFromExibicao
{

    private $product;//Descrição do produto
    private $image;//nome da imagem
    private $quantity;//Quantidade desse itens solicitados no pedido
    private $quantity_in_cartoon;
    private $price;

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getQuantityInCartoon()
    {
        return $this->quantity_in_cartoon;
    }

    /**
     * @param mixed $quantity_in_cartoon
     */
    public function setQuantityInCartoon($quantity_in_cartoon)
    {
        $this->quantity_in_cartoon = $quantity_in_cartoon;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


}
<?php


namespace Thirday\Peliculas;

/**
 * Description of viewPelicula
 *
 * @author ivana
 */
class ViewPelicula extends \Thirday\Peliculas\IPeliculas {
    
    private $html;   

    public function getPelicula() {
        $this->htmlPelicula();
       echo $this->html;
    }
    public function htmlPelicula(){
        $this->html="   <article class=\"col-xs-6 col-sm-3 col-md-2\">
                <img class=\"img-responsive img-rounded\" src=\"./{$this->image_link}\">
                <div class=\"checkbox text-center\">
                    <label><input type=\"checkbox\" value=\"{$this->id} \">Eu quero</label>
                </div>
            </article>
            ";
    }
}

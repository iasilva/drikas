<?php

namespace App\Mvc;

/**
 * Description of View
 *
 * @author ivana
 */
class View {

    private $pageTitle = "Drikas Oficial. As melhores películas e joinhas de unhas";
    private $data = [];

    /**
     *
     * @var String - Diretório padrão de onde chamar os arquivos
     */
    private $folder;

    public function __construct() {
        $this->folder = DIR . DS . 'App' . DS . 'View' . DS;
    }

    public function set($key, $value) {
        $this->data[$key] = $value;
    }
    /**
     * 
     * @param string $title Define o titulo da View para ser renderizado
     */
    public function setTitle($title) {
        if (!empty($title) && ( $title !== "")) {
            $this->pageTitle = $title;
        }
    }
    /**
     * Esse método lança as variáveis que serão utilizadas na View, extraindo do 
     * array <b>data</b>, Cria a variável <b>$page_title</b> com o título da View
     * e finalmente inclui o arquivo da View.
     * @param string $file - Nome da View a ser renderizada
     */
    public function render($file) {
        $filename = $this->folder . $file . '.php';
        if (file_exists($filename)) {
            $page_title = $this->pageTitle;
            extract($this->data);
            include $filename;
        }
    }

}

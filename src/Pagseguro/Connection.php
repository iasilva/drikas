<?php

namespace Thirday\Pagseguro;

class Connection
{
    private $configFile;
    private $email;
    private $token;
    private $environment;
    private $curlSession;
    private $infoSession;
    private $link = [
        "sandbox" => "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions",
        "production" => "https://ws.pagseguro.uol.com.br/v2/sessions"
    ];

    public function __construct()
    {
        $thisDir = dirname(__FILE__);
        $this->configFile = json_decode(file_get_contents($thisDir . '/config/configPagseguro.json', FILE_TEXT));
        $this->basicConfig();
        $this->curlSession = $this->connection();
        $this->connectionSettings();
    }

    /**
     * Alimenta a classe com os dados de configuração, recuperados do arquivo /config/configPagseguro.json
     */
    private function basicConfig()
    {
        $this->email = $this->configFile->email;
        $this->environment = $this->configFile->environment;
        if ($this->environment === "sandbox") {
            $this->token = $this->configFile->tokenSandbox;
        } else {
            $this->token = $this->configFile->token;
        }
        $this->configFile = null;
    }

    private function connection()
    {
        return curl_init($this->link[$this->environment]);
    }

    /**
     * @param $curl - Recebe um handle de uma conexão com curl
     */
    private function connectionSettings()
    {
        curl_setopt($this->curlSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlSession, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curlSession, CURLOPT_POST, true);
        curl_setopt($this->curlSession, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($this->curlSession, CURLOPT_POSTFIELDS, $this->addData());
    }

    /**
     * Adiciona os dados necessários ao envio
     * @return string
     */
    private function addData()
    {
        $data['email'] = $this->email;
        $data['token'] = $this->token;
        return http_build_query($data);
    }

    private function execSession(){
        $result = curl_exec($this->curlSession);
        if($result){
            $this->infoSession= curl_getinfo($this->curlSession);
            return $result;
        }else{
            //Tratar erro da conexão
        }
    }

    public function getSession(){
        return $this->execSession();
    }

}
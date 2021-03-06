<?php

class General {

    static private $data;
    public $post;
    public $files;
    public $configuration;

    public function __construct()
    {
        $this->post = $_POST;
        $this->files = $_FILES;
    }

    public function getData(){
        return General::$data;
    }

    public function render(string $pathToFile, $data = [])
    {
        if(!empty($data)){
            General::$data = $data;
        }

        require ($pathToFile);
    }

    public function getConnection()
    {
        $conn = new mysqli($this->configuration['servername'], $this->configuration['username'], $this->configuration['password'], $this->configuration['baseName']);

        if ($conn->connect_error) {
            die("Polaczenie nieudane. Blad: " . $conn->connect_error."<br>");
        }
        return $conn;
    }


    public function is_post()
    {
        if(!empty($this->post)){
            return true;
        }

        return false;
    }

    public function redirect(string $destiny) {
        header('location:' . '/Sklep/src/index.php'. $destiny);
    }
    
    public function setDatabaseConfig($config) {
        $this->configuration = $config;
    }
}
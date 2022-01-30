<?php

require_once(__DIR__.'/db_config.php');

class DatabaseConnection  {

  private string $host;
  private string $user;
  private string $password;
  private string $database;

  protected mysqli $connection;

  public function __construct() {
    global $db_config;

    $db_config = (object)$db_config;

    $this->host = $db_config->server;
    $this->user = $db_config->login;
    $this->password = $db_config->password;
    $this->database = $db_config->database;
    $this->Connect();
    $this->SetCharset();
  }

  protected function Connect() {
    $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    
    if(!$this->connection) {
      echo "Failed to connect to database!";
    }
  }

  protected function SetCharset(){
    $this->connection->set_charset("utf8mb4");
  }

  protected function Close(){
    mysqli_close($this->connection);
  }

}


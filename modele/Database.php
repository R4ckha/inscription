<?php
namespace Model;
use \PDO;
 
class Database 
{
    private $instance = null;
 
    private $username;
    private $password;
    private $server;
	private $dbname;
 
    public function __construct(string $server, string $dbname, string $username, string $password)
    {
        $this->server = $server;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }
 
    public function getInstance()
    {
        if ($this->instance == null) {
            $this->createInstance();
        }
 
        return $this->instance;
    }

    public function query($query)
    {
        $db = $this->instance;
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
 
    private function createInstance() 
    {
        $this->instance = new PDO("mysql:host={$this->server};dbname={$this->dbname};charset=utf8", $this->username, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
}
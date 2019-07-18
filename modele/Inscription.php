<?php
namespace Model;
 
class Inscription implements Crud
{
	private $databaseManager;
	private $id;

    public function __construct(Database $databaseManager)
    {
        if($databaseManager == null) throw new Exception("DatabaseManager instance should exist");
 
        $this->databaseManager = $databaseManager;
    }
	
	private function setId(int $id) {
		$this->id = $id;
	}
	
    public function selectAll()
    {
        $req = $this->databaseManager->getInstance()->query("SELECT * FROM site_recette");
        return $req->fetchAll();
	}
	
	public function selectOne(int $id)
    {
		$this->setId($id);
		$req = $this->databaseManager->getInstance()->query("SELECT * FROM site_recette WHERE id = {$this->id}");
        return $req->fetchAll();
    }
}
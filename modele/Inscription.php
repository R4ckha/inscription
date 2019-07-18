<?php
namespace Model;
 
class Inscription implements Crud
{
	private $databaseManager;
	private $id;
	private $id_user;

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
		return $this->databaseManager->getInstance()->query("SELECT * FROM site_recette");
	}
	
	public function selectOne(int $id)
    {
		$this->setId($id);
		return $this->databaseManager->getInstance()->query("SELECT * FROM site_recette WHERE id = {$this->id}"); 
	}
	
	public function selectByUser(int $id_user)
    {
		$this->setId($id);
		return $this->databaseManager->getInstance()->query("SELECT * FROM site_recette WHERE id = {$this->id}"); 
    }
}
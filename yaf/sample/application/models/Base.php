<?php
/**
 * @name BaseModel
 * @desc 基础模型
 */
class BaseModel 
{

    protected $db;

    public function __construct() 
    {
        $this->db = new PDO('mysql:dbname=framework', 'root', 'root');
    }   
    
    public function get($sql) 
    {
        $pdoStatement = $this->db->query($sql);
        return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($sql) 
    {
        return $this->db->exec($sql);;
    }
}
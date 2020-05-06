<?php


class Tool
{
    public $id;
    public $name;

    public function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function getById($id)
    {
        $statement = database()->prepare('SELECT * FROM `tools` WHERE id = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();

        return self::createToolObj($statement->fetch());
    }

    private static function createToolObj($tool){
        return new Tool($tool['id'], $tool['name']);
    }
}
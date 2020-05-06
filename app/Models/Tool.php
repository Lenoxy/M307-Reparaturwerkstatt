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

    public static function getAll()
    {
        $statement = database()->prepare('SELECT
            id,
            name
        FROM `tools`
        ORDER BY id ASC
        ');

        $statement->execute();
        $dbResults = $statement->fetchAll();

        $tools = [];
        foreach ($dbResults as $t){
            $tools[] = self::createToolObj($t);
        }

        return $tools;
    }


    private static function createToolObj($tool){
        return new Tool($tool['id'], $tool['name']);
    }
}
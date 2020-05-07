<?php


class Urgency
{
    public $urgencyId;
    public $name;
    public $daysNeeded;

    public function __construct($urgencyId = null, $name = null, $daysNeeded = null)
    {
        $this->urgencyId = $urgencyId;
        $this->name = $name;
        $this->daysNeeded = $daysNeeded;
    }

    public static function getById($urgencyId)
    {
        $statement = database()->prepare('SELECT urgencyId, name, daysNeeded FROM urgency WHERE urgencyId = :urgencyId');
        $statement->bindParam(':urgencyId', $urgencyId);
        $statement->execute();

        return self::createUrgencyObj($statement->fetch());
    }

    public static function getByDaysNeeded($daysNeeded)
    {
        $statement = database()->prepare('SELECT urgencyId, name, daysNeeded FROM urgency WHERE daysNeeded = :daysNeeded');
        $statement->bindParam(':daysNeeded', $daysNeeded);
        $statement->execute();

        return self::createUrgencyObj($statement->fetch());
    }

    public static function getAll()
    {
        $statement = database()->prepare('SELECT
            urgencyId,
            name,
            daysNeeded
        FROM `urgency`
        ORDER BY urgencyId ASC
        ');

        $statement->execute();
        $dbResults = $statement->fetchAll();

        $urgencies = [];
        foreach ($dbResults as $u){
            $urgencies[] = self::createUrgencyObj($u);
        }

        return $urgencies;
    }

    private static function createUrgencyObj($urgency){
        return new Urgency($urgency['urgencyId'], $urgency['name'], $urgency['daysNeeded']);
    }

}
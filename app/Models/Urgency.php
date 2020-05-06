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

    private static function createUrgencyObj($urgency){
        return new Urgency($urgency['urgencyId'], $urgency['name'], $urgency['daysNeeded']);
    }

}
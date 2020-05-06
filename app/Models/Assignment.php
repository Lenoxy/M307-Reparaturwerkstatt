<?php
require_once 'app/Models/Urgency.php';
require_once 'app/Models/Tool.php';

class Assignment
{
    public $assignmentId;
    public $name;
    public $email;
    public $phone;
    public $state;
    public $urgency;
    public $tool;
    public $createdAt;

    public function __construct($assignmentId = null, $name  = null, $email = null, $phone = null, $progress = null, Urgency $urgency = null, Tool $tool = null, $createdAt = null)
    {
        $this->assignmentId = $assignmentId;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->state = $progress;
        $this->urgency = $urgency;
        $this->tool = $tool;
        $this->createdAt = $createdAt;
    }

    public function create()
    {
        $statement = database()->prepare('INSERT INTO `assignment` (name, email, phone, progress, fkUrgencyId, fkToolId, createdAt) 
            VALUES (:name, :email, :phone, :progress, :fkUrgencyId, :fkToolId, now())');
        $statement->bindParam(':name', $this->name, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $statement->bindParam(':progress', $this->state, PDO::PARAM_STR);
        $statement->bindParam(':fkUrgencyId', $this->urgency->urgencyId, PDO::PARAM_INT);
        $statement->bindParam(':fkToolId', $this->tool->id, PDO::PARAM_STR);

        return $statement->execute();
    }

    public static function getAll()
    {
        $statement = database()->prepare('SELECT
            assignmentId,
            name,
            email,
            phone,
            progress,
            fkUrgencyId,
            fkToolId,
            createdAt
        FROM `assignment`
        ORDER BY createdAt ASC
        ');

        $statement->execute();
        $dbResults = $statement->fetchAll();

        $assignments = [];
        foreach ($dbResults as $r){
            $assignments[] = self::createAssignmentObj($r);
        }

        return $assignments;
    }

    public static function getById($id)
    {
        $statement = database()->prepare('SELECT * FROM `assignment` WHERE assignmentId = :assignmentId');
        $statement->bindParam(':assignmentId', $id);
        $statement->execute();

        return self::createAssignmentObj($statement->fetch());
    }


    public function update()
    {
        $statement = database()->prepare('UPDATE `assignment` 
            SET name = :name,
                email = :email,
                phone = :phone,
                fkToolId = :fkToolId,
                progress = :progress
            WHERE assignmentId = :assignmentId
            ');
        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':fkToolId', $this->tool->id);
        $statement->bindParam(':progress', $this->state);
        $statement->bindParam(':assignmentId', $this->assignmentId);

        return $statement->execute();
    }

    public function validate(){
        $errors = [];
        if (strlen($this->name) < 2) {
            $errors[] = "Name muss mindestens zwei Zeichen beinhalten.";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalide Email";
        }
        if (strlen($this->phone) < 10){
            $errors[] = "Invalide Telefonnummer";
        }
        if (strlen($this->urgency->urgencyId) < 1) {
            $errors[] = "Invalide Dringlichkeit";
        }
        if (!isset($this->state)) {
            $errors[] = "Invalider Status";
        }
        if (strlen($this->tool->id < 1)) {
            $errors[] = "Invalides Tool";
        }
        if(!isset($this->createdAt)){
            $errors[] = "Aktuelles Datum nicht gesetzt";
        }

        return $errors;
    }


    private static function createAssignmentObj($assignment){
        return new Assignment(
            $assignment['assignmentId'],
            $assignment['name'],
            $assignment['email'],
            $assignment['phone'],
            $assignment['progress'],
            Urgency::getById($assignment['fkUrgencyId']),
            Tool::getById($assignment['fkToolId']),
            $assignment['createdAt']
        );
    }
}
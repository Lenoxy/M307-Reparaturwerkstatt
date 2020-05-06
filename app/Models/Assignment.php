<?php
require_once 'app/Models/Urgency.php';
require_once 'app/Models/Tool.php';

class Assignment
{
    public $assignmentId;
    public $name;
    public $email;
    public $phone;
    public $progress;
    public $urgency;
    public $tool;
    public $createdAt;

    public function __construct($assignmentId = null, $name  = null, $email = null, $phone = null, $progress = null, Urgency $urgency = null, Tool $tool = null, $createdAt = null)
    {
        $this->assignmentId = $assignmentId;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->progress = $progress;
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
        $statement->bindParam(':progress', $this->progress, PDO::PARAM_STR);
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
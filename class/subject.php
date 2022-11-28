<?php
class Subject{
    // Connection
    private $conn;
    // Table
    private $db_table = "Subject";
    // Columns
    public $id;
    public $name;
    public $day;
    public $time;
    public $type;
    public $group;
    public $course;
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }
    // GET ALL
    public function getSubjects(){
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    // CREATE
    public function createSubject(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        day = :day, 
                        time = :time, 
                        type = :type, 
                        group = :group, 
                        course = :course";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->day=htmlspecialchars(strip_tags($this->day));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->group=htmlspecialchars(strip_tags($this->group));
        $this->course=htmlspecialchars(strip_tags($this->course));

        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":day", $this->day);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":group", $this->group);
        $stmt->bindParam(":course", $this->course);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // READ single
    public function getSingleSubject(){
        $sqlQuery = "SELECT
                        id, 
                        name, 
                        day,
                        time,
                        type,
                        group,
                        course    
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];
        $this->day = $dataRow['day'];
        $this->time = $dataRow['time'];
        $this->type = $dataRow['type'];
        $this->group = $dataRow['group'];
        $this->course = $dataRow['course'];
    }
    // UPDATE
    public function updateSubject(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        day = :day, 
                        time = :time, 
                        type = :type, 
                        group = :group, 
                        course = :course
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->day=htmlspecialchars(strip_tags($this->day));
        $this->time=htmlspecialchars(strip_tags($this->time));
        $this->type=htmlspecialchars(strip_tags($this->type));
        $this->group=htmlspecialchars(strip_tags($this->group));
        $this->course=htmlspecialchars(strip_tags($this->course));

        // bind data
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":day", $this->day);
        $stmt->bindParam(":time", $this->time);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":group", $this->group);
        $stmt->bindParam(":course", $this->course);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // DELETE
    function deleteSubject(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}

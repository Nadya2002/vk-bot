<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/subject.php';
$database = new Database();
$db = $database->getConnection();
$items = new Subject($db);
$stmt = $items->getSubjects();
$itemCount = $stmt->rowCount();

echo json_encode($itemCount);
if($itemCount > 0){
    $subjectArr = array();
    $subjectArr["body"] = array();
    $subjectArr["itemCount"] = $itemCount;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "id" => $id,
            "name" => $name,
            "time" => $time,
            "type" => $type,
            "group" => $group,
            "course" => $course
        );
        array_push($subjectArr["body"], $e);
    }
    echo json_encode($subjectArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}

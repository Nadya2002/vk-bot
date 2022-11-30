<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/lesson.php';
$database = new Database();
$db = $database->getConnection();
$items = new Lesson($db);
$stmt = $items->getLessons();
$itemCount = $stmt->rowCount();

echo json_encode($itemCount);
if ($itemCount > 0) {
    $lessonArr = array();
    $lessonArr["body"] = array();
    $lessonArr["itemCount"] = $itemCount;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "id" => $id,
            "name" => $name,
            "time" => $time,
            "type" => $type,
            "group" => $group,
            "course" => $course
        );
        array_push($lessonArr["body"], $e);
    }
    echo json_encode($lessonArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}

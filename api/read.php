<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/lesson.php';

function get_lessons_by_group_and_day($group_n, $day_n)
{

    $database = new Database();
    $db = $database->getConnection();
    $items = new Lesson($db);
    $stmt = $items->getLessonsByGroupAndDay($group_n, $day_n);
    $itemCount = $stmt->rowCount();

    return read($itemCount, $stmt, "Нет пар сегодня");
}

function read($itemCount, $stmt, $error)
{
    if ($itemCount > 0) {
        $lessonArr = array();
        $lessonArr["body"] = array();
        $lessonArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "day" => $day,
                "time" => $time,
                "type" => $type,
                "group" => $group,
                "course" => $course
            );
            array_push($lessonArr["body"], $e);
        }
        return json_encode($lessonArr);
    } else {
        return $error;
    }
}

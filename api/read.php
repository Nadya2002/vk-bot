<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

function get_lessons_by_group_and_day($group_n, $day_n)
{
    $database = new Database();
    $db = $database->getConnection();
    if (!isset($db)) {
        return "not connect to db";
    } else {
        $items = new Lesson($db);
        $stmt = $items->getLessonsByGroupAndDay($group_n, $day_n);
        $itemCount = $stmt->rowCount();

        return read($itemCount, $stmt, "Нет пар. Отдыхай!");
    }
}


function get_lessons_by_group_and_subject($group_n, $subject_n)
{
    $database = new Database();
    $db = $database->getConnection();
    if (!isset($db)) {
        return "not connect to db";
    } else {
        $items = new Lesson($db);
        $stmt = $items->getLessonsByGroupAndSubject($group_n, $subject_n);
        $itemCount = $stmt->rowCount();

        return read($itemCount, $stmt, "Нет пар. Отдыхай!");
    }
}

function get_lessons_by_group_and_week($group_n)
{
    $database = new Database();
    $db = $database->getConnection();
    if (!isset($db)) {
        return "not connect to db";
    } else {
        $result = "";
        $items = new Lesson($db);
        $week = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        foreach ($week as $day) {
            $stmt = $items->getLessonsByGroupAndDay($group_n, $day);
            $itemCount = $stmt->rowCount();
            $day_timetable =  read($itemCount, $stmt, "Нет пар. Отдыхай!");
            $result = $result . "\n" . $day . ":" . "\n" . $day_timetable;
        }
        return $result;
    }
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
//                "id" => $id,
                "day" => translate($day),
                "time" => $time,
                "name" => translate($name),
                "type" => translate($type),
                "course" => $course,
                "group" => $group
            );
            array_push($lessonArr["body"], $e);
        }

        $translateArr = changeStructure($lessonArr["body"]);
//        return json_encode($lessonArr);
        return $translateArr;
    } else {
        return $error;
    }
}

function changeStructure($array)
{

    $result = "";

    foreach ($array as $elem) {
        $temp = implode(' - ', $elem);
        $result = $result . $temp . "\n";
    }

    return $result;
}

function translate($string)
{
    switch ($string) {
        case "lecture":
            return "лекция";
        case "practice":
            return "практика";
        case "Monday":
            return "Понедельник";
        case "Tuesday":
            return "Вторник";
        case "Wednesday":
            return "Среда";
        case "Thursday":
            return "Четверг";
        case "Friday":
            return "Пятница";
        case "Saturday":
            return "Суббота";
        case "Sunday":
            return "Воскресенье";
        case "math statistics":
            return "Математическая статистика";
        case "parallel programming":
            return "Параллельное программирование";
        case "translation methods":
            return "Методы трансляции";
        case "web development - VK":
            return "Веб-разработка (VK)";
        case "functional programming":
            return "Функциональное программирование";
        case "data analysis":
            return "Анализ данных";
        case "adv algorithm":
            return "Продвинутые алгоритмы";
        case "frontend":
            return "Фронтенд";
        case "type theory":
            return "Теория типов";
        case "english":
            return "Английский язык";
        case "number theory":
            return "Теория чисел";
        default:
            return ucfirst($string);
    }
}

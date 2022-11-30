<?php
function create_keyboard()
{
    $keyboard = [
        "one_time" => false,
        "buttons" => [
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "group"}',
                "label" => "Выбрать группу"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "week"}',
                "label" => "Показать расписание на неделю"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "day"}',
                "label" => "Выбрать день"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "subject"}',
                "label" => "Выбрать предмет"],
                "color" => "default"]]
        ]
    ];
    return $keyboard;
}

function keyboard_choose_group()
{
    $keyboard = [
        "one_time" => false,
        "buttons" => [[
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "34"}',
                "label" => "34"],
                "color" => "default"],  //green
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "35"}',
                "label" => "35"],
                "color" => "default"],  //purple
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "36"}',
                "label" => "36"],
                "color" => "default"],  //dark blue
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "37"}',
                "label" => "37"],
                "color" => "default"]   //blue
        ]]];
    return $keyboard;
}

function keyboard_choose_day()
{
//    $keyboard = [
//        "one_time" => false,
//        "buttons" => [
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "mon"}',
//                "label" => "Понедельник"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "tue"}',
//                "label" => "Вторник"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "wed"}',
//                "label" => "Среда"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "thu"}',
//                "label" => "Четверг"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "fri"}',
//                "label" => "Пятница"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "sat"}',
//                "label" => "Суббота"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "sun"}',
//                "label" => "Воскресенье"],
//                "color" => "default"]]
//        ]
//    ];
//    return $keyboard;
}


function keyboard_choose_subject()
{
//    $keyboard = [
//        "one_time" => false,
//        "buttons" => [
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "ms"}',
//                "label" => "Математическая статистика"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "mpp"}',
//                "label" => "Параллельное программирование"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "da"}',
//                "label" => "Анализ данных"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "mt"}',
//                "label" => "Методы трансляции"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "en"}',
//                "label" => "Английский язык"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "fp"}',
//                "label" => "Функциональное программирование"],
//                "color" => "default"]]
//        ]
//    ];
//    return $keyboard;
}
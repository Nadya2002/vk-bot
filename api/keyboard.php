<?php
function create_keyboard($group)
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
                "payload" => '{"button": "week", "group": "' . $group . '"}',
                "label" => "Показать расписание на неделю"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "day", "group": "' . $group . '"}',
                "label" => "Выбрать день"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "subject", "group": "' . $group . '"}',
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
        "buttons" => [
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "34"}',
                "label" => "34"],
                "color" => "default"]],  //green
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "35"}',
                "label" => "35"],
                "color" => "default"]],  //purple
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "36"}',
                "label" => "36"],
                "color" => "default"]],  //dark blue
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "37"}',
                "label" => "37"],
                "color" => "default"]],   //blue
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "38"}',
                "label" => "38"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "39"}',
                "label" => "39"],
                "color" => "default"]]
        ]
    ];
    return $keyboard;
}

function keyboard_choose_day($group)
{
    $keyboard = [
        "one_time" => false,
        "buttons" => [
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "mon", "group": "' . $group . '"}',
                "label" => "Понедельник"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "tue", "group": "' . $group . '"}',
                "label" => "Вторник"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "wed", "group": "' . $group . '"}',
                "label" => "Среда"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "thu", "group": "' . $group . '"}',
                "label" => "Четверг"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "fri", "group": "' . $group . '"}',
                "label" => "Пятница"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "sat", "group": "' . $group . '"}',
                "label" => "Суббота"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "sun", "group": "' . $group . '"}',
                "label" => "Воскресенье"],
                "color" => "default"]]
        ]
    ];
    return $keyboard;
}


function keyboard_choose_subject($group)
{
    $keyboard = [
        "one_time" => false,
        "buttons" => [
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "ms", "group": "' . $group . '"}',
                "label" => "Математическая статистика"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "mpp", "group": "' . $group . '"}',
                "label" => "Параллельное программирование"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "da", "group": "' . $group . '"}',
                "label" => "Анализ данных"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "mt", "group": "' . $group . '"}',
                "label" => "Методы трансляции"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "en", "group": "' . $group . '"}',
                "label" => "Английский язык"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "fp", "group": "' . $group . '"}',
                "label" => "Функциональное программирование"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "php", "group": "' . $group . '"}',
                "label" => "Веб-разработка (VK)"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "adv-alg", "group": "' . $group . '"}',
                "label" => "Продвинутые алгоритмы"],
                "color" => "default"]]
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "front", "group": "' . $group . '"}',
//                "label" => "Фронтенд"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "tt", "group": "' . $group . '"}',
//                "label" => "Теория типов"],
//                "color" => "default"]],
//            [["action" => [
//                "type" => "text",
//                "payload" => '{"button": "tn", "group": "' . $group . '"}',
//                "label" => "Теория чисел"],
//                "color" => "default"]]
        ]
    ];
    return $keyboard;
}
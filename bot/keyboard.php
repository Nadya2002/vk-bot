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
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "35"}',
                "label" => "35"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "36"}',
                "label" => "36"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"button": "37"}',
                "label" => "37"],
                "color" => "default"]],
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
                "payload" => '{"day": "mon", "group": "' . $group . '"}',
                "label" => "Понедельник"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"day": "tue", "group": "' . $group . '"}',
                "label" => "Вторник"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"day": "wed", "group": "' . $group . '"}',
                "label" => "Среда"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"day": "thu", "group": "' . $group . '"}',
                "label" => "Четверг"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"day": "fri", "group": "' . $group . '"}',
                "label" => "Пятница"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"day": "sat", "group": "' . $group . '"}',
                "label" => "Суббота"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"day": "sun", "group": "' . $group . '"}',
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
                "payload" => '{"subject": "ms", "group": "' . $group . '"}',
                "label" => "Математическая статистика"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "mpp", "group": "' . $group . '"}',
                "label" => "Параллельное программирование"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "da", "group": "' . $group . '"}',
                "label" => "Анализ данных"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "mt", "group": "' . $group . '"}',
                "label" => "Методы трансляции"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "en", "group": "' . $group . '"}',
                "label" => "Английский язык"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "fp", "group": "' . $group . '"}',
                "label" => "Функциональное программирование"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "php", "group": "' . $group . '"}',
                "label" => "Веб-разработка (VK)"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "adv-alg", "group": "' . $group . '"}',
                "label" => "Продвинутые алгоритмы"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "front", "group": "' . $group . '"}',
                "label" => "Фронтенд"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "more", "group": "' . $group . '"}',
                "label" => "Еще предметы..."],
                "color" => "default"]]
        ]
    ];
    return $keyboard;
}

function keyboard_choose_subject_next($group)
{
    $keyboard = [
        "one_time" => false,
        "buttons" => [
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "tn", "group": "' . $group . '"}',
                "label" => "Теория чисел"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "android", "group": "' . $group . '"}',
                "label" => "Андроид"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "os-adv", "group": "' . $group . '"}',
                "label" => "Оси - advanced"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "c++", "group": "' . $group . '"}',
                "label" => "Advanced C++"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "ios", "group": "' . $group . '"}',
                "label" => "IOS (VK)"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "rust", "group": "' . $group . '"}',
                "label" => "Rust"],
                "color" => "default"]],
            [["action" => [
                "type" => "text",
                "payload" => '{"subject": "back", "group": "' . $group . '"}',
                "label" => "Предыдущие предметы..."],
                "color" => "default"]],
        ]
    ];
    return $keyboard;
}
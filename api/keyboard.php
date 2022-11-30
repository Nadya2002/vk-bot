<?php
function create_keyboard(){
    $keyboard = [
        "one_time" => false,
        "buttons" => [[
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "1"}',
                "label" => "Выбери группу"],
                "color" => "default"],
        ]]];
    return $keyboard;
}

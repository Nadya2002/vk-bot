<?php
function create_keyboard()
{
    $keyboard = [
        "one_time" => false,
        "buttons" => [[
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "1"}',
                "label" => "Выбрать группу"],
                "color" => "default"],
        ]]];
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
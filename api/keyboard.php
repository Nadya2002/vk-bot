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
                "color" => "primary"],
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
                "color" => "#77D496"],  //green
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "35"}',
                "label" => "35"],
                "color" => "#5748A8"],  //purple
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "36"}',
                "label" => "36"],
                "color" => "#5748A8"],  //dark blue
            ["action" => [
                "type" => "text",
                "payload" => '{"button": "37"}',
                "label" => "37"],
                "color" => "#2Af7ED"]   //blue
        ]]];
    return $keyboard;
}
<?php

function bot_sendMessage($user_id, $text)
{
    $users_get_response = vkApi_usersGet($user_id);
    $user = $users_get_response->response[0];
    if ($text == "Выбрать группу") {
        $keyboard = keyboard_choose_group();
    } else {
        $keyboard = create_keyboard();
    }
    $msg = "Привет, {$user->first_name}!" . $text;
    vkApi_messagesSend($user_id, $msg, $keyboard);
}
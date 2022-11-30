<?php

function bot_sendMessage($user_id, $text, $payload)
{
    $users_get_response = vkApi_usersGet($user_id);
    $user = $users_get_response->response[0];
    if ($text == "Выбрать группу") {
        $keyboard = keyboard_choose_group();
    } else {
        $keyboard = create_keyboard();
    }
//    switch ($payload){
//        case
//    }
    $msg = "Привет, {$user->first_name}!" . $text . " hello " . $payload . " abcd";
    vkApi_messagesSend($user_id, $msg, $keyboard);
}
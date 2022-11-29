<?php

function bot_sendMessage($user_id)
{
    $users_get_response = vkApi_usersGet($user_id);
    $user = $users_get_response->response[0];
    $msg = "Привет, {$user->first_name}!";

    vkApi_messagesSend($user_id, $msg);
}
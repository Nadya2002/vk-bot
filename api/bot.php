<?php

define('VK_API_VERSION', '5.131'); //Используемая версия API
define('VK_API_ENDPOINT', 'https://api.vk.com/method/');
define('CALLBACK_API_CONFIRMATION_TOKEN', 'dfce9f4e'); //Строка для подтверждения адреса сервера из настроек Callback API
define('VK_API_ACCESS_TOKEN', 'vk1.a.9j7qT1t6Q0Ck1sd74dyc38cboQacFV8WOIwlfC8PO-nzxcPZ6-8KArJ8P6A5Vfy5VVT_FzgVvr7ZQpovh2GvFdTMyDgtQ4W_XqI0Vdpg7LUdgw0WBg3fSSuBQq8SA5w22MNRMFZEt9YwsHelV0NLa_6RujYLHZeImP9fP8sPJZrrcZUy_MvPjoFRTEmWLuKi-xZbsW9AvROhiiOyEzLM2w'); //Ключ доступа сообщества


function bot_sendMessage($user_id)
{
    $token = 'vk1.a.9j7qT1t6Q0Ck1sd74dyc38cboQacFV8WOIwlfC8PO-nzxcPZ6-8KArJ8P6A5Vfy5VVT_FzgVvr7ZQpovh2GvFdTMyDgtQ4W_XqI0Vdpg7LUdgw0WBg3fSSuBQq8SA5w22MNRMFZEt9YwsHelV0NLa_6RujYLHZeImP9fP8sPJZrrcZUy_MvPjoFRTEmWLuKi-xZbsW9AvROhiiOyEzLM2w';
//    $users_get_response = vkApi_usersGet($user_id);
//    $user = array_pop($users_get_response);
//    $msg = "Привет, {$user['first_name']}!";
//
//    log_msg("in bot send message" . $msg);
//    vkApi_messagesSend($user_id, $msg);
    $user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&access_token={$token}&v=5.103"));

//и извлекаем из ответа его имя
    $user_name = $user_info->response[0]->first_name;

//С помощью messages.send отправляем ответное сообщение
    $request_params = array(
        'message' => "Hello, {$user_name}!",
        'peer_id' => $user_id,
        'access_token' => $token,
        'v' => '5.103',
        'random_id' => '0'
    );

    $get_params = http_build_query($request_params);

    file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);
}
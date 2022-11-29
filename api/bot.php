<?php

function bot_sendMessage($user_id)
{
//    $users_get_response = vkApi_usersGet($user_id);
//    $user = array_pop($users_get_response);
//    $msg = "Привет, {$user['first_name']}!";
//
//    vkApi_messagesSend($user_id, $msg);

    $token = VK_API_ACCESS_TOKEN;
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

    file_get_contents('https://api.vk.com/method/messages.send?'. $get_params);

}
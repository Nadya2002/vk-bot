<?php

function vkApi_messagesSend($peer_id, $message, $keyboard, $attachments = array())
{
    $request_params = array(
        'message' => $message,
        'peer_id' => $peer_id,
        'access_token' => VK_API_ACCESS_TOKEN,
        'keyboard' => json_encode($keyboard, JSON_UNESCAPED_UNICODE),
        'v' => '5.103',
        'random_id' => '0'
    );

    $get_params = http_build_query($request_params);

    file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);
}

function vkApi_usersGet($user_id)
{
    $token = VK_API_ACCESS_TOKEN;

    $user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&access_token={$token}&v=5.103"));

    return $user_info;
}

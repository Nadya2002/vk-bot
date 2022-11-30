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

function _vkApi_call($method, $params = array())
{
    $params['access_token'] = VK_API_ACCESS_TOKEN;
    $params['v'] = VK_API_VERSION;
    $params['random_id'] = '0';

    $query = http_build_query($params);
    $url = VK_API_ENDPOINT . $method . '?' . $query;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($curl);
    $error = curl_error($curl);
    if ($error) {
        log_error($error);
        throw new Exception("Failed {$method} request");
    }

    curl_close($curl);

    $response = json_decode($json, true);
    if (!$response || !isset($response['response'])) {
        log_error($json);
        throw new Exception("Invalid response for {$method} request");
    }

    return $response['response'];
}
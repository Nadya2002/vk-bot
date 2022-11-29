<?php

define('VK_API_VERSION', '5.131'); //Используемая версия API
define('VK_API_ENDPOINT', 'https://api.vk.com/method/');
define('CALLBACK_API_CONFIRMATION_TOKEN', 'dfce9f4e'); //Строка для подтверждения адреса сервера из настроек Callback API
define('VK_API_ACCESS_TOKEN', 'vk1.a.9j7qT1t6Q0Ck1sd74dyc38cboQacFV8WOIwlfC8PO-nzxcPZ6-8KArJ8P6A5Vfy5VVT_FzgVvr7ZQpovh2GvFdTMyDgtQ4W_XqI0Vdpg7LUdgw0WBg3fSSuBQq8SA5w22MNRMFZEt9YwsHelV0NLa_6RujYLHZeImP9fP8sPJZrrcZUy_MvPjoFRTEmWLuKi-xZbsW9AvROhiiOyEzLM2w'); //Ключ доступа сообщества

function vkApi_messagesSend($peer_id, $message, $attachments = array()) {
    return _vkApi_call('messages.send', array(
        'peer_id'    => $peer_id,
        'message'    => $message
    ));
}

function vkApi_usersGet($user_id) {
    return _vkApi_call('users.get', array(
        'user_id' => $user_id,
    ));
}

function _vkApi_call($method, $params = array()) {
    $params['access_token'] = VK_API_ACCESS_TOKEN;
    $params['v'] = VK_API_VERSION;
    $params['random_id'] = '0';

    $query = http_build_query($params);
    $url = VK_API_ENDPOINT.$method.'?'.$query;

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
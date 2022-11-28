<?php
if (!isset($_REQUEST)) {
    return;
}

//Строка для подтверждения адреса сервера из настроек Callback API
$confirmation_token = 'f02c2170';

//Ключ доступа сообщества
$token = 'vk1.a.9j7qT1t6Q0Ck1sd74dyc38cboQacFV8WOIwlfC8PO-nzxcPZ6-8KArJ8P6A5Vfy5VVT_FzgVvr7ZQpovh2GvFdTMyDgtQ4W_XqI0Vdpg7LUdgw0WBg3fSSuBQq8SA5w22MNRMFZEt9YwsHelV0NLa_6RujYLHZeImP9fP8sPJZrrcZUy_MvPjoFRTEmWLuKi-xZbsW9AvROhiiOyEzLM2w';

//Получаем и декодируем уведомление
$data = json_decode(file_get_contents('php://input'));

//Проверяем, что находится в поле "type"
switch ($data->type) {
//Если это уведомление для подтверждения адреса...
    case 'confirmation':
//...отправляем строку для подтверждения
        echo $confirmation_token;
        break;
//Если это уведомление о новом сообщении...
    case 'message_new':
//...получаем id его автора
        $user_id = $data->object->message->from_id;
//затем с помощью users.get получаем данные об авторе
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
//Возвращаем "ok" серверу Callback API
        echo('ok');
        break;
}

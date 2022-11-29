<?php
//
//define('CALLBACK_API_EVENT_CONFIRMATION', 'confirmation');
//define('CALLBACK_API_EVENT_MESSAGE_NEW', 'message_new');
//
//require_once 'config.php';
//require_once 'global.php';
//
//require_once 'api/vk_api.php';
//require_once 'api/bot.php';
//
//if (!isset($_REQUEST)) {
//    return;
//}
//
//log_msg("start!!!");
//
//callback_handleEvent();
//
//function callback_handleEvent()
//{
//    $event = _callback_getEvent();
//
//    try {
//        switch ($event['type']) {
//            //Подтверждение сервера
//            case CALLBACK_API_EVENT_CONFIRMATION:
//                _callback_handleConfirmation();
//                break;
//
//            //Получение нового сообщения
//            case CALLBACK_API_EVENT_MESSAGE_NEW:
//                log_msg("new message");
//                $token = 'vk1.a.9j7qT1t6Q0Ck1sd74dyc38cboQacFV8WOIwlfC8PO-nzxcPZ6-8KArJ8P6A5Vfy5VVT_FzgVvr7ZQpovh2GvFdTMyDgtQ4W_XqI0Vdpg7LUdgw0WBg3fSSuBQq8SA5w22MNRMFZEt9YwsHelV0NLa_6RujYLHZeImP9fP8sPJZrrcZUy_MvPjoFRTEmWLuKi-xZbsW9AvROhiiOyEzLM2w';
//
////                _callback_handleMessageNew($event['object']);
//                $user_id = $event->object->message->from_id;
////затем с помощью users.get получаем данные об авторе
//                $user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&access_token={$token}&v=5.103"));
//
////и извлекаем из ответа его имя
//                $user_name = $user_info->response[0]->first_name;
//
////С помощью messages.send отправляем ответное сообщение
//                $request_params = array(
//                    'message' => "Hello, {$user_name}!",
//                    'peer_id' => $user_id,
//                    'access_token' => $token,
//                    'v' => '5.103',
//                    'random_id' => '0'
//                );
//
//                $get_params = http_build_query($request_params);
//
//                file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);
//                break;
//
//            default:
//                _callback_response('Unsupported event');
//                break;
//        }
//    } catch (Exception $e) {
//        log_error($e);
//    }
//
//    _callback_okResponse();
//}
//
//function _callback_getEvent()
//{
//    return json_decode(file_get_contents('php://input'), true);
//}
//
//function _callback_handleConfirmation()
//{
//    _callback_response(CALLBACK_API_CONFIRMATION_TOKEN);
//}
//
//function _callback_handleMessageNew($data)
//{
//    $user_id = $data->message->from_id;
//    bot_sendMessage($user_id);
//    _callback_okResponse();
//}
//
//function _callback_okResponse()
//{
//    _callback_response('ok');
//}
//
//function _callback_response($data)
//{
//    echo $data;
//    exit();
//}

if (!isset($_REQUEST)) {
    return;
}

//Строка для подтверждения адреса сервера из настроек Callback API
$confirmation_token = ' dfce9f4e';

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
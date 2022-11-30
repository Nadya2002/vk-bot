<?php

define('CALLBACK_API_EVENT_CONFIRMATION', 'confirmation');
define('CALLBACK_API_EVENT_MESSAGE_NEW', 'message_new');

require_once 'util/config.php';
require_once 'util/global.php';

require_once 'api/vk_api.php';
require_once 'api/bot.php';
require_once 'api/keyboard.php';

if (!isset($_REQUEST)) {
    return;
}

log_msg("start!!!");

callback_handleEvent();

function callback_handleEvent()
{
    $event = _callback_getEvent();

    try {
        switch ($event->type) {
            //Подтверждение сервера
            case CALLBACK_API_EVENT_CONFIRMATION:
                _callback_handleConfirmation();
                break;

            //Получение нового сообщения
            case CALLBACK_API_EVENT_MESSAGE_NEW:
                _callback_handleMessageNew($event->object);
                break;
            default:
                _callback_response('Unsupported event');
                break;
        }
    } catch (Exception $e) {
        log_error($e);
    }

    _callback_okResponse();
}

function _callback_getEvent()
{
    return json_decode(file_get_contents('php://input'));
}

function _callback_handleConfirmation()
{
    _callback_response(CALLBACK_API_CONFIRMATION_TOKEN);
}

function _callback_handleMessageNew($data)
{
    $message = $data->message->text;
    $user_id = $data->message->from_id;
    if (isset($data->payload)) {  //получаем payload
        $payload = json_decode($data->payload, True);
        $payload = 1;
    } else {
        $payload = null;
        $payload = 2;
    }
//    $payload = $payload['button'];


    bot_sendMessage($user_id, $message, $payload);
    _callback_okResponse();
}

function _callback_okResponse()
{
    _callback_response('ok');
}

function _callback_response($data)
{
    echo $data;
    exit();
}

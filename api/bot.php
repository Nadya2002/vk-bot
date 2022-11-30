<?php
$group_number = 0;

function bot_sendMessage($user_id, $text, $payload)
{
    $users_get_response = vkApi_usersGet($user_id);
    $user = $users_get_response->response[0];
    if ($text == "Выбрать группу") {
        $keyboard = keyboard_choose_group();
    } else {
        $keyboard = create_keyboard();
    }

    switch ($payload){
        case '34':
            $GLOBALS['group_number'] = 34;
            break;
        case '35':
            $GLOBALS['group_number'] = 35;
            break;
        case '36':
            $GLOBALS['group_number'] = 36;
            break;
        case '37':
            $GLOBALS['group_number'] = 37;
            break;
        default :
            break;
    }

    $msg = "Привет, {$user->first_name}!" . $text . " hello " . $GLOBALS['group_number'] . " abcd";

    vkApi_messagesSend($user_id, $msg, $keyboard);
}
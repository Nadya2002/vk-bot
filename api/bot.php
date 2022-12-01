<?php

$group_number = 0;

function bot_sendMessage($user_id, $text, $payload)
{
    $users_get_response = vkApi_usersGet($user_id);
    $user = $users_get_response->response[0];

    $payload_btn = $payload['button'];
    $payload_group = $payload['group'];

    switch ($payload_btn) {
        // chose group
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
        //choose day
        case 'mon':
            $day = 'Monday';
            break;
        case 'tue':
            $day = 'Tuesday';
            break;
        case 'wed':
            $day = 'Wednesday';
            break;
        case 'thu':
            $day = 'Thursday';
            break;
        case 'fri':
            $day = 'Friday';
            break;
        case 'sat':
            $day = 'Saturday';
            break;
        case 'sun':
            $day = 'Sunday';
            break;
        default :
            $GLOBALS['group_number'] = $payload_group;
            break;
    }

    switch ($text) {
        case "Выбрать группу":
            $keyboard = keyboard_choose_group();
            break;
        case "Выбрать день":
            $keyboard = keyboard_choose_day($GLOBALS['group_number']);
            break;
        case "Выбрать предмет":
            $keyboard = keyboard_choose_subject($GLOBALS['group_number']);
            break;
        default:
            $keyboard = create_keyboard($GLOBALS['group_number']);
            break;
    }

    if(isset($day)){
        log_msg("have day");
        $msg_day = get_lessons_by_group_and_day($payload_group, $day);
    } else {
        $msg_day = "не получилось";
//        $msg = "Привет, {$user->first_name}!" . $text . " hello " . $GLOBALS['group_number'] . " abcd";
    }

    $msg = "Привет, {$user->first_name}!" . $text . " hello " . $GLOBALS['group_number'] . " abcd " . $msg_day . " aaaaaaa";
    vkApi_messagesSend($user_id, $msg, $keyboard);
}
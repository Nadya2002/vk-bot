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
        case 'ms':
            $subject = 'math statistics';
            break;
        case 'mpp':
            $subject = 'parallel programming"';
            break;
        case 'da':
            $subject = 'data analysis';
            break;
        case 'mt':
            $subject = 'translation methods';
            break;
        case 'en':
            $subject = 'english';
            break;
        case 'fp':
            $subject = 'functional programming';
            break;
        case 'php':
            $subject = 'web development - VK';
            break;
        case 'adv-alg':
            $subject = 'adv algorithm';
            break;
        case 'front':
            $subject = 'frontend';
            break;
        case 'tt':
            $subject = 'type theory';
            break;
        case 'tn':
            $subject = 'number theory';
            break;
        default :
            $GLOBALS['group_number'] = $payload_group;
            break;
    }

    $group_next = ($GLOBALS['group_number'] == 0 || !isset($GLOBALS['group_number'])) ? $payload_group : $GLOBALS['group_number'];

    switch ($text) {
        case "Выбрать группу":
            $keyboard = keyboard_choose_group();
            break;
        case "Выбрать день":
            $keyboard = keyboard_choose_day($group_next);
            break;
        case "Выбрать предмет":
            $keyboard = keyboard_choose_subject($group_next);
            break;
        default:
            $keyboard = create_keyboard($group_next);
            break;
    }

    if (isset($day)) {
        log_msg("have day");
        $msg = get_lessons_by_group_and_day($payload_group, $day);
    } else if (isset($subject)) {
        log_msg("have subject");
        $msg = get_lessons_by_group_and_subject($payload_group, $subject);
    } else {
//        $msg_day = "не получилось";
        $msg = "Привет, {$user->first_name}!" . $text . " hello " . $GLOBALS['group_number'] . " abcd";
    }

//    $msg = "Привет, {$user->first_name}!" . $text . " hello " . $GLOBALS['group_number'] . " abcd " . $msg_day . " aaaaaaa";
    vkApi_messagesSend($user_id, $msg, $keyboard);
}
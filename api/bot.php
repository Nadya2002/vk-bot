<?php

$group_number = 0;

function bot_sendMessage($user_id, $text, $payload)
{
    $users_get_response = vkApi_usersGet($user_id);
    $user = $users_get_response->response[0];

    $payload_btn = $payload['button'];
    $payload_group = $payload['group'];
    $payload_day = $payload['day'];
    $payload_subject = $payload['subject'];

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
        case '38':
            $GLOBALS['group_number'] = 38;
            break;
        case '39':
            $GLOBALS['group_number'] = 39;
            break;
        case 'week':
            $week = 'has';
            break;
        default :
            $GLOBALS['group_number'] = $payload_group;
            break;
    }

    switch ($payload_day){
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
    }

    switch ($payload_subject){
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
        case 'android':
            $subject = 'android';
            break;
        case 'os-adv':
            $subject = 'os adv';
            break;
        case 'c++':
            $subject = 'c++';
            break;
        case 'ios':
            $subject = 'ios';
            break;
        case 'rust':
            $subject = 'rust';
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
        case "Предыдущие предметы...":
            $keyboard = keyboard_choose_subject($group_next);
            break;
        case "Еще предметы...":
            $keyboard = keyboard_choose_subject_next($group_next);
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
    } else if (isset($week)) {
        log_msg("have week");
        $msg = get_lessons_by_group_and_week($payload_group);
    } else {
        //Привет, Надежда!34 hello group next = gr_btm = 34 end
        $msg = "Привет, {$user->first_name}!" . $text . " hello " . $GLOBALS['group_number'] . " group next = " . $group_next . " gr_btm = " . $payload_btn . " end";
    }

//    $msg = "Привет, {$user->first_name}!" . $text . " hello " . $GLOBALS['group_number'] . " abcd " . $msg_day . " aaaaaaa";
    vkApi_messagesSend($user_id, $msg, $keyboard);
}
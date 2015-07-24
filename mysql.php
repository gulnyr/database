<?php



/*
 *********************************************Работаем с драйвером mysql************************************************
 */



// Подключаемся к базе данных

$db = mysql_connect('localhost', 'root', '');


// Выбираем базу данных

$dbb = mysql_select_db('caterpillar');


/*
 *********************************************Выбор конкретного пользователя и его id***********************************
 */


// Здесь мы выбираем таблицу пользователей, с префиксом itt_ , нас интересует конкретное имя
// В нашем случае это rytu

$ssqqll = "SELECT * FROM itt_members WHERE name = 'rytu'";

// Выполняем запрос $ssqqll

$result = mysql_query($ssqqll);

// А здесь мы с помощью цикла while проходим по ассоциативному массиву
// В нашем случае уникальный номер пользователей, который в строке member_id

while ($row = mysql_fetch_assoc($result)) {
    $members = $row['member_id'];
}

// Отображаем то, что нам нужно
// Покажет id интересующего нас пользователя

echo $members;




/*
 *********************************Здесь мы вручную добавим пользователя в базу данных***********************************
 */



// Добавим пользователя, нужно убедиться что id и логин (на всякий случай email тоже) уникальный


$insert = "
INSERT INTO itt_members
(member_id, name, member_group_id, email, joined, ip_address, posts, title, allow_admin_mails, time_offset, skin, warn_level, warn_lastwarn, language, last_post, restrict_post, view_sigs, view_img, bday_day, bday_month, bday_year, msg_count_new, msg_count_total, msg_count_reset, msg_show_notification, misc, last_visit, last_activity, dst_in_use, coppa_user, mod_posts, auto_track, temp_ban, login_anonymous, ignored_users, mgroup_others, org_perm_id, member_login_key, member_login_key_expire, has_blog, blogs_recache, has_gallery, members_auto_dst, members_display_name, members_seo_name, members_created_remote, members_disable_pm, members_l_display_name, members_l_username, failed_logins, failed_login_count, members_profile_views, members_pass_hash, members_pass_salt, member_banned, member_uploader, members_bitoptions, fb_uid, fb_emailhash, fb_lastsync, members_day_posts, live_id, twitter_id, twitter_token, twitter_secret, notification_cnt, tc_lastsync, fb_session, fb_token, ips_mobile_token, unacknowledged_warnings, ipsconnect_id, ipsconnect_revalidate_url)
VALUES
(838, 'squirrel2000', 3, 'squirrel2000@mail.ru', 1437045384, '127.0.0.1', 0, NULL, 1, '0', NULL, NULL, 0, 1, NULL, '0', 1, 1, 0, 0, 0, 0, 0, 0, 1, NULL, 1437045386, 1437045386, 0, 0, '0', '', '0', '0&0', NULL, '', '', 'ffd58fc30de3331cc5075cced30ea091', 1437650186, NULL, NULL, 0, 1, 'caterpillar', 'caterpillar', 0, 0, 'caterpillar', 'caterpillar', NULL, 0, 0, '66cbeaa7c973f82edf04ef5ae959b68b', ')fL^,', 0, 'flash', 0, 0, '', 0, '0,0', NULL, '', '', '', 0, 0, '', NULL, NULL, NULL, 0, NULL)
";

// Выполняем запрос $insert

$insertt = mysql_query($insert);

// Выполним условие на true или false

if($insertt == true) {
    echo 'Пользователь добавлен';
} else {
    echo 'Пользователь, к сожалению, не добавлен';
}





/*
 **********************************************************************************************************
 */








/*
 *********************************Здесь мы вручную добавим или заменяем пользователя в базе данных***********************************
 */



// Добавим или заменяем пользователя, здесь уже неважно какой id и логин, они просто будут заменяться


$replace = "
REPLACE INTO itt_members
(member_id, name, member_group_id, email, joined, ip_address, posts, title, allow_admin_mails, time_offset, skin, warn_level, warn_lastwarn, language, last_post, restrict_post, view_sigs, view_img, bday_day, bday_month, bday_year, msg_count_new, msg_count_total, msg_count_reset, msg_show_notification, misc, last_visit, last_activity, dst_in_use, coppa_user, mod_posts, auto_track, temp_ban, login_anonymous, ignored_users, mgroup_others, org_perm_id, member_login_key, member_login_key_expire, has_blog, blogs_recache, has_gallery, members_auto_dst, members_display_name, members_seo_name, members_created_remote, members_disable_pm, members_l_display_name, members_l_username, failed_logins, failed_login_count, members_profile_views, members_pass_hash, members_pass_salt, member_banned, member_uploader, members_bitoptions, fb_uid, fb_emailhash, fb_lastsync, members_day_posts, live_id, twitter_id, twitter_token, twitter_secret, notification_cnt, tc_lastsync, fb_session, fb_token, ips_mobile_token, unacknowledged_warnings, ipsconnect_id, ipsconnect_revalidate_url)
VALUES
(838, 'squirrel2000', 3, 'squirrel2000@mail.ru', 1437045384, '127.0.0.1', 0, NULL, 1, '0', NULL, NULL, 0, 1, NULL, '0', 1, 1, 0, 0, 0, 0, 0, 0, 1, NULL, 1437045386, 1437045386, 0, 0, '0', '', '0', '0&0', NULL, '', '', 'ffd58fc30de3331cc5075cced30ea091', 1437650186, NULL, NULL, 0, 1, 'caterpillar', 'caterpillar', 0, 0, 'caterpillar', 'caterpillar', NULL, 0, 0, '66cbeaa7c973f82edf04ef5ae959b68b', ')fL^,', 0, 'flash', 0, 0, '', 0, '0,0', NULL, '', '', '', 0, 0, '', NULL, NULL, NULL, 0, NULL)
";

// Выполняем запрос $replace

$insertt2 = mysql_query($replace);

// Выполним условие на true или false

if($insertt2 == true) {
    echo 'Пользователь заменен (добавлен)';
} else {
    echo 'Пользователь, к сожалению, не заменен (не добавлен)';
}





/*
 ***********************************************************************************************************************
 */






/*
 ************************Добавление и удаление первичного ключа*********************************************************
 */

/*
С помощью ALTER TABLE можно добавлять или удалять столбцы,
создавать или уничтожать индексы
или переименовывать столбцы либо саму таблицу.
 */

// Нас интересует создание и уничтожение индексов

// Добавим первичный ключ в member_id в таблице itt_members и выполним запрос

$ssqqll = "ALTER TABLE itt_members ADD PRIMARY KEY (member_id)";
$result = mysql_query($ssqqll);

// Выполним условие на true или false

if($result == true) {
    echo 'Первичный ключ добавлен';
} else {
    echo 'Не удалось добавить первичный ключ';
}

// Удаляем первичный ключ в member_id в таблице itt_members и выполним запрос

$ssqqqll = "ALTER TABLE itt_members DROP PRIMARY KEY";
$resultt = mysql_query($ssqqqll);

// Выполним условие на true или false

if($resultt == true) {
    echo 'Первичный ключ удален';
} else {
    echo 'Не удалось убрать первичный ключ';
}


/*
 ***********************************************************************************************************************
 */






/*
 ********************************************Удаление конкретного пользователя по id************************************
 */



// Удаляем из таблицы itt_members конкретного пользователя по id и выполним запрос

$sql="DELETE FROM itt_members WHERE member_id='8388607'";
$inserttt = mysql_query($sql);

// Выполним условие на true или false

if($inserttt == true) {
    echo 'Пользователь удален';
} else {
    echo 'Не удалось удалить пользователя';
}



/*
 **********************************************************************************************************
 */
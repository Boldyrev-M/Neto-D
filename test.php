<?php
$link = mysql_connect('localhost', 'maxik', 'maxikbmailru');
if (!$link) {
    die('Ошибка соединения: ' . mysql_errno());
}
echo 'Успешно соединились';
mysql_close($link);
?>
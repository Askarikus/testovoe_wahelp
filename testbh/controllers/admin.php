<?php

if ('GET' === $_SERVER['REQUEST_METHOD']) {
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Askarikus Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Текст, отправляемый в том случае,
    если пользователь нажал кнопку Cancel';
        exit;
    } else {
        echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
        echo "<p>Вы ввели пароль {$_SERVER['PHP_AUTH_PW']}.</p>";
        // header('Set Cookie: aaaa');

    }
}

# test_bonus
# Тестовое задание для Bonushelp

<p>Общий принцип работы заключается в перенаправлении запросов на котроллеры '/upload' для загрузки файлов в БД  
и '/send' для запуска рассылки. Контроль за рассылкой осуществляется с помощью поля в БД 'state'.</p>

Добавление базы через Docker<br>
Билдим:<br>
`docker build -t my-postgres-db ./`<br>
Запускаем:<br>
`docker run -d -p 5432:5432 my-postgres-db`<br>
Запускаем сервер:<br>
`php -S localhost:8080`<br>

Загрузка файла осуществляется командой:<br>
`curl -X POST -F 'file=@./test.csv' localhost:8080/upload`<br>
соответственно, отправка:<br>
`curl localhost:8080/send (или в браузере перейти localhost:8080/send)`
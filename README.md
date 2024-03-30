# test_wahelp
# Тестовое задание для Wahelp

<p>Общий принцип работы заключается в перенаправлении запросов на контроллеры '/generate' для создания рандомных записей
и '/retrieve' для извлечения записей по id.</p>

## Запускаем из корня проекта:<br>
`docker-compose up -d`


Создание random осуществляется командой:<br>
`curl localhost/generate`<br>
соответственно, извлечение:<br>
`curl localhost/retrieve`

# test_bonus
Test for Bonushelp

загрузка файла осуществляется командой
curl -X POST -F 'file=@./test.csv' localhost:8080/upload
соответственно, отправка 
curl localhost:8080/send (или в браузере перейти localhost:8080/send)
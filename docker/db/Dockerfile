FROM postgres
ENV POSTGRES_PASSWORD test_password
ENV POSTGRES_DB test_db
COPY test.sql /docker-entrypoint-initdb.d/

# стоит в этот проект добавить еще php и nginx для полного поднятия проекта 
# то есть закинуть все это в docker-compose
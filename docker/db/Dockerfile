FROM postgres
ENV POSTGRES_PASSWORD test_password
ENV POSTGRES_DB test_db
COPY test.sql /docker-entrypoint-initdb.d/

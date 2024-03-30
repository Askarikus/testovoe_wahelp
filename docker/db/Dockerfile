FROM postgres
ENV POSTGRES_PASSWORD test_password
ENV POSTGRES_DB test_db
ENV POSTGRES_USER test_user
COPY test.sql /docker-entrypoint-initdb.d/

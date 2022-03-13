Запуск контейнеров: `docker-compose up --build -d`

Устновить зависимости: `docker exec -it php composer install`

Обращение к консольной команды symfony: `docker exec -it php bin/console`.
Например: `docker exec -it php bin/console doctrine:migrations:diff`
project-init: cp-env build run composer-i db-migrate db-seed storage-link gen-key gen-swagger

cp-env: cp-docker-env cp-laravel-env cp-laravel-env-testing

build:
	docker-compose up -d --build

up:
	docker compose up -d

down:
	docker compose down

composer-i:
	docker-compose exec app composer install

db-migrate:
	docker-compose exec app php artisan migrate

db-fresh:
	docker-compose exec app php artisan migrate:fresh

db-seed:
	docker-compose exec app php artisan db:seed

passport-keys:
	docker-compose exec app php artisan passport:client --password

storage-link:
	docker-compose exec app php artisan storage:link

gen-key:
	docker-compose exec app php artisan key:generate

passport-install:
	docker-compose exec app php artisan passport:install

gen-swagger:
	docker-compose exec app php artisan l5-swagger:generate

cp-docker-env:
	cp ./.env.example .env

cp-laravel-env:
	cp src/.env.example src/.env

cp-laravel-env-testing:
	cp src/.env.testing.example src/.env.testing

tests:
	docker-compose exec app php artisan test

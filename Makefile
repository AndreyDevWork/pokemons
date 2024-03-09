project-init: cp-env build run composer-i db-migrate rules gen-swagger update-currency schedule-work

cp-env: cp-docker-env cp-laravel-env

build:
	docker-compose up -d --build

run:
	docker compose up -d

down:
	docker compose down

rules:
	sudo chmod 777 -R ./

update-currency:
	docker-compose exec app php artisan app:update-currency

schedule-work:
	docker-compose exec app php artisan schedule:work

composer-i:
	docker-compose exec app composer install

db-migrate:
	docker-compose exec app php artisan migrate

db-fresh:
	docker-compose exec app php artisan migrate:fresh

passport-keys:
	docker-compose exec app php artisan passport:client --password

rules:
	sudo chmod 777 -R ./

passport-install:
	docker-compose exec app php artisan passport:install

gen-swagger:
	docker-compose exec app php artisan l5-swagger:generate

cp-docker-env:
	cp ./.env.example .env

cp-laravel-env:
	cp src/.env.example src/.env

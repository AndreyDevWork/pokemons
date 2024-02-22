build:
	docker-compose up -d --build

run:
	docker compose up -d

down:
	docker compose down

rules:
	sudo chmod 777 -R ./

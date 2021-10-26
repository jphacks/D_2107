up:
	docker-compose up -d
build:
	docker-compose build
app:
	docker-compose exec app bash
restart:
	docker-compose restart
stop:
	docker-compose stop
first-install:
	docker-compose exec app composer install
	docker-compose exec app npm install
	docker-compose exec app npm update
	docker-compose exec app npm run production
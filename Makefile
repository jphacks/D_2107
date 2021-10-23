up:
	docker-compose up -d
build:
	docker-compose build
app:
	docker-compose exec app bash
restart:
	docker-compose restart
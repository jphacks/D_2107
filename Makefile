up:
	docker-compose up -d
build:
	docker-compose build
app:
	docker-compose exec app bash
restart:
	docker-compose restart
first-install:
	docker-compose exec app compser install
	docker-compose exec app npm install
	docker-compose exec app npm update
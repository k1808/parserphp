start:
	docker-compose up -d
build:
	docker-compose up -d --build
fpm:
	docker exec -it curl_fpm bash
stop:
	docker-compose down

up:
	docker-compose up
	ln -sf env/development.env .env

down:
	docker-compose down
	
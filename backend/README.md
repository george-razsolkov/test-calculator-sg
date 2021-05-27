git clone https://github.com/george-razsolkov/test-calculator-sg.git

SETUP:

docker-compose up -d

Go into ./backend directory and  copy the environment example file into .env file
cp .env.example .env

docker-compose exec app composer install => in
docker-compose exec app php artisan key:generate
docker-compose exec app chmod -R 777 storage bootstrap/cache
docker-compose exec app php artisan migrate:fresh --seed

Application can be seen on localhost port 80

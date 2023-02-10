docker-compose up -d
docker exec -it perfectpay-laravel-app sudo composer install
cp .env.example .env
docker exec -it perfectpay-laravel-app sudo php artisan migrate
docker exec -it perfectpay-laravel-app sudo php artisan route:cache
docker exec -it perfectpay-laravel-app sudo php artisan config:cache
docker exec -it perfectpay-laravel-app sudo php artisan config:clear

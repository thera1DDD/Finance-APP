cp .env.example .env

composer install

php artisan key:generate

php artisan migrate

php artisan serve

npm install && npm run dev

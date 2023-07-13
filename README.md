# Webshop til salg af legetøj til børn - lavet med Laravel

## Beskrivelse:
Denne beskrivelse er midlertidig tilføjet som fylde tekst.

### Porte:
http://localhost/<br />
http://localhost:8001/<br />

### Installation:
cd laravel-toyshop<br />
sudo mv .env.example .env<br />
composer install<br />
php artisan key:generate<br />
./vendor/bin/sail up<br />
docker exec -it laravel-toyshop-laravel.test-1 /bin/bash<br />
php artisan storage:link<br />
php artisan migrate:refresh --seed<br />

## Other reminder things:
Use one of the seeded emails from db to login, the password will always be "password" when using seeded data.<br />
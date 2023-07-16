# Webshop til salg af legetøj til børn - lavet med Laravel

## Beskrivelse:
Denne beskrivelse er midlertidig tilføjet som fylde tekst.

## Porte:
http://localhost/<br />
http://localhost:8001/<br />

## Installation:
cd laravel-toyshop<br />
sudo mv .env.example .env<br />
composer install<br />
php artisan key:generate<br />
./vendor/bin/sail up<br />
docker exec -it laravel-toyshop-laravel.test-1 /bin/bash<br />
php artisan storage:link<br />
php artisan migrate<br />

## Dokumentation:
Kort beskrivelse af dokumentationen

### laravel Sail

### Komponent opdeling af Views samt Css
Vi benytter komponenter for at opdele samt genanvende mest muligt for overskuelighed og reducering af duplikeret kode.

### Authentication
Der findes non-admin / admin adgang, det er opdelt ved boolean is_admin i User tabellen.<br />
Styring af adgang for brugere og admins sker via middlewares da vi har en normal Auth middleware samt en Admin middleware som defineres i routes.

### Validering
Validering af input fields

### Sikkerhed
CSRF beskyttelse<br />
Password Hashing<br />
mere..

### Anvendte Designmønstre
Repository pattern<br />



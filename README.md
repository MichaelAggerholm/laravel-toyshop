# Webshop til salg af legetøj til børn - lavet med Laravel

## Beskrivelse:
Denne beskrivelse er midlertidig tilføjet som fylde tekst.

## Porte:
Forside: http://localhost/ <br />
Phpmyadmin: http://localhost:8081/ <br />
Clear caches: http://localhost/clear-caches <br />
Mailhog: http://localhost:8025/ <br />
Admin panel: http://localhost/adminpanel

## Installation:
cd laravel-toyshop  <br />
sudo mv .env.example .env   <br />
composer install    <br />
php artisan key:generate    <br />
php artisan storage:link    <br />
./vendor/bin/sail up -d <br />
npm run dev (Skal muligvis have en 'npm install' ved ved første kørsel) <br />
php artisan migrate

## Exec ind i docker container:
docker exec -it laravel-toyshop-laravel.test-1 /bin/bash

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

### Database

### Models

### Controllers

### Views

### Routes

### Blade

### Vigtige kilder
Denne video er guld værd ift. Xdebug opsætning med laravel sail<br />
https://www.youtube.com/watch?v=Xgn0EtB4chc

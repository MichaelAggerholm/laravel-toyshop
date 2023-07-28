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

Laravel's routing er en stærk funktion, der giver klarhed og struktur til applikationen. <br />
Du kan hurtigt identificere, hvilke URL'er din applikation håndterer, og hvilke controller-metoder, der håndterer dem. <br /><br />
Navngivning af routes gør det nemt at generere URL'er eller redirects i din kode - for eksempel vil route('home') generere URL'en til hjemmeruten. <br/> 
Middleware kan knyttes til routes, hvilket gør det muligt at udføre kode før requesten når til din controller - dette er praktisk for ting som autentificering. <br /><br />
Route gruppering er også nyttig, da det gør det nemt at anvende fælles attributter til flere routes, som du gør med '/adminpanel' route-gruppen. <br />
Sammenlagt tilbyder Laravel's routing system stor fleksibilitet og kontrol over, hvordan din applikation håndterer indkommende HTTP-requests. <br />
Det er nemt at bruge og hjælper med at holde din applikation overskuelig og organiseret.

### Blade
Blade er Laravel's skabelonsystem, der bruger simpel PHP og en nem syntaks for at skabe dynamiske visninger. Blade-skabeloner er hurtige grundet kompilering og caching, og de giver let adgang til data sendt fra controllers. <br /><br />
Det gode ved Blade er dets intuitive syntaks og dens understøttelse af komponenter og slots til genanvendelige dele af brugergrænsefladen. Du kan også oprette master-skabeloner og udvide dem i dine visninger for at sikre genanvendelighed og konsistens. <br /><br />
Blade har mange funktioner som kontrolstrukturer (@if, @else, @foreach, @while), inklusion af sub-views med @include, service injection med @inject og formularbinding. Alt dette gør Blade til et kraftfuldt værktøj til at bygge brugergrænseflader i Laravel.

### Vigtige kilder
Denne video er guld værd ift. Xdebug opsætning med laravel sail<br />
https://www.youtube.com/watch?v=Xgn0EtB4chc

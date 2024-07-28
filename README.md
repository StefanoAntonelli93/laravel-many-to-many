# Esercizio di oggi: Laravel Boolfolio - Project Technology

## nome repo: laravel-many-to-many

Continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Technology.
Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.
I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:

-   creare la migration per la tabella technologies[x]
-   creare il model Technology[x]
-   creare la migration per la tabella pivot project_technology[x]
-   aggiungere ai model Technology e Project i metodi per definire la relazione many to many[x]
-   visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti[x]

## Bonus 1:

-   creare il seeder per il model Technology.[x]

## Bonus 2:

-   aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.[]

---

# Laravel Auth Template

```
composer create-project laravel/laravel:^10.0 nomeprogetto
```

# Installazione breeze

```
composer require laravel/breeze --dev
```

# Scaffold dell'autenticazione breeze/blade

```
php artisan breeze:install
```

-   Which Breeze stack would you like to install? Blade with Alpine
-   Would you like dark mode support? Yes
-   Which testing framework do you prefer? PHPUnit

## Eseguire i passaggi per installare bootstrap invece di tailwind

```
npm remove postcss
npm remove tailwindcss
npm i --save-dev sass
npm i --save bootstrap @popperjs/core
```

Cancellare il file tailwind.config.js e postcss.config.js

```
rm tailwind.config.js
rm postcss.config.js
```

Rinominiamo la cartella css in scss

```
mv resources/css resources/scss
```

ed il file app.css in app.scss

```
mv resources/scss/app.css  resources/scss/app.scss
```

## Nel file app.scss

Cancelliamo gli import di tailwind dal file app.scss e inseriamo:

```
@import "~bootstrap/scss/bootstrap";
```

## Nel file vite.config.js

-   modifichiamo il percorso del css
-   aggiungiamo un alias per resources e per il bootstrap

```
import path from 'path';

resolve: {
        alias: {
            '~resources': '/resources/',
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')
        }
    },
```

## Nel file app.js

-   togliere il codice che imposta alpine, lasciando solo la prima riga
-   importare app.css, bootstrap e img

```
import '~resources/scss/app.scss'
import * as bootstrap from 'bootstrap'
import.meta.glob([
    '../img/**'
])
```

## Inserire le views con bootstrap

Cancellare tutti i file di default dalla cartella views e inserire i file presenti in questa repo

## Partenza

1. installare le dipendenze di npm e composer
2. inserire dati nel file .env
3. far partire le migrations
4. avviare il server (php e node)

Buon lavoro!

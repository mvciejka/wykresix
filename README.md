# Wykresix
Aplikacja „WYKRESIX” jest nowym, samodzielnym produktem, który nie jest częścią większego systemu. Została zaprojektowana z myślą przede wszystkim o ludziach z dolegliwościami kardiologicznymi, których lwią część stanowią seniorzy, pod których dostosowane jest działanie aplikacji.
Dzięki "WYKRESIX" użytkownik może w prosty sposób monitorować swoje wyniki badań kardiologicznych, a także w razie potrzeby udostępniać je lekarzowi. Aplikacja umożliwia również generowanie wykresów z wynikami badań, które mogą być przydatne podczas wizyt lekarskich.

---
# Pierwsze uruchomienie aplikacji
Ten przewodnik opisuje jednorazową konfigurację projektu na nowym komputerze.
Kroki wykonywane w tej sekcji są wymaganie tylko przy pierwszym uruchomieniu projektu. 
Pracę z aplikacją po pomyślnej instalacji opisuje sekcja "Codzienna praca z projektem" poniżej.

## 1. Wymagania wstępne

Upewnij się, że masz zainstalowane:
- Git
- Docker (na Linuksie Desktop lub Engine (osobiście polecam engine), na Windowsie lub Macu Desktop)
  - Instrukcja instalacji Dockera: https://docs.docker.com/get-docker/

## 2. Pobranie repozytorium

Sklonuj repozytorium i przejdź do głównego katalogu projektu:

a) Jeżeli korzystasz z PhpStorm, możesz użyć opcji "Project from Version Control" i wkleić adres repozytorium. W tym celu:
- Wybierz File (trzy kreski w lewym górnym rogu) -> Project from Version Control
- Wklej adres repozytorium (https://github.com/mvciejka/wykresix) i kliknij "Clone"

b) Jeżeli korzystasz z terminala, użyj poniższych komend:
```bash
cd /sciezka/do/katalogu/gdzie/chcesz/umiescic/projekt
git clone https://github.com/mvciejka/wykresix.git
cd wykresix
```

## 3. Uruchomienie aplikacji
> **Ważne:** Przed uruchomieniem upewnij się, że porty **8080** (aplikacja WWW) oraz **3306** (MySQL) nie są zajęte przez inne lokalne usługi.

### 1. Zbudowanie i uruchomienie kontenerów Dockera
Przejdź do katalogu głównego projektu i uruchom poniższą komendę:
```bash
docker compose up -d --build
```
Polecenie zbuduje obraz PHP z wymaganymi rozszerzeniami na podstawie Dockerfile, pobierze obrazy Nginx oraz MySQL 8.4 i uruchomi wszystkie usługi w tle.

### 2. Instalacja zależności PHP
```bash
docker exec wykresix-php composer install
```

### 3. Inicjalizacja bazy danych (migracja)
```bash
# Jeżeli baza danych nie utworzy się sama - utwórz ją
docker exec wykresix-php php bin/console doctrine:database:create --if-not-exists
docker exec wykresix-php php bin/console doctrine:migrations:migrate --no-interaction
```

### 4. Sprawdzenie działania aplikacji
Poprawnie uruchomiona aplikacja będzie dostępna po wpisaniu 
http://localhost:8080 w przeglądarce
---

## Codzienna praca z projektem
Przed przystąpieniem do pracy, ściągnij najnowsze zmiany z repozytorium:
```bash
git pull
```
Następnie uruchom kontenery.
Gdy środowisko zostało już raz skonfigurowane, przy kolejnych uruchomieniach nie trzeba ponownie budować obrazów ani instalować wszystkich pakietów od zera (chyba że zmienił się plik `Dockerfile`).
```bash
docker compose up -d
```
Jeżeli jednak były zmiany w `Dockerfile`, uruchom kontenery z flagą *--build*
```bash
docker compose up -d --build
```

Do sprawdzenia statusu kontenerów można użyć polecenia:
```bash
docker ps
```

Gdy kontenery działają, jeżeli w ostatnich zmianach znalazły się `composer.json` lub `composer.lock`, uruchom composer:
```bash
docker exec wykresix-php composer install
```

A jeżeli dostępne są nowe migracje (zmiany w `./migrations/`):
```bash
docker exec wykresix-php php bin/console doctrine:migrations:migrate --no-interaction
```

Po skończonej pracy z aplikacją można zatrzymać kontenery poleceniem:
```bash
docker compose down
```

### Praca z bazą danych

Tworzenie encji
```bash
docker exec -it wykresix-php php bin/console make:entity
```

Tworzenie migracji
```bash
docker exec -it wykresix-php php bin/console make:migration
```

Uruchamianie migracji
```bash
docker exec wykresix-php php bin/console doctrine:migrations:migrate --no-interaction
```

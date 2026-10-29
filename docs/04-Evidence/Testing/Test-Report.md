# Test Report – Nova Tandzorg

## 1. Testdoel

Het doel van het testen is controleren of de belangrijkste functionaliteiten
van Nova Tandzorg correct werken en voldoen aan de gestelde eisen.

## 2. Testomgeving

- Framework: Laravel
- Programmeertaal: PHP
- Database: MySQL
- Testframework: PHPUnit
- Codekwaliteitscontrole: Laravel Pint

## 3. Unit Tests

De Unit Tests controleren de berekening van de eindtijd van een afspraak.

De volgende scenario's zijn getest:

| Testscenario | Verwacht resultaat |
|---|---|
| Een afspraak duurt 30 minuten en begint om 10:00 | Eindtijd is 10:30 |
| Een afspraak duurt 60 minuten en begint om 10:00 | Eindtijd is 11:00 |
| Een afspraak begint om 10:45 en duurt 30 minuten | Eindtijd is 11:15 |

Resultaat: 3 Unit Tests geslaagd.

## 4. Feature Tests

De Feature Tests controleren de belangrijkste functionaliteiten
van de applicatie.

De volgende onderdelen zijn getest:

- Registratie en wachtwoordbeveiliging.
- Afspraken boeken en annuleren.
- Voorkomen van conflicterende afspraken.
- Voorkomen van afspraken in het verleden.
- Toegangsrechten voor patiënten en beheerders.
- Diensten toevoegen en aanpassen.
- Afspraken bevestigen en annuleren.
- Patiënten kunnen alleen hun eigen afspraken bekijken.

## 5. Testresultaten

De volledige testuitvoering is uitgevoerd met:

`php artisan test`

Resultaten:
- Totaal aantal tests: 19
- Geslaagde tests: 19
- Mislukte tests: 0
- Assertions: 39
- Uitvoertijd: 01,05 S

### Unit Tests

Er zijn 3 Unit Tests uitgevoerd.
Alle 3 Unit Tests zijn geslaagd.

### Feature Tests

Er zijn 16 Feature Tests uitgevoerd.
Alle 16 Feature Tests zijn geslaagd.

De tests controleren onder andere registratie, wachtwoordbeveiliging,
afspraken boeken en annuleren, toegangsrechten en het beheren van diensten.

## 6. Codekwaliteit

Laravel Pint is gebruikt om de code te controleren op de afgesproken
codeerstijl.

De controle is uitgevoerd met:

`php vendor/bin/pint --test`

## 7. Conclusie

Tijdens de volledige testuitvoering zijn 19 tests uitgevoerd.
Alle 19 tests zijn geslaagd en er zijn 39 assertions uitgevoerd.

De Unit Tests controleren de berekening van de eindtijd van afspraken.
De Feature Tests controleren belangrijke functionaliteiten van Nova Tandzorg,
zoals registratie, afsprakenbeheer en toegangsrechten.

Op basis van deze testuitvoering zijn alle uitgevoerde tests geslaagd.
Dit betekent dat de geteste scenario's het verwachte resultaat hebben opgeleverd.
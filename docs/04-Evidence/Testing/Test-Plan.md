# Test Plan – Nova Tandzorg

## 1. Testdoel

Het doel is controleren of de belangrijkste functionaliteiten van
Nova Tandzorg correct werken en voldoen aan de projecteisen.

## 2. Testomgeving

- Framework: Laravel
- Programmeertaal: PHP
- Database: MySQL
- Testframework: PHPUnit

## 3. Testmethode

Er worden Unit Tests en Feature Tests uitgevoerd.

Unit Tests controleren afzonderlijke onderdelen van de code.
Feature Tests controleren functionaliteiten van de applicatie.

## 4. Testscenario's

### 4.1 Registratie en authenticatie

- Controleren of een patiënt zich kan registreren.
- Controleren of het wachtwoord veilig wordt opgeslagen.

### 4.2 Afspraken

- Controleren of een patiënt een afspraak kan boeken.
- Controleren of afspraken in het verleden worden geweigerd.
- Controleren of conflicterende afspraken worden geweigerd.
- Controleren of een patiënt alleen eigen afspraken kan bekijken.
- Controleren of een patiënt een eigen afspraak kan annuleren.

### 4.3 Beheerder

- Controleren of een patiënt geen toegang heeft tot het admin-dashboard.
- Controleren of een beheerder toegang heeft tot het admin-dashboard.
- Controleren of een beheerder diensten kan toevoegen, aanpassen en verwijderen.
- Controleren of een beheerder afspraken kan bevestigen en annuleren.

### 4.4 Berekening van de eindtijd

- Controleren of de eindtijd correct wordt berekend bij een behandeling van 30 minuten.
- Controleren of de eindtijd correct wordt berekend bij een behandeling van 60 minuten.
- Controleren of de berekening correct werkt wanneer het uur verandert.

## 5. Uitvoering

De tests worden uitgevoerd met:

`php artisan test`

De Unit Tests kunnen afzonderlijk worden uitgevoerd met:

`php artisan test tests/Unit/ExampleTest.php`

## 6. Verwacht resultaat

De applicatie moet de verwachte resultaten opleveren.
Ongeldige handelingen moeten correct worden geweigerd.
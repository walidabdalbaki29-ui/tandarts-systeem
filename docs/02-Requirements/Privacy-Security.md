# Privacy & Security — Nova Tandzorg

## 1. Inleiding

Nova Tandzorg is een webapplicatie waarmee patiënten tandartsafspraken kunnen maken en beheren. Omdat de applicatie persoonsgegevens verwerkt, is het belangrijk om zorgvuldig met deze gegevens om te gaan en onbevoegde toegang te voorkomen.

## 2. Authenticatie

Gebruikers moeten inloggen om toegang te krijgen tot functies waarvoor een account nodig is.

De applicatie maakt onderscheid tussen patiënten en beheerders. De beschikbare functies zijn afhankelijk van de rol van de gebruiker.

## 3. Autorisatie

De beheerfuncties zijn beschermd met middleware. Alleen gebruikers met de juiste beheerdersrol mogen deze functies gebruiken.

Patiënten mogen geen beheerpagina's openen of beheeracties uitvoeren waarvoor zij geen toestemming hebben.

## 4. Wachtwoordbeveiliging

Wachtwoorden worden gehasht opgeslagen in de database. Hierdoor worden wachtwoorden niet als gewone, leesbare tekst opgeslagen.

## 5. Validatie van invoer

De applicatie controleert ingevoerde gegevens voordat deze worden verwerkt of opgeslagen.

Bij het registreren controleert het systeem onder andere de verplichte velden en het e-mailadres. Bij het maken van een afspraak worden ook de afspraakgegevens gecontroleerd.

## 6. Privacy van patiëntgegevens

Patiënten mogen alleen hun eigen afspraken bekijken en beheren. Het systeem moet voorkomen dat een patiënt afspraken van andere patiënten kan wijzigen of annuleren.

Toegang tot gegevens van andere patiënten is beperkt tot gebruikers die hiervoor bevoegd zijn.

## 7. Bescherming tegen ongeldige afspraken

Het systeem controleert afspraakgegevens om afspraken in het verleden en overlappende boekingen te voorkomen.

Hierdoor wordt de kans op fouten in de planning verkleind.

## 8. Conclusie

Nova Tandzorg gebruikt authenticatie, autorisatie, wachtwoordhashing en invoervalidatie om de applicatie te beveiligen.

De beveiliging moet regelmatig worden gecontroleerd met tests. Alleen beveiligingsmaatregelen die daadwerkelijk in de code zijn geïmplementeerd en getest, mogen als voltooid worden beschouwd.

TrilobitDatabaseFormFieldOptionsBundle
======================================

Mit der DatabaseFormFieldOptions Erweiterung werden dem Formulargenerator, im Contao Backend eine Anzahl Eingabefeld-Typen ergänzt. Zu den Eingabefeld-Typen gehören:

* Country-Select
* Language-Select
* Database-Select (unter Angabe, welche Tabelle, welche Spalte die Optionen ausgibt und welche Spalte für die Labels ist)
* Database-Radio - siehe Database-Select
* Database-Checkbox - siehe Database-Select

Bei allen DB Feldern besteht die Möglichkeit, manuell eigenen Optionen zu ergänzen, eine Leerauswahl hinzu zu fügen sowie Filter zu definieren (z.B. pid=...). Dabei muss jedoch bedacht werden, das die Filter durch SQL-Injections ein gewisses Risiko beinhalten.

---

With the DatabaseFormFieldOptions extension, a number of input field types are added to the form generator in the Contao backend. The input field types include:

* Country select
* Language-Select
* Database-Select (stating which table, which column outputs the options and which column is for the labels)
* Database-Radio - see Database-Select
* Database-Checkbox - see Database-Select

For all DB fields you can manually add your own options, add an empty selection and define filters (e.g. pid = ...). However, due to SQL injections, there is some risk in using the filters.

Backend Ausschnitt
------------

![Backend Ausschnitt](docs/images/databaseformfieldoptions.png?raw=true "TrilobitDatabaseFormFieldOptionsBundle")


Installation
------------

Install the extension via composer: [trilobit-gmbh/contao-databaseformfieldoptions-bundle](https://packagist.org/packages/trilobit-gmbh/contao-___-bundle).


Compatibility
-------------

- Contao version ~4.9

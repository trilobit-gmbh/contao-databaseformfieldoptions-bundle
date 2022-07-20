TrilobitDatabaseFormFieldOptionsBundle
======================================

Mit dem DatabaseFormFieldOptions Bundle werden dem Contao Formulargenerator neue Eingabefeld-Typen hinzugefügt:

* Country-Select
* Language-Select
* Gender-Select
* Database-Select (unter Angabe, welche Tabelle, welche Spalte die Optionen ausgibt und welche Spalte für die Labels ist)
* Database-Radio - siehe Database-Select
* Database-Checkbox - siehe Database-Select

Bei allen DB Feldern besteht die Möglichkeit, manuell eigenen Optionen zu ergänzen, eine Leerauswahl hinzuzufügen sowie Filter zu definieren (z.B. pid=...). Dabei muss jedoch bedacht werden, das die Filter durch SQL-Injections ein gewisses Risiko beinhalten!

---

With the DatabaseFormFieldOptions Bundle, new input field types are added to the Contao form generator

* Country select
* Language-Select
* Gender-Select
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
- Contao version ~4.13

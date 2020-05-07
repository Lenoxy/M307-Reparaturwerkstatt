# M307-Reparaturwerkstatt (Leo Scherer)

## Einleitung
Dieses Projekt wurde für den ÜK 307 gelöst. Die Anforderungen für das Projekt befinden sich [hier](https://github.com/IctBerufsbildungZentralschweiz/modul-307/tree/master/Tag%203-5%20Projektarbeit/Projekte/02%20Reparaturwerkstatt).
Das Projekt wurde auf dem Webserver der Ict-bz deployed ist dort vorübergehend verfügbar. Dieses Repository beinhaltet den Code und das SQL Script, das notwendig ist um die Webseite laufen zu lassen.

## Sitemap
* Show (/): Zeigt alle offenen Aufträge 
* Create (/create): Auf dieser Seite können neue Aufträge erstellt werden
* Edit (/edit): Auf dieser Seite können bestehende Aufträge angepasst werden.

## Formulare
### List view
Diese View zeigt nur 
![logo](assets/Show.png)

### Create view
![logo](assets/New.png)

### Edit item view
![logo](assets/Edit.png)

## Validierung
### List view
In dieser View befinden sich keine Felder zu validieren.

### New item view
* Name wird benötigt
* Email enthält das @-Zeichen
* Telefon enthält nur Nummern, Leerzeichen und das Symbol +, darf leer sein
* Dringlichkeit wird benötigt
* Werkzeug wird benötigt

### Edit item view
* Name wird benötigt
* Email enthält das @-Zeichen
* Telefon enthält nur Nummern, Leerzeichen und das Symbol +, darf leer sein
* Werkzeug wird benötigt
* Status wird benötigt

## Datenbank
### Table tools
* toolId int primary key not null
* name varchar(255) not null


### Table assignment
* assignmentId int primary key auto_increment
* name varchar(50) not null
* email varchar(100) not null
* phone varchar(15)
* progress tinyint(1) not null
* fkUrgencyId int not null
* fkToolId int not null
* createdAt date not null

### Table urgency
* urgencyId int primary key 
* name varchar(50) not null
* timeNeeded int not null

## Testfälle
### New assignments show up in list view
* GIVEN in create view
* WHEN a user creates a new assignment
* THEN the new assignment appears in the list view

(07.05.2020, 11:36) Test erfolgreich durchegführt

### List view doesn't show completed assignments
* GIVEN assignment in edit view
* WHEN a user sets the assignment status to complete
* THEN the new assignment doesn't appear in the list view anymore

(07.05.2020, 11:37) Test erfolgreich durchegführt

### Check inputs while creating
* GIVEN in create view
* WHEN a user tries to input invalid data (see the criteria under 'validation')
* THEN the form won't be submitted and a error message will show

(07.05.2020, 11:37) Test erfolgreich durchegführt

### Check inputs while editing
* GIVEN in edit view
* WHEN a user tries to input invalid data (see the criteria under 'validation')
* THEN the form won't be submitted and a error message will show

(07.05.2020, 11:40) Test erfolgreich durchegführt

### Set new assignments in progress
* GIVEN in create view
* WHEN a user creates a new assignment
* THEN the new assignment is set 'in progress'

(07.05.2020, 11:41) Test erfolgreich durchegführt

### Edit assignment name
* GIVEN One assignment in edit view
* WHEN a user edits the name
* THEN the name is updated and displayed in the list view.

(07.05.2020, 11:41) Test erfolgreich durchegführt

### Assignments closest to deadline show on top
* GIVEN Multiple assignments present, with different dates.
* WHEN a user opens the list view
* THEN the oldest assignment is shown on top, while the newest is shown at the bottom.

(07.05.2020, 11:41) Test erfolgreich durchegführt

### Assignment and items in list view
* GIVEN in list view
* WHEN a user opens the list view
* THEN the following colums are visible: Name, Werkzeug, Abgeschlossen bis, Status

(07.05.2020, 11:44) Test erfolgreich durchegführt. Die Zeilen 'Auswahl' und 'Edit' sind zusätzlich verfügbar.

### Don't allow SQL injection
* GIVEN in create view
* WHEN a user creates a new assignment
* THEN SQL Injection is not working

(07.05.2020, 11:45) Test erfolgreich durchegführt

### The page is showing
* GIVEN The browser is opened
* WHEN a user inserts the adress
* THEN the list view displays.

(07.05.2020, 11:45) Test erfolgreich durchegführt

## Roadmap
|            | 05.05.        | 06.05.        | 07.05.|
| ---------- | :-------------: |:-------------:| :-----:|
| Vormittag  | -             | Modelierung | Views / Cleanup |
| Nachmittag | Konzeptionierung | Controllers |   Präsentation |

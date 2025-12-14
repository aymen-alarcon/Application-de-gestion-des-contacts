# Application-de-gestion-des-contacts

** Gestion des Contacts – Application Web (PHP 8, MySQL, HTML, CSS, Bootstrap)
** Présentation du projet

Ce projet a été réalisé dans le cadre du brief pédagogique de ConnectSys.

L’objectif est de développer une application web complète permettant :

la création d’un compte utilisateur,

la gestion sécurisée d’une session,

l’affichage d’un espace personnel,

la gestion d’une liste privée de contacts (CRUD),

la validation des formulaires côté client (JavaScript) et côté serveur (PHP).

L’ensemble du processus de développement a été organisé via Jira (user stories, subtasks, duedate).

le lien de jira https://aymenoumaalla442002.atlassian.net/jira/software/projects/GDC/boards/35

le lien de canva https://www.canva.com/design/DAG7ejiWKgw/kD44msPMLQb_NxbBjxvWGA/edit?utm_content=DAG7ejiWKgw&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton

** UML fourni dans le projet

✔ Diagramme de cas d'utilisation

✔ Diagramme de classes

** Architecture du projet

/project-root
│── /config
│     └── db.php
│     └── database.sql
│
│── /public
│     ├── index.php
│     ├── login.php
│     ├── register.php
│     ├── profile.php
│     └── contacts.php
│
│── /includes
│     ├── header.php
│     ├── footer.php
│
│── /functions
│     ├── modifyContact.php
│     ├── deleteContact.php
│     ├── logout.php
│     ├── createNewContact.php
│     ├── createAccount.php
│     └── connectToAccount.php
│
│── /assets
│     ├── css/
│     		├── style.css
│     ├── js/
│     		├── main.js
│
│── /uml
│     ├── diagramme de cas d'utilisation.png
│     ├── diagramme de classe.png
│
└── README.md

** Installation & utilisation

1️⃣ Cloner le projet
git clone https://github.com/aymen-alarcon/Application-de-gestion-des-contacts

2️⃣ Importer la base de données

Importer le fichier :

/config/database.sql

3️⃣ Démarrer le serveur local
php -S localhost:8000 -t public

Puis accéder :
	http://localhost:8000

** Bonus implémentés 

Upload photo de profil

Confirmation avant suppression

Recherche de contacts

** Technologies utilisées

PHP 8 (procédural)

MySQL

HTML5 / CSS3

Bootstrap 5

JavaScript

Jira

Git & GitHub

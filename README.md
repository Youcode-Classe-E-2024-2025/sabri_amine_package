# Application Web de Gestion des Packages et Auteurs

Ce projet consiste à développer une application web centralisée pour la gestion des packages JavaScript et de leurs auteurs. L'objectif est de simplifier la gestion, la recherche et l'ajout de packages, ainsi que la gestion des auteurs contribuant à ces packages.

## Fonctionnalités

- **Gestion des packages** : Ajouter, modifier, supprimer des packages et leurs versions.
- **Gestion des auteurs** : Ajouter et gérer les informations des auteurs.
- **Recherche de packages** : Recherche par mot-clé, auteur ou version.
- **Base de données centralisée** : Les informations sur les packages et les auteurs sont stockées dans une base de données MySQL.

## Schéma de la Base de Données

La base de données est composée des entités suivantes :
- **Packages** : Représente les packages disponibles.
- **Auteurs** : Représente les auteurs contribuant aux packages.
- **Versions** : Représente les différentes versions de chaque package.
![MCD](https://github.com/user-attachments/assets/13f3533d-b34f-400e-a199-cf2cea564ec6)

Les relations sont les suivantes :
- Un auteur peut contribuer à plusieurs packages.
- Un package peut avoir plusieurs versions.

## Diagramme UML (Cas d'Utilisation)
![UseCase](https://github.com/user-attachments/assets/a9bc932f-6adb-4d4a-8956-c1fd1ea7f2dc)

Les acteurs principaux du système sont :
- **Utilisateur** : Peut rechercher des packages, consulter les informations sur les auteurs.
- **Administrateur** : Peut ajouter, modifier et supprimer des packages, des versions et des auteurs.

## Configuration de l’Environnement

1. **Logiciels requis** :
   - Serveur local (ex. XAMPP, WAMP, LAMP).
   - Éditeur de code (ex. Visual Studio Code).
   - Navigateur web (ex. Chrome, Firefox).

2. **Base de données** :
   - Créez la base de données et les tables à partir des scripts SQL fournis.

3. **Structure des fichiers** :
   - `/scripts/` : Contient les scripts SQL.
   - `/src/` : Contient les fichiers PHP.
   - `/public/` : Contient les fichiers accessibles au public (ex. formulaires, résultats de recherche).

## Installation

1. Clonez ce repository :
   ```bash
   [git clone https://github.com/votre-utilisateur/gestion-packages.git](https://github.com/Youcode-Classe-E-2024-2025/sabri_amine_package)

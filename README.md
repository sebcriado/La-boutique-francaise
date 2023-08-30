# La Boutique Française 

Bienvenue dans le guide d'installation du projet Symfony. Ce guide vous fournira des instructions détaillées pour mettre en place et exécuter le projet sur votre propre machine. Veuillez suivre attentivement chaque étape pour garantir une installation réussie.

# Prérequis
Avant de commencer, assurez-vous que votre système répond aux exigences suivantes :

- PHP
- Composer
- Symfony CLI
- Git
  
Si vous n'avez pas ces éléments installés, veuillez les installer en suivant les instructions officielles de chaque outil.

# Installation
Suivez ces étapes pour installer et exécuter le projet localement :

### 1. Cloner le Répertoire

Ouvrez votre terminal et exécutez la commande suivante pour cloner le répertoire GitHub du projet :

```git clone https://github.com/sebcriado/La-boutique-francaise.git```

### 2. Accéder au Répertoire

Accédez au répertoire du projet fraîchement cloné en utilisant la commande suivante :

```cd la-boutique-francaise```

### 3. Installer les Dépendances

Utilisez Composer pour installer les dépendances du projet :

```composer install```

### 4. Configuration de la Base de Données

Copiez le fichier **.env** en **.env.local** et configurez les paramètres de la base de données dans ce fichier en remplaçant **DATABASE_URL**.

### 5. Créer la Base de Données

Créez la base de données en utilisant la commande Symfony suivante :

```symfony console doctrine:database:create```

### 6. Appliquer les Migrations

Appliquez les migrations pour créer le schéma de base de données :

```symfony console doctrine:migrations:migrate```

### 7. Démarrer le Serveur de Développement

Démarrez le serveur de développement Symfony :

```symfony serve```

Le projet devrait maintenant être accessible à l'adresse http://localhost:8000.

## Bon développement !

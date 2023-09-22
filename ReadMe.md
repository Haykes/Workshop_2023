# Installation du Projet

Suivez les étapes ci-dessous pour installer et lancer le projet.

## Prérequis

1. **Composer** : Assurez-vous d'avoir [Composer](https://getcomposer.org/) installé.
2. **Serveur Local** :
   - **macOS** : Installez [MAMP](https://www.mamp.info/en/downloads/).
   - **Linux** : Installez [LAMP](https://howtoubuntu.org/how-to-install-lamp-on-ubuntu).
   - **Windows** : Installez [WAMP](http://www.wampserver.com/en/).

## Étapes d'installation

1. Ouvrez votre terminal et naviguez vers le répertoire du projet :
    ```bash
    cd Symfony
    ```

2. Installez les dépendances avec Composer :
    ```bash
    composer install
    ```

3. Configurez et initialisez la base de données :
    ```bash
    php bin/console doctrine:database:create
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate
    ```

4. Lancez le serveur :
    ```bash
    symfony server:start --no-tls --port=8000
    ```

## Accès via mobile

1. Trouvez l'adresse IP de votre PC.

2. Sur votre mobile, ouvrez un navigateur et entrez l'adresse comme suit : `mon-ip:8000`

3. Appuyé sur l'onglet `partager` puis `ajouter à l'écran d'accueil` pour y avoir accès directement depuis vos application.
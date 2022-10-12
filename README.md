<p align="center"><img src="https://logos-marques.com/wp-content/uploads/2021/07/Stripe-logo.png" width="50%"></p>



# Projet utilisant Stripe 

Je vous propose un projet Laravel 9.31.0 qui utilise Stripe pour le paiement en ligne.

## Installation
1. Cloner le projet
2. Créer un fichier .env à partir du fichier .env.example
3. Modifier les variables d'environnement sans oublier de rajouter la clé secrète de Stripe
4. Installer les dépendances avec la commande `composer install`
5. Générer la clé de l'application avec la commande `php artisan key:generate`
6. Lancer les migrations avec les seed avec la commande `php artisan migrate --seed`
7. Lancer le serveur avec la commande `php artisan serve`
8. Se rendre sur l'url `http://
9. Se connecter avec les identifiants suivants :
    - email : test@example.com
    - mot de passe : password
    - numéro de carte : 4242 4242 4242 4242
   
## Fonctionnalités
- Inscription
- Connexion
- Déconnexion
- Paiement avec Stripe

## Technologies utilisées
<!--ts-->
   * <a href='https://laravel.com/' target="_blank"><img alt='' src='https://img.shields.io/badge/Laravel-100000?style=for-the-badge&logo=&logoColor=A03132&labelColor=FF0001&color=E34140'/></a>
   * <a href='https://stripe.com/fr' target="_blank"><img alt='' src='https://img.shields.io/badge/Stripe-100000?style=for-the-badge&logo=&logoColor=A03132&labelColor=FF0001&color=4268F2'/></a>
   * <a href='https://tailwindcss.com' target="_blank"><img alt='' src='https://img.shields.io/badge/TailwindCSS-100000?style=for-the-badge&logo=&logoColor=A03132&labelColor=FF0001&color=31CBED'/></a>

## Auteur
- [Armel HARDOUIN](https://github.com/Fweac)


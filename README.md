# Biomate v2 - Plateforme Laravel

Biomate v2 est une plateforme développée avec **Laravel 9**, **Livewire**, **Tailwind CSS** et **Vite**, conçue pour fournir une base solide pour des applications modernes et dynamiques. Elle s’appuie sur une architecture modulaire, des composants réactifs, une sécurité renforcée avec Laravel Sanctum, et une organisation claire du code.

---

## 🚀 Stack Technique

- **Framework** : Laravel 9
- **Composants dynamiques** : Livewire
- **CSS** : Tailwind CSS
- **Bundler** : Vite
- **Authentification API** : Laravel Sanctum
- **Tests** : PHPUnit
- **Outils dev** : Laravel Breeze, Laravel Sail, Laravel Pint

---

## 📁 Structure du projet

```
biomate v2/
├── app/                    # Contrôleurs, modèles, logique applicative
├── bootstrap/             # Initialisation du framework
├── config/                # Fichiers de configuration
├── database/              # Migrations, seeders, factories
├── public/                # Entrée publique (index.php)
├── resources/             # Vues Blade, composants Livewire, CSS/JS
├── routes/                # Fichiers de routes (web.php, api.php)
├── storage/               # Cache, logs, fichiers générés
├── tests/                 # Tests automatisés (PHPUnit)
├── .env / .env.example    # Variables d’environnement
├── composer.json          # Dépendances PHP
├── package.json           # Dépendances JS
├── tailwind.config.js     # Configuration Tailwind
├── vite.config.js         # Configuration Vite
```

---

## ⚙️ Installation

### 1. Prérequis
- PHP >= 8.0.2
- Composer
- Node.js + npm
- MySQL ou SQLite

### 2. Étapes de configuration

```bash
# Cloner le repo
cd biomate\ v2

# Installer les dépendances PHP
composer install

# Installer les dépendances JS
npm install

# Copier l’environnement
cp .env.example .env

# Générer la clé d'application
php artisan key:generate

# (Optionnel) Créer la base et lancer les migrations
php artisan migrate

# Compiler les assets
npm run dev

# Lancer le serveur local
php artisan serve
```

> L'application sera disponible sur : http://127.0.0.1:8000

---

## 🔐 Authentification

Ce projet utilise **Laravel Sanctum** pour sécuriser les routes API et gérer les sessions utilisateurs. Il peut être facilement étendu pour intégrer des permissions, rôles, ou une API token-based.

---

## 🧪 Tests

```bash
php artisan test
```

Les tests sont situés dans le répertoire `/tests` et utilisent PHPUnit.

---

## 🛠 Fonctionnalités prévues ou existantes

- Système de login/register avec Laravel Breeze
- Interface utilisateur responsive avec Tailwind
- Composants Livewire réactifs
- Architecture claire MVC

---

## 📌 Notes

- Assurez-vous que le fichier `.env` est bien configuré pour votre base de données.
- En cas d’erreur liée à Vite, lancer : `npm run build` ou `npm run dev`

---

## 📄 Licence

Projet sous licence MIT — libre d'utilisation et de modification.

---

Développé par Sne3P


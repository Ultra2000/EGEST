<div align="center">

# 🏢 EGEST - Système de Gestion de Stock Intelligent

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP](https://img.shields.io/badge/PHP-7.0+-777BB4?logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-4.0+-7952B3?logo=bootstrap&logoColor=white)](https://getbootstrap.com/)

**Une solution complète de gestion de stock moderne et intuitive**

[🌐 Démo en Ligne](https://egest.frecorp.net/) • [📝 Rapporter un Bug](https://github.com/Ultra2000/EGEST/issues) • [✨ Demander une Fonctionnalité](https://github.com/Ultra2000/EGEST/issues)

![EGEST Screenshot](https://user-images.githubusercontent.com/38377336/86491687-03ca9a00-bd89-11ea-8a3a-11dcfcddd254.png)

</div>

---

## 📋 Table des Matières

- [À Propos](#-à-propos)
- [Fonctionnalités Principales](#-fonctionnalités-principales)
- [Démonstration](#-démonstration)
- [Technologies Utilisées](#-technologies-utilisées)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Structure du Projet](#-structure-du-projet)
- [Guide d'Utilisation](#-guide-dutilisation)
- [Captures d'Écran](#-captures-décran)
- [Contribution](#-contribution)
- [License](#-license)
- [Support](#-support)

---

## 🎯 À Propos

**EGEST** (Enterprise GEstion STock) est une application web moderne de gestion de stock développée en PHP natif. Conçue pour les PME et entreprises, EGEST offre une solution complète pour gérer efficacement vos inventaires, ventes, achats et clients.

### 🌟 Pourquoi EGEST ?

- ✅ **Interface Moderne** - Dashboard intuitif avec Bootstrap 4
- ✅ **Gestion Complète** - Articles, Clients, Ventes, Achats en un seul endroit
- ✅ **Alertes Intelligentes** - Notifications de stock faible automatiques
- ✅ **Rapports Détaillés** - Suivi des ventes journalières et mouvements de stock
- ✅ **Import/Export** - Sauvegarde et restauration de base de données
- ✅ **Facturation** - Génération automatique de factures et devis
- ✅ **Open Source** - Code libre et personnalisable

---

## 🚀 Fonctionnalités Principales

### 📦 Gestion des Articles
- ➕ Ajout, modification et suppression d'articles
- 🏷️ Catégorisation par type et unité de mesure
- 📊 Suivi des quantités en stock en temps réel
- ⚠️ Alertes de stock de sécurité
- 💰 Gestion des prix d'achat et de vente

### 👥 Gestion des Clients
- 📝 Base de données clients complète
- 📞 Coordonnées et informations détaillées
- 📈 Historique des achats par client
- 🔍 Recherche et filtrage avancés

### 💼 Gestion des Ventes
- 🛒 Création de devis et factures
- 💳 Enregistrement des ventes
- 📄 Impression de factures professionnelles
- 📊 Statistiques de ventes journalières
- 🔄 Conversion devis → vente

### 📥 Gestion des Achats
- 🏪 Enregistrement des achats fournisseurs
- 📦 Mise à jour automatique des stocks
- 💵 Suivi des dépenses
- 📋 Historique des transactions

### 📊 Tableau de Bord
- 📈 Statistiques en temps réel
- 💰 Chiffre d'affaires journalier
- 📦 Nombre d'articles en stock
- 👥 Nombre de clients
- ⚠️ Alertes de rupture de stock

### 🔧 Fonctionnalités Avancées
- 💾 Export/Import de base de données
- 🔐 Système d'authentification sécurisé
- 📱 Interface responsive (mobile-friendly)
- 🎨 Design moderne et épuré
- 🔔 Notifications et alertes

---

## 🎬 Démonstration

Découvrez EGEST en action : **[https://egest.frecorp.net/](https://egest.frecorp.net/)**

---

## 🛠️ Technologies Utilisées

### Backend
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

### Frontend
![Bootstrap](https://img.shields.io/badge/Bootstrap_4-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

### Bibliothèques et Plugins
- **Bootstrap Select** - Sélecteurs améliorés
- **DataTables** - Tables de données interactives
- **Sweetalert2** - Notifications élégantes
- **Moment.js** - Gestion des dates
- **Highcharts** - Graphiques interactifs
- **Select2** - Recherche avancée
- **Dropzone** - Upload de fichiers
- **FullCalendar** - Calendrier interactif
- **jsPDF** - Génération de PDF

---

## 📋 Prérequis

Avant d'installer EGEST, assurez-vous d'avoir :

```
✓ PHP >= 7.0
✓ MySQL >= 5.6 ou MariaDB >= 10.0
✓ Apache ou Nginx
✓ Extension PHP PDO
✓ Extension PHP MySQLi
✓ Node.js >= 12.x (pour le développement)
✓ NPM >= 6.x (pour le développement)
```

---

## 📥 Installation

### Méthode 1 : Installation Rapide

```bash
# 1. Cloner le repository
git clone https://github.com/Ultra2000/EGEST.git

# 2. Accéder au dossier
cd EGEST

# 3. Installer les dépendances (développement)
npm install
```

### Méthode 2 : Installation via NPM

```bash
npm install EGEST
```

### Méthode 3 : Téléchargement Direct

1. Téléchargez la dernière version depuis [GitHub Releases](https://github.com/Ultra2000/EGEST/releases)
2. Extrayez les fichiers dans votre répertoire web
3. Suivez les étapes de configuration ci-dessous

---

## ⚙️ Configuration

### 1. Configuration de la Base de Données

```bash
# Créer la base de données
mysql -u root -p

CREATE DATABASE egest CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;

# Importer le schéma de base de données
mysql -u root -p egest < BD/egest.sql
```

### 2. Configuration du Fichier de Connexion

Modifiez le fichier `functions.php` avec vos informations de connexion :

```php
<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'votre_utilisateur';
    $DATABASE_PASS = 'votre_mot_de_passe';
    $DATABASE_NAME = 'egest';
    
    try {
        return new PDO(
            'mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', 
            $DATABASE_USER, 
            $DATABASE_PASS
        );
    } catch (PDOException $exception) {
        exit('Erreur de connexion à la base de données');
    }
}
?>
```

### 3. Configuration du Serveur Web

#### Apache (.htaccess)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [L,QSA]
```

#### Nginx
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### 4. Permissions des Fichiers

```bash
# Définir les permissions appropriées
chmod -R 755 EGEST/
chmod -R 777 EGEST/BD/
```

---

## 📁 Structure du Projet

```
EGEST/
├── 📁 BD/                          # Base de données
│   └── egest.sql                   # Schéma SQL
├── 📁 src/                         # Sources
│   └── 📁 plugins/                 # Plugins JavaScript
│       ├── datatables/
│       ├── sweetalert2/
│       └── ...
├── 📁 vendors/                     # Assets et bibliothèques
│   ├── 📁 images/                  # Images
│   ├── 📁 scripts/                 # Scripts JS
│   └── 📁 styles/                  # Styles CSS
├── 📄 index.php                    # Tableau de bord
├── 📄 login.php                    # Page de connexion
├── 📄 entete.php                   # Header/Navigation
├── 📄 functions.php                # Fonctions utilitaires
│
├── 📄 ajouterarticle.php          # Ajouter un article
├── 📄 modifier-article.php         # Modifier un article
├── 📄 supprimer-article.php        # Supprimer un article
├── 📄 liste-articles.php           # Liste des articles
├── 📄 stock-articles.php           # État des stocks
│
├── 📄 ajouterclient.php           # Ajouter un client
├── 📄 modifier-client.php          # Modifier un client
├── 📄 supprimer-client.php         # Supprimer un client
├── 📄 listeclient.php              # Liste des clients
│
├── 📄 vendre.php                   # Nouvelle vente
├── 📄 devis-vente.php              # Créer un devis
├── 📄 modifier-vente.php           # Modifier une vente
├── 📄 supprimer-vente.php          # Supprimer une vente
├── 📄 vente-client.php             # Ventes par client
├── 📄 imprimer-facture.php         # Imprimer facture
│
├── 📄 modifier-achat.php           # Modifier un achat
├── 📄 supprimer-achat.php          # Supprimer un achat
├── 📄 achat-fournisseur.php        # Achats fournisseur
│
├── 📄 mouvement-stocks.php         # Mouvements de stock
├── 📄 type-article.php             # Types d'articles
├── 📄 type-unite.php               # Unités de mesure
│
├── 📄 export_bd.php                # Export base de données
├── 📄 import_bd.php                # Import base de données
│
├── 📄 package.json                 # Dépendances NPM
├── 📄 gulpfile.js                  # Tâches Gulp
├── 📄 LICENSE                      # Licence MIT
├── 📄 CODE_OF_CONDUCT.md          # Code de conduite
└── 📄 README.md                    # Ce fichier
```

---

## 📖 Guide d'Utilisation

### 🔐 Connexion

1. Accédez à `http://votre-domaine.com/login.php`
2. Connectez-vous avec vos identifiants
3. Vous serez redirigé vers le tableau de bord

### 📦 Ajouter un Article

1. Menu **Articles** → **Ajouter un article**
2. Remplissez les informations :
   - Désignation
   - Type d'article
   - Unité de mesure
   - Prix d'achat
   - Prix de vente
   - Stock de sécurité
3. Cliquez sur **Enregistrer**

### 🛒 Effectuer une Vente

1. Menu **Ventes** → **Nouvelle vente**
2. Sélectionnez le client
3. Ajoutez les articles avec quantités
4. Le montant total est calculé automatiquement
5. Validez la vente
6. Imprimez la facture si nécessaire

### 📊 Consulter les Statistiques

Le tableau de bord affiche en temps réel :
- 📦 Nombre total d'articles
- 💰 Ventes de la journée
- 👥 Nombre de clients
- ⚠️ Articles en rupture de stock

### 💾 Sauvegarder la Base de Données

1. Menu **Paramètres** → **Export BD**
2. Téléchargez le fichier SQL généré
3. Conservez-le en lieu sûr

---

## 🖼️ Captures d'Écran

### Tableau de Bord
![Dashboard](https://user-images.githubusercontent.com/38377336/86491687-03ca9a00-bd89-11ea-8a3a-11dcfcddd254.png)

### Gestion des Articles
*Interface intuitive pour gérer votre inventaire*

### Facturation
*Génération professionnelle de factures*

---

## 🤝 Contribution

Les contributions sont les bienvenues ! Voici comment participer :

1. **Fork** le projet
2. **Créez** votre branche (`git checkout -b feature/AmazingFeature`)
3. **Committez** vos changements (`git commit -m 'Add some AmazingFeature'`)
4. **Poussez** vers la branche (`git push origin feature/AmazingFeature`)
5. **Ouvrez** une Pull Request

### 📝 Lignes Directrices

- Suivez le style de code existant
- Commentez votre code
- Testez vos modifications
- Mettez à jour la documentation si nécessaire

Consultez [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md) pour plus de détails.

---

## 🐛 Rapporter un Bug

Trouvé un bug ? [Ouvrez une issue](https://github.com/Ultra2000/EGEST/issues) avec :

- ✅ Description détaillée du problème
- ✅ Étapes pour reproduire
- ✅ Comportement attendu vs actuel
- ✅ Captures d'écran si applicable
- ✅ Environnement (PHP version, navigateur, etc.)

---

## 📄 License

Ce projet est sous licence **MIT License**.

```
MIT License

Copyright (c) 2023 Ultra2000 / FRECORP

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

Voir [LICENSE](LICENSE) pour plus de détails.

---

## 💬 Support

Besoin d'aide ? Plusieurs options s'offrent à vous :

- 📧 **Email** : contact@frecorp.fr
- 🐛 **Issues** : [GitHub Issues](https://github.com/Ultra2000/EGEST/issues)
- 💬 **Discussions** : [GitHub Discussions](https://github.com/Ultra2000/EGEST/discussions)
- 🌐 **Site Web** : [https://egest.frecorp.fr/](https://egest.frecorp.fr/)

---

## 🌟 Remerciements

- Template Admin basé sur **DeskApp**
- Icônes par **Bootstrap Icons** et **Font Awesome**
- Communauté Open Source

---

## 🚀 Roadmap

### Version Future
- [ ] API REST pour intégrations
- [ ] Application mobile (iOS/Android)
- [ ] Multi-devises
- [ ] Multi-langues
- [ ] Module de caisse
- [ ] Gestion des fournisseurs avancée
- [ ] Système de notifications par email
- [ ] Tableau de bord avec graphiques avancés
- [ ] Gestion des promotions
- [ ] Code-barres et QR codes

---

## 📊 Statistiques du Projet

![GitHub stars](https://img.shields.io/github/stars/Ultra2000/EGEST?style=social)
![GitHub forks](https://img.shields.io/github/forks/Ultra2000/EGEST?style=social)
![GitHub watchers](https://img.shields.io/github/watchers/Ultra2000/EGEST?style=social)
![GitHub issues](https://img.shields.io/github/issues/Ultra2000/EGEST)
![GitHub last commit](https://img.shields.io/github/last-commit/Ultra2000/EGEST)

---

<div align="center">

**Développé avec ❤️ par [Ultra2000](https://github.com/Ultra2000) / FRECORP**

⭐ Si vous aimez ce projet, n'hésitez pas à lui donner une étoile !

[🏠 Retour en Haut](#-egest---système-de-gestion-de-stock-intelligent)

</div>

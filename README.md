# Clinic Appointment Manager 🏥

Un système complet de gestion de rendez-vous pour une clinique dentaire, développé avec Laravel 11. Ce projet inclut un tableau de bord, un système de réservation multilingue (Arabe, Français, Anglais), un design professionnel ("Dentist Theme"), ainsi qu'une API REST complète.

## 🚀 1. Instructions d'Installation

Suivez ces étapes pour cloner et lancer le projet sur votre machine locale :

```bash
# 1. Cloner le repository
git clone https://github.com/muhammadhaddou/CC2.Haddou.git
cd CC2.Haddou

# 2. Installer les dépendances PHP et Node.js
composer install
npm install

# 3. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 4. Configurer la base de données SQLite
# Dans votre fichier .env, assurez-vous d'avoir :
# DB_CONNECTION=sqlite
# (et effacez DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
touch database/database.sqlite

# 5. Compiler les assets (Tailwind CSS)
npm run build

# 6. Exécuter les migrations et injecter les données de test
php artisan migrate:fresh --seed

# 7. Démarrer le serveur local
php artisan serve
```

---

## 🔐 2. Identifiants de connexion par défaut

Le système a été initialisé avec des données marocaines de test. Tous les comptes ont le même mot de passe par défaut : `password`

| Rôle | Nom / Description | Email | Mot de passe |
| :--- | :--- | :--- | :--- |
| **Admin** | Administrateur (Gestion totale) | `admin@clinic.ma` | `password` |
| **Docteur** | Dr. Amine Benali | `amine@clinic.ma` | `password` |
| **Patient** | Hassan Oufkir | `hassan@gmail.com` | `password` |

---

## 📡 3. Documentation de l'API REST

L'application expose des Endpoints d'API pour permettre à des systèmes externes d'interagir avec les rendez-vous.

### Lister les rendez-vous (GET)
- **URL :** `/api/appointments`
- **Méthode :** `GET`
- **Description :** Retourne la liste complète de tous les rendez-vous avec les informations détaillées du patient, du médecin et du service concerné.
- **Réponse Succès (200 OK) :**
```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "patient_id": 5,
      "doctor_id": 2,
      "service_id": 1,
      "status": "pending",
      ...
    }
  ]
}
```

### Créer un nouveau rendez-vous (POST)
- **URL :** `/api/appointments`
- **Méthode :** `POST`
- **Description :** Permet à un système externe de soumettre une demande de rendez-vous. Le rendez-vous sera enregistré avec le statut par défaut `pending`.
- **Headers :** `Content-Type: application/json`
- **Body :**
```json
{
  "patient_id": 5,
  "doctor_id": 2,
  "service_id": 1,
  "date": "2026-06-01",
  "time": "10:00"
}
```
- **Réponse Succès (201 Created) :**
```json
{
  "status": "success",
  "message": "Appointment request created successfully",
  "data": { ... }
}
```

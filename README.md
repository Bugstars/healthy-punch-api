# 🧘 Healthy Punch - Daily Check-in Tracker (Laravel + Vue)

**Healthy Punch** is a lightweight daily check-in web app to help users record their health status or habits. Built with Laravel API backend and Vue 3 frontend.

![screenshot](https://your-image-or-demo-link.png)

---

## 🚀 Features

- 🔐 User Registration & Login with Sanctum
- ✅ Daily punch/check-in (1 per day)
- 📅 Calendar view of history
- 📊 Punch-in statistics (streaks, monthly summary)
- 🛠 Admin panel to manage users and export data
- 🌐 Responsive UI (Tailwind CSS + Vite)

---

## 🛠 Tech Stack

| Layer     | Technology              |
|-----------|--------------------------|
| Backend   | Laravel 10 + Sanctum     |
| Frontend  | Vue 3 + Pinia + Axios    |
| Styling   | TailwindCSS              |
| Database  | MySQL                    |
| Deployment| Docker + Laravel Sail    |

---

## ⚙️ Setup Instructions

### Backend (Laravel API)

```bash
git clone https://github.com/bugstars/healthy-punch-api.git

cd healthy-punch-api

cp .env.example .env

./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate
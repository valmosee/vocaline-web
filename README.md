# Vocaline — Vocal Group Member Selection System

A web-based information system to help a university Vocal Group (UKM VG) manage structured and transparent member selection for events.

## Features
- Authentication (Login & Register)
- Member profiles with performance history
- Ranking system based on multiple criteria:
  - Group singing skill, availability, personal skill, public presence, past performances
- Event booking with payment flow
- Admin & PIC dashboard

## Tech Stack
- **Framework:** Laravel (PHP)
- **Database:** MySQL
- **Frontend:** Blade, Tailwind CSS
- **Architecture:** MVC

## Getting Started

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL

### Installation
1. Clone the repo
   ```bash
   git clone https://github.com/valmosee/vocaline-web.git
   ```
2. Install dependencies
   ```bash
   composer install
   ```
3. Copy `.env.example` to `.env` and configure your database
   ```bash
   cp .env.example .env
   ```
4. Generate app key & run migrations
   ```bash
   php artisan key:generate
   php artisan migrate
   ```
5. Start the server
   ```bash
   php artisan serve
   ```

## Team & Contribution

This project was built by 5 people.

| Member | Contributions |
|--------|--------------|
| Joice | Login (controller, database), Register (controller, database), Profile – admin (controller, database), Profile – PIC (controller, route, database), Dashboard – admin (blade, controller, route, database) |
| MaryLiz | Login (blade, route), Register (blade, route), Profile – PIC (blade), Dashboard – PIC (blade, controller, route) |
| Gladys | Profile – peserta (blade, controller, route, database), Dashboard – PIC (database) |
| Florence | Profile – peserta (database support), Dashboard – peserta (controller, route, database) |
| Jesica | Dashboard – admin (blade, controller, route, database) |

## 📄 License
This project is for educational purposes.

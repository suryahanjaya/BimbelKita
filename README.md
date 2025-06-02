<p align="center">
  <img src="resources/views/Logo.png" alt="BimbelKita Banner" width="50%">
</p>

<p align="center">
  A Modern & Interactive <strong>Learning Management System</strong> built with Laravel 12.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.0-red?style=flat&logo=laravel" />
  <img src="https://img.shields.io/badge/PHP-8.2-blue?style=flat&logo=php" />
  <img src="https://img.shields.io/badge/NPM-%5E9.0.0-orange?style=flat&logo=npm" />
  <img src="https://img.shields.io/badge/DomPDF-3.1-purple?style=flat" />
</p>

---

## ✨ Overview

**BimbelKita** is a feature-rich platform to help students prepare for UTBK and other standardized exams.  
It empowers both **learners** and **educators** with a seamless, scalable online tutoring experience.

---

## 🚀 Key Features

| Core Features                         | UTBK Prep Modules                      |
|--------------------------------------|----------------------------------------|
| 🔐 Authentication & Authorization    | 📖 UTBK Materials                      |
| 📚 Course Management                 | 📝 TryOut Simulation                   |
| 👨‍🎓 Student Management              | 🎓 PTN Recomendation                   |
| 👩‍🏫 Tutor Management                | 🗂️ UTBK Question Bank                |
| 📄 PDF Report via DomPDF            | 💬 Discussion Forum                    |
| 🧠 Interactive Learning UI           | 🧑‍🏫 Live Classes                      |
| 🧪 Automated Testing Suite           | 🎥 Learning Videos                     |
|                                      | 🏅 Certificate Generation              |

---

## 🛠 Tech Stack

- **PHP** ^8.2
- **Laravel** ^12.0
- **Laravel Tinker** ^2.10.1
- **DomPDF** ^3.1
- **NPM Packages** (for frontend assets)

## 📋 Prerequisites

Before you begin, ensure you have met the following requirements:
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
- Git

## ⚙️ Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/BimbelKita.git
cd BimbelKita
```

2. Install PHP dependencies
```bash
composer install
```

3. Install NPM dependencies
```bash
npm install
```

4. Create and setup .env file
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in .env file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bimbel
DB_USERNAME=root
DB_PASSWORD=
```

6. Run database migrations
```bash
php artisan migrate
```

7. Start the development server
```bash
php artisan serve
```

8. Compile assets
```bash
npm run dev
```

## 🔧 Development

To start the development environment with all services:
```bash
composer dev
```

This command will concurrently run:
- Laravel development server
- Queue worker
- Log viewer
- Vite development server

## 🧪 Testing

Run the test suite using:
```bash
composer test
```

## 📦 Available Scripts

- `composer dev` - Start development environment
- `composer test` - Run test suite
- `npm run dev` - Start Vite development server
- `php artisan serve` - Start Laravel development server


## 👥 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📬 Contact

Group 7 TIA23
Informatics Engineering 
Univeristas Negeri Surabaya

Project Link: [https://github.com/yourusername/BimbelKita](https://github.com/yourusername/BimbelKita)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Project Management System

Aplicación web desarrollada con **Laravel** para la gestión de proyectos, materiales y usuarios. El sistema permite administrar el ciclo de vida de los proyectos, controlar recursos y visualizar indicadores mediante un dashboard interactivo.

---

## Table of Contents

- Overview
- Features
- Technology Stack
- System Architecture
- Database
- Installation
- Development
- Production Build
- Deployment
- Project Structure
- Available Commands
- Author

---

# Overview

Project Management System es una aplicación web orientada a la administración de proyectos. Proporciona herramientas para gestionar proyectos, materiales, tareas y usuarios, complementadas con un dashboard que facilita el seguimiento del avance y los indicadores principales.

---

# Features

## Authentication

- Secure user authentication
- Protected routes
- Session management

## Project Management

- Create, edit and delete projects
- Budget management
- Progress tracking
- Project status management
- Project scheduling

## Material Management

- Material catalog
- Stock management
- Unit cost management
- Material assignment to projects

## User Management

- User administration
- Access control
- Role-based authorization

## Dashboard

- Budget vs. actual cost
- Project progress
- Material cost distribution
- Project statistics

---

# Technology Stack

| Category | Technology |
|-----------|------------|
| Language | PHP 8.1+ |
| Framework | Laravel 10 |
| Authentication | Laravel Breeze |
| API Authentication | Laravel Sanctum |
| Database | MySQL |
| Frontend | Blade |
| CSS Framework | Tailwind CSS |
| JavaScript | Alpine.js |
| Build Tool | Vite |
| Charts | Chart.js |
| Dependency Manager | Composer |
| Package Manager | npm |

---

# System Architecture

The application is organized into the following modules:

- Authentication
- Project Management
- Material Management
- User Management
- Dashboard and Reporting

---

# Database

The application uses **MySQL** as its database engine.

### Main Tables

- users
- projects
- tasks
- materials
- password_reset_tokens
- personal_access_tokens
- failed_jobs

### Relationships

- A user can manage multiple projects.
- A user can manage multiple tasks.
- A project can contain multiple tasks.
- A project can contain multiple materials.
- Materials are associated with individual projects.

---

# Installation

Clone the repository.

```bash
git clone <repository-url>
cd laravel1
```

Install PHP dependencies.

```bash
composer install
```

Install frontend dependencies.

```bash
npm install
```

Create the environment file.

```bash
cp .env.example .env
```

Generate the application key.

```bash
php artisan key:generate
```

Configure the database credentials in the `.env` file.

Run the migrations.

```bash
php artisan migrate
```

Optionally, load sample data.

```bash
php artisan db:seed
```

Start the development server.

```bash
php artisan serve
```

Run the asset compiler.

```bash
npm run dev
```

---

# Development

The application runs locally at:

```text
http://localhost:8000
```

---

# Production Build

Compile frontend assets.

```bash
npm run build
```

---

# Deployment

The project is compatible with PHP hosting providers such as:

- InfinityFree
- Hostinger
- cPanel Hosting
- VPS Servers

Deployment requirements include:

- PHP 8.1 or later
- MySQL
- Composer
- Node.js (during build process)

Before deployment, configure the production environment variables in the `.env` file and execute the required database migrations.

---

# Project Structure

```text
app/
├── Http/
│   └── Controllers/
├── Models/
└── Policies/

database/
├── migrations/
└── seeders/

resources/
├── css/
├── js/
└── views/

routes/
├── web.php
└── auth.php

public/
└── index.php
```

---

# Available Commands

| Command | Description |
|----------|-------------|
| composer install | Install PHP dependencies |
| npm install | Install frontend dependencies |
| php artisan key:generate | Generate application key |
| php artisan migrate | Execute database migrations |
| php artisan db:seed | Load sample data |
| php artisan serve | Start development server |
| npm run dev | Start Vite development server |
| npm run build | Generate production assets |

---

# Project Status

The application is fully functional and provides a complete solution for project, material and user management, including authentication, reporting and dashboard visualization.

---

# Author

Laravel-based web application developed for project management, resource administration and progress monitoring.

# Translation Management Service (TMS)

A **Laravel 10 API-driven service** for managing translations with support for multiple locales, tagging, search, and optimized JSON export.  

Designed to be **high-performance, scalable, and secure**, following **PSR-12** standards and **SOLID principles**.

---

## Features

- Store translations for multiple locales (`en`, `fr`, `es`, etc.)  
- Tag translations for context (`web`, `mobile`, `desktop`)  
- Full **CRUD API** (Create, Read, Update, Delete)  
- **Search translations** by key, content, locale, or tag  
- **JSON export** endpoint optimized for large datasets (streamed response)  
- **Token-based authentication** using Laravel Sanctum  
- Database seeding with **100k+ records** for performance testing  
- Follows **PSR-12** coding standards and **SOLID design principles**

---

## Tech Stack

- **Laravel 10**  
- **PHP 8.2+**  
- **MySQL / SQLite** (configurable)  
- **Sanctum** for API authentication  
- **PHPUnit** for unit & feature testing  

---

## Installation

1. Clone the repository:

```bash
git clone https://github.com/yourusername/tms.git
cd tms

# Social Media Agency - Laravel 8 Landing Page with Admin Panel

A complete Laravel 8 landing page with admin panel for a social media agency featuring AI-powered creative branding services.

## Features

### Landing Page
- Single page layout with smooth scrolling navigation
- Hero section with CTA
- About Us section
- What We Do section
- Services (5 cards with icons)
- Portfolio/Our Works gallery with category filter
- Contact form with AJAX submission
- Footer with social links
- Fully responsive (mobile-first)
- Smooth scroll animations
- Dark green color scheme (#1a4d2e)

### Admin Panel
- Secure authentication with session management
- Dashboard with statistics
- Content Management (CRUD with AJAX):
  - Hero Section
  - About Us
  - What We Do
  - Services
  - Portfolio Works
  - Contact Information
  - Contact Messages
- Rich text editor for content
- Image upload with preview
- Form validation
- Sweet Alert notifications
- Responsive admin layout

## Technology Stack
- PHP 7.4+
- Laravel 8
- MySQL
- Bootstrap 5
- Font Awesome 6
- AJAX for admin operations
- Sweet Alert 2

## Installation

### Prerequisites
- PHP 7.4 or higher
- Composer
- MySQL
- Node.js (optional, for asset compilation)

### Step 1: Clone and Install Dependencies
```bash
cd social-media-agency
composer install
```

### Step 2: Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

Edit the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=social_media_agency
DB_USERNAME=your_username
DB_PASSWORD=your_password

ADMIN_EMAIL=admin@agency.com
ADMIN_PASSWORD=your_secure_password
```

### Step 3: Create Database
Create a MySQL database named `social_media_agency` (or your preferred name matching the .env file).

### Step 4: Run Migrations and Seeders
```bash
php artisan migrate
php artisan db:seed
```

### Step 5: Storage Link
```bash
php artisan storage:link
```

### Step 6: Run the Application
```bash
php artisan serve
```

Visit: http://localhost:8000

## Default Login Credentials
- **Email:** admin@agency.com (or as configured in .env)
- **Password:** password123 (or as configured in .env)

## Project Structure

```
social-media-agency/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── HeroSectionController.php
│   │   │   │   ├── AboutSectionController.php
│   │   │   │   ├── WhatWeDoSectionController.php
│   │   │   │   ├── ServiceController.php
│   │   │   │   ├── PortfolioWorkController.php
│   │   │   │   ├── ContactInfoController.php
│   │   │   │   └── ContactMessageController.php
│   │   │   ├── AuthController.php
│   │   │   └── LandingPageController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── HeroSection.php
│       ├── AboutSection.php
│       ├── WhatWeDoSection.php
│       ├── Service.php
│       ├── PortfolioWork.php
│       ├── ContactInfo.php
│       └── ContactMessage.php
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── admin/
│       │   ├── auth/
│       │   │   └── login.blade.php
│       │   ├── dashboard.blade.php
│       │   ├── hero/
│       │   ├── about/
│       │   ├── whatwedo/
│       │   ├── services/
│       │   ├── portfolio/
│       │   ├── contact/
│       │   └── messages/
│       ├── landing/
│       │   └── index.blade.php
│       └── layouts/
│           ├── admin.blade.php
│           └── landing.blade.php
├── routes/
│   └── web.php
└── public/
    └── uploads/
```

## Database Schema

### Tables
- **users** - Admin users
- **hero_section** - Hero section content
- **about_section** - About us content
- **whatwedo_section** - What we do content
- **services** - Services data (5 default services)
- **portfolio_works** - Portfolio items with images
- **contact_info** - Contact information and social links
- **contact_messages** - Contact form submissions

## Routes

### Public Routes
- `GET /` - Landing page
- `POST /contact` - Contact form submission

### Admin Routes
- `GET /admin/login` - Login page
- `POST /admin/login` - Login submission
- `POST /admin/logout` - Logout
- `GET /admin/dashboard` - Dashboard
- `GET /admin/hero` - Hero section
- `GET /admin/about` - About section
- `GET /admin/what-we-do` - What we do section
- `GET /admin/services` - Services management
- `GET /admin/portfolio` - Portfolio management
- `GET /admin/contact-info` - Contact information
- `GET /admin/messages` - Contact messages

## Customization

### Changing Colors
Edit the CSS variables in:
- `resources/views/layouts/landing.blade.php` (line 12-20)
- `resources/views/layouts/admin.blade.php` (line 12-17)

Default primary color: `#1a4d2e` (dark green)

### Adding Services
Services are managed through the admin panel. You can add up to 5 services (or more if you modify the view).

### Adding Portfolio Items
Portfolio works support categories for filtering. Upload images through the admin panel.

## Security Features
- CSRF protection on all forms
- Password hashing with Bcrypt
- Session-based authentication
- Form validation
- XSS protection through Blade escaping

## License
This project is open source and available under the MIT License.

## Support
For issues or questions, please create an issue in the repository.

## Credits
- Laravel Framework
- Bootstrap
- Font Awesome
- Sweet Alert
- Poppins Font (Google Fonts)
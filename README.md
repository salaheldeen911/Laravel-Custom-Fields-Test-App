# Custom Fields Test App

This project is a experimental Laravel application designed to test and demonstrate the capabilities of the `laravel-custom-fields` package.

## 🚀 Installation & Setup

Follow these steps to get the project running locally:

### 1. Clone the Project
```bash
git clone <repository-url> custom-fields-app
cd custom-fields-app
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Configuration
Copy the template environment file:
```bash
cp .env.example .env
```
Ensure your `.env` is configured for **MySQL**:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=custom_fields
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Initialize Database & Generate Keys
```bash
php artisan key:generate
php artisan migrate
```

### 5. Install Custom Fields Package
Run the installation command to publish config and migrations:
```bash
php artisan custom-fields:install
```

### 6. Run the Application
```bash
php artisan serve
npm run dev
```

## 🧪 Testing Custom Fields

You can access the management UI at:
`http://127.0.0.1:8000/custom-fields`

To test API responses:
`GET /api/custom-fields/models-and-types`

## 🛠 Maintenance
To prune deleted fields:
```bash
php artisan custom-fields:prune
```

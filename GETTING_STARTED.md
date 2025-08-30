# Getting Started - DISHUB Padang Panjang

## Setup Development Environment

### 1. Requirements
- PHP 7.1.3 - 7.4 (recommended)
- Composer
- MySQL 5.7+ or SQLite
- Node.js & npm (optional, for asset compilation)

### 2. Installation Steps

#### Clone and Install Dependencies
```bash
git clone https://github.com/ChaostixZix/DISHUB-Padang.git
cd DISHUB-Padang/laravel
composer install
```

#### Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Setup database in .env file
# For MySQL:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web-dishub
DB_USERNAME=root
DB_PASSWORD=your_password

# For SQLite (development):
DB_CONNECTION=sqlite
DB_DATABASE=/full/path/to/database.sqlite
```

#### Database Setup
```bash
# Create SQLite database (if using SQLite)
touch database/database.sqlite

# Run migrations
php artisan migrate

# Seed database with sample data (optional)
php artisan db:seed
```

#### Start Development Server
```bash
# Start Laravel development server
php artisan serve

# Or use built-in PHP server in public directory
cd ../public
php -S localhost:8080
```

### 3. Demo Mode

For quick demonstration without full Laravel setup:

```bash
# Navigate to public directory
cd public

# Start simple HTTP server
python3 -m http.server 8080
# or
php -S localhost:8080

# Open browser to http://localhost:8080/demo.html
```

### 4. Production Deployment

#### Apache Configuration
```apache
<VirtualHost *:80>
    DocumentRoot /path/to/DISHUB-Padang/public
    ServerName dishub.padangpanjang.go.id
    
    <Directory /path/to/DISHUB-Padang/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

#### Nginx Configuration
```nginx
server {
    listen 80;
    server_name dishub.padangpanjang.go.id;
    root /path/to/DISHUB-Padang/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 5. Configuration

#### Database Configuration
Edit `laravel/.env`:
```env
APP_NAME="DISHUB Padang Panjang"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://dishub.padangpanjang.go.id

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=web-dishub
DB_USERNAME=dishub_user
DB_PASSWORD=secure_password

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

#### Storage Permissions
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 6. Default User Accounts

After seeding, default accounts:

- **Admin**: admin@dishub.com / password123
- **Petugas**: petugas@dishub.com / password123
- **User**: user@dishub.com / password123

### 7. Features Testing

#### Test Aduan System
1. Register as regular user
2. Go to "Pengaduan" menu
3. Submit new complaint with image
4. Login as admin to review

#### Test Derek Service
1. Go to "Pesan Derek" 
2. Enter pickup and destination
3. System calculates distance and cost
4. Admin can track and update status

#### Test Parkir System
1. Go to "Pesan Parkir"
2. Select location and duration
3. Make reservation
4. Admin manages parking slots

### 8. Troubleshooting

#### Common Issues

**Composer Install Fails**
```bash
# Use ignore platform requirements
composer install --ignore-platform-reqs
```

**Permission Denied**
```bash
sudo chown -R $USER:$USER .
chmod -R 755 storage bootstrap/cache
```

**Database Connection Error**
- Check MySQL service is running
- Verify database credentials in .env
- Ensure database exists

**Missing Dependencies**
```bash
# Install required PHP extensions
sudo apt-get install php-mysql php-xml php-zip php-curl php-mbstring
```

### 9. Development Tools

#### Laravel Artisan Commands
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Generate IDE helper
php artisan ide-helper:generate

# Run tests
php artisan test
```

#### Asset Compilation (if using Laravel Mix)
```bash
npm install
npm run dev      # Development
npm run prod     # Production
npm run watch    # Watch for changes
```

## Support

For technical support, contact:
- Email: tech@dishubpadangpanjang.id
- Phone: (0752) 123456
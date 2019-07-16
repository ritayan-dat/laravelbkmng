# Install the package
composer require backpack/backupmanager

# Publish the config file and lang files:
php artisan vendor:publish --provider="Backpack\BackupManager\BackupManagerServiceProvider"  --tag=config


Add a new "disk" to config/filesystems.php:
        // used for Backpack/BackupManager
        'backups' => [
            'driver' => 'local',
            'root'   => storage_path('backups'), // that's where your backups are stored by default: storage/backups
        ],





# Put the files which we have sent in the named folders and make the route as per as have sent
# use correct mail settings in .env file as an exp we use gmail

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=abcd@gmail.com
MAIL_PASSWORD= 123456
MAIL_ENCRYPTION=tls
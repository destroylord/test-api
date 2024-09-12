## Install

1. clone project ini
2. copy .env.example dengan membuat file .env
3. composer install
4. buat database dan import db yang disediakan atau bisa menggunakan command `php artisan migrate --seed`
5. buatkan jwt secret dengan command `php artisan jwt:secret`
6. kemudian generate key untuk project laravel dengan command `php artisan key:generate`
7. terakhir jalan laravel `php artisan serve`
8. Jalankan sesuai pada route yang telah disediakan pada screenshot

Note: dokumentasi screenshot bisa dilihat pada folder API-SCREENSHOT

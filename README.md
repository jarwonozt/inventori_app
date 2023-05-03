INVENTORY APP

## Panduan Install



```bash
git clone https://github.com/jarwonozt/jcms.git

composer install

cp .example.env .env

php artisan storage:link

php artisan migrate

php artisan db:seed --class=User
```



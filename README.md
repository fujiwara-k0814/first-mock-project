# FleaMarketApp(フリマアプリ)  
  
## 環境構築  
Dockerビルド  
 1. `git clone git@github.com:fujiwara-k0814/first-mock-project.git`  
 2. DockerDesktopアプリを立ち上げる  
 3. `docker compose up -d --build`  
※MySQLはOSの都合上、各人でファイルを編集  
  
  
Laravel環境構築  
 1. `mkdir src/storage/app/public/item_images`  
 2. `cp -r src/database/seeders/images/* src/storage/app/public/item_images`  
 3. `docker compose exec php bash`  
 4. `composer install`  
 5. .env.exampleファイルから.envファイルを作成
 6. 環境変数を設定
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```  
 7. Stripeのダッシュボードにアクセスし、シークレットキーを取得。環境変数を設定
``` text
STRIPE_SECRET_KEY=sk_test_************ //←取得したキーを設定
```  
 8. .env.testing.exampleファイルから.env.testingファイルを作成  
 9. Stripeのダッシュボードにアクセスし、シークレットキーを取得。環境変数を設定
``` text
STRIPE_SECRET_KEY=sk_test_************ //←取得したキーを設定
```
 10. Stripeのテスト環境をONにする
 11. `php artisan key:generate`  
 12. `php artisan key:generate --env=testing`  
 13. `php artisan migrate`  
 14. `php artisan storage:link`  
 15. `php artisan db:seed`  
 16. `composer require stripe/stripe-php`  
  
   
## 使用技術  
・PHP 8.1  
・Lravel 8.83  
・MySQL 8.0  
  
  
## ER図  
<img width="644" height="709" alt="image" src="https://github.com/user-attachments/assets/6b62eeee-ebc2-4b37-b516-71526692f4b1" />  
  
  
## URL  
・開発環境：http://localhost/  
・phpMyAdmin：http://localhost:8080/  
・MailHog：http://localhost:8025/  

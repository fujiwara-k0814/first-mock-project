# フリマアプリ  
## 環境構築  
Dockerビルド  
 1. git clone リンク　git@github.com:fujiwara-k0814/first-mock-project.git  
 2. DockerDesktopアプリを立ち上げる  
 3. docker compose up -d --build  
※MySQLはOSの都合上、各人でファイルを編集  
  
  
Laravel環境構築  
 1. mkdir src/storage/app/public/item_images  
 2. cp -r src/database/seeders/images/* src/storage/app/public/item_images  
 3. docker compose exec php bash  
 4. compopser install  
 5. Stripeのダッシュボードにアクセスし、サンドボックス画面でシークレットキーを取得  
 6. .env.exampleファイルから.envファイルを作成し、環境変数を設定  
 7. .env.testing.exampleファイルから.env.testingファイルを作成し、環境変数を設定  
 8. php artisan key:generate  
 9. php artisan key:generate --env=testing  
 10. php artisan migrate  
 11. php artisan storage:link  
 12. php artisan db:seed  
 13. composer require stripe/stripe-php  
  
   
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

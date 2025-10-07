# フリマアプリ
## 環境構築
Dockerビルド  
 1.git clone リンク　git@github.com:fujiwara-k0814/first-mock-project.git  
 2.docker compose up -d --build  
※MySQLはOSの都合上、各人でファイルを編集  
  
  
Laravel環境構築  
 1.mkdir src/storage/app/public/item_images  
 2.cp -r src/database/seeders/images/* src/storage/app/public/item_images  
 3.docker compose exec php bash  
 4.compopser install  
 5..env.exampleファイルから.envファイルを作成し、環境変数を設定  
 6.php artisan key:generate  
 7.php artisan migrate  
 8.php artisan storage:link  
 9.php artisan db:seed  
  
   
## 使用技術
・PHP 8.1  
・Lravel 8.83  
・MySQL 8.0  
・dockerやcomposerに関しては都度最新を使用  

  
## ER図  
<img width="639" height="786" alt="image" src="https://github.com/user-attachments/assets/770ddf43-898e-470a-962b-1949032bc3e0" />
  
  
## URL
・開発環境：http://localhost/  
・phpMyAdmin：http://localhost:8080/

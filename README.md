# フリマアプリ
## 環境構築
Dockerビルド  
 1.git clone リンク　git@github.com:fujiwara-k0814/first-mock-project.git  
 2.docker compose up -d --build  
※MySQLはOSの都合上、各人でファイルを編集  
  
  
Laravel環境構築  
 1.docker compose exec php bash  
 2.compopser install  
 3..env.exampleファイルから.envファイルを作成し、環境変数を設定  
 4.php artisan key:generate  
 5.php artisan migrate  
 6.php artisan db:seed  

   
## 使用技術
・PHP 8.1  
・Lravel 8.83  
・MySQL 8.0  
・dockerやcomposerに関しては都度最新を使用  

  
## ER図  
<img width="640" height="792" alt="image" src="https://github.com/user-attachments/assets/be521208-bbb8-475d-a7e1-a53481a0de76" />
  
  
## URL
・開発環境：http://localhost/  
・phpMyAdmin：http://localhost:8080/

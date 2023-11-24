#  เว็บจัดการร้านอาหารตามสั่งป้าต๊อย ปี 2

## ตัวอย่าง

 - [ภาพตัวอย่างเว็บไซต์: ](https://github.com/gamerzahatv/laravel-food_pos/tree/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A)
 - [วีดีโอแนะนำ:](https://www.youtube.com/watch?v=V1SYPrvEofg)
 - [สไลด์](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3.pdf)
 
## libary กับ  framework ที่ใช้ 

เว็บแอปนี้เป็นเว็บจำลองการจัดการร้านค้าร้านป้าต๊อยโดยใช้เครื่องมือต่อไปนี้

- [Bootstrap](https://getbootstrap.com/)
- [Laravel 10.3](https://laravel.com/)
- [Spatie](https://spatie.be/docs/laravel-permission/v6/introduction)
- [Laravel Jetstream](https://jetstream.laravel.com/introduction.html)
- [Jquery](https://jquery.com/)

## software ที่ใช้ติดตั้งก่อนใช้งานโปรเจค

เว็บแอปนี้เป็นเว็บจำลองการจัดการร้านค้าร้านป้าต๊อยโดยใช้เครื่องมือต่อไปนี้

- [xampp](https://www.apachefriends.org/)
- [composer](https://getcomposer.org/)
- [PHP 8.2.4](https://www.php.net/)
- [NODE JS v20.9.0](https://nodejs.org/en/)


## การติดตั้งโปรเจค Window เปิด mysql ใน xamppด้วย

Clone the project

```bash
  git clone https://github.com/gamerzahatv/laravel-food_pos.git
```

ติดตั้งโมดูล

```bash
  composer install 
  npm install 
  npm run build
```

สร้างฐานข้อมูล , สร้างบทบาท

```bash
  php artisan migrate
  php artisan permission:create-role admin
  php artisan permission:create-role User
```

หากต้องการเคลียร์ข้อมูลในฐานข้อมูล

```bash
  php artisan migrate:fresh --seed
  php artisan permission:create-role admin
  php artisan permission:create-role User
```
ทดลองใช้งานในระบบทดลอง

```bash
  php artisan serve --host=ไอพีคุณ --port=พอตคุณ 
```

## Docker อาจกำลังมาแต่ไม่ใช่เร็วเร็วนี้
	กำลังพัฒนา


## Screenshots ภาพตัวอย่างเว็บไซต์

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/home.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/dashbordadmin.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/Dbsample.PNG)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/cart.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/productadmin.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/user_porfile.png)
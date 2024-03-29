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

## software ที่ใช้ติดตั้งก่อนใช้งานโปรเจค อัปเดตครั้งล่าสุด 2023

เว็บแอปนี้เป็นเว็บจำลองการจัดการร้านค้าร้านป้าต๊อยโดยใช้เครื่องมือต่อไปนี้

- [xampp 8.2.4](https://www.apachefriends.org/)
- [composer 2.6.5](https://getcomposer.org/)
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


## Docker
ใช้คำสั่งแล้วรอ container ทุกอันโหลดเสร็จจะใช้เวลาซักพัก
```bash
  docker compose up -d
```
## เปิดเว็บเพื่อทดสอบเว็บไซต์
หาlocal ip ได้จาก ifconfig(linux) หรือ ipconfig (window)
```bash 
  your localip:5555
```
## เครื่องมือใช้สำหรับจัดการฐานข้อมูล
- [mysql workbench](https://www.mysql.com/products/workbench/)

## การเปลี่ยนยศของผู้ใช้
หากต้องการเพิ่มเมนูอาหารหรือเข้าใช้งานแอดมินเพื่อจัดการร้าน หากต้องการเปลี่ยน user ทดลองเป็น admin เข้าที่ database: hellkitchen เปลี่ยน role_id จาก2เป็น1 (1คือเลขไอดีadmin,2คือเลขไอดีmember)
![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/user_role.PNG)

## Screenshots ภาพตัวอย่างเว็บไซต์

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/home.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/dashbordadmin.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/Dbsample.PNG)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/cart.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/productadmin.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/user_porfile.png)
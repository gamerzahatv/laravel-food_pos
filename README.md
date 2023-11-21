#  เว็บจัดการร้านอาหารตามสั่งป้าต๊อย

ภาพตัวอย่างเว็บไซต์: [Example](https://github.com/gamerzahatv/laravel-food_pos/tree/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A)
วีดีโอแนะนำ: [YOUTUBE](https://github.com/gamerzahatv/laravel-food_pos/tree/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A)
สไลด์: [PDF](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B9%81%E0%B8%99%E0%B8%B0%E0%B8%99%E0%B8%B3.pdf)

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


## การติดตั้งโปรเจค

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

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Screenshots

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/index.png)

![App Screenshot](https://github.com/gamerzahatv/laravel-food_pos/blob/dev/%E0%B8%84%E0%B8%B9%E0%B9%88%E0%B8%A1%E0%B8%B7%E0%B8%AD/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%AD%E0%B8%A2%E0%B9%88%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%A7%E0%B9%87%E0%B8%9A/dashbordadmin.png)
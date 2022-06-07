<h1 align="center">Sistem Pengajuan Proposal</h1>
<p> Helmi Sulaeman</p>
<p> Enjoy The Project </p>


## PREVIEW




<p>Login Page</p>
<img src="2.png"/>
<p>Mahasiswa Dashboard</p>
<img src="1.jpg"/>
<p>Koor KP Dashboard</p>
<img src="3.png"/>
<p>Prodi Dashboard</p>
<img src="4.png"/>



## Install

```sh
npm install
composer install
```
```sh

## Fix if php error  
composer self-update
composer clear-cache
rm -rf vendor
rm composer.lock
composer install --ignore-platform-reqs
```
## Usage

```sh
cp .env.example .env
php artisan key:generate
php artisan migrate:refresh --seed
php artisan storage:link
```

## Run tests

```sh
php artisan serve
```

## Account

```sh
Admin
Email    : admin@unsur.com
password : 123456
```

```sh
User
Email    : user@unsur.com
password : 123456
```

```sh
Pegawai
Email    : pegawai@unsur.com
password : 123456
```

# Proyek Kuis Edukasi Kesehatan
Kuis ini merupakan proyek milik Tim Challangers<br>
Endpoint api untuk mendapatkan data dari server <br>

## Daftar Isi
- [Instalasi](#instalasi)
- [Menggunakan API](#menggunakan-api)
  - [Registrasi user](api/user/register) 
  - [Endpoint 2](#endpoint-2)
- [Autentikasi](#autentikasi)
- [Contoh Permintaan](#contoh-permintaan)
- [Tanggapan API](#tanggapan-api)
- [Kesalahan API](#kesalahan-api)
- [Contoh Kode](#contoh-kode)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

## Instalasi

<a href="laravel.com/docs/10.x">dokumentasi</a><br>

## Penggunaan Api

jalan kan perintah --bash php artisan serve pada terminal <br>
lalu dapatkan port alamat server <br>

arahkan url pada alamat berikut:<br>
http://127.0.0.1:8000/api

### Registrasi user
url: http://127.0.0.1:8000/api/user/register <br>
-h: Accept:application/json <br>

response: <br>
[
    {
        "username": "halodunia008",
        "email": "bagas37@gmail.com",
        "updated_at": "2024-01-12T16:01:52.000000Z",
        "created_at": "2024-01-12T16:01:52.000000Z",
        "id": 9
    },
    "8|wJNVwW5iksRL8dTg0bxrbUdemMsyjgxRrkMML6lb66f2d869"
] <br>

### Login User
url: http://127.0.0.1:8000/api/user/login <br>
-h: Accept:application/json <br>

response: <br>
{
    "user": {
        "id": 8,
        "username": "halodunia007",
        "email": "bagas36@gmail.com",
        "email_verified_at": null,
        "avatar": null,
        "bio": null,
        "created_at": "2024-01-12T15:14:20.000000Z",
        "updated_at": "2024-01-12T15:14:20.000000Z"
    },
    "token": "7|CgVVsJCRHThF4c1CO0Bqu0Xgz0kMaJvJE0wZb9Iv24c22a1c"
} <br>

### Daftar Sampul Quiz
melihat daftar sampul kuis pada halaman dashboard <br><br>
url: http://127.0.0.1:8000/api/user/login <br>
-h: Accept:application/json <br>
-h: Authorization:Bearer 7|CgVVsJCRHThF4c1CO0Bqu0Xgz0kMaJvJE0wZb9Iv24c22a1c<br>

response: <br>
[
    {
        "id": 1,
        "title": "Empat Sehat 5 Sempurna",
        "img": null,
        "isfree": 1,
        "price": null,
        "disc": null,
        "created_at": "2024-01-12T00:00:00.000000Z"
    }
] <br>



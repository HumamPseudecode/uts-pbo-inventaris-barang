# UTS PBO - Manajemen Inventaris Barang

Aplikasi Laravel 13 untuk mencatat dan mengelola inventaris barang. Fitur mencakup CRUD, pencarian, validasi input, pesan status, dan konfirmasi penghapusan. Data disimpan pada session Laravel, bukan database.

## Persyaratan

- PHP 8.3+
- Composer
- Laravel 13

## Menjalankan aplikasi

```powershell
copy .env.example .env
composer install
php artisan key:generate
php artisan serve
```

Pastikan `.env` menggunakan:

```env
SESSION_DRIVER=file
```

Buka `http://127.0.0.1:8000/barang`.

## Route

| Method | URI | Route |
|---|---|---|
| GET | `/barang` | `barang.index` |
| GET | `/barang/create` | `barang.create` |
| POST | `/barang` | `barang.store` |
| GET | `/barang/{kode}` | `barang.show` |
| GET | `/barang/{kode}/edit` | `barang.edit` |
| PUT/PATCH | `/barang/{kode}` | `barang.update` |
| DELETE | `/barang/{kode}` | `barang.destroy` |

## Catatan

Data bersifat sementara dan disimpan pada session browser. Jangan mengunggah `.env`, `vendor/`, atau `node_modules/` ke GitHub.

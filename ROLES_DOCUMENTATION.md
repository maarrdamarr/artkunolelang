# Dokumentasi 3 Role Sistem

Sistem ini memiliki 3 role dengan halaman dashboard sederhana masing-masing:

## 🔐 Role dan Akses

### 1. **USER** - Pengguna Biasa
- **Email Test**: `user@test.com`
- **Password**: `password`
- **URL Dashboard**: `/user/dashboard`
- **Deskripsi**: Role untuk pengguna biasa yang dapat melihat profil dan informasi akun mereka

### 2. **PENJUAL** - Penjual
- **Email Test**: `penjual@test.com`
- **Password**: `password`
- **URL Dashboard**: `/penjual/dashboard`
- **Deskripsi**: Role untuk penjual yang dapat mengelola produk dan melihat laporan penjualan
- **Menu**: 
  - 📦 Produk (Kelola produk)
  - 📊 Penjualan (Lihat laporan penjualan)

### 3. **ADMIN** - Administrator
- **Email Test**: `admin@test.com`
- **Password**: `password`
- **URL Dashboard**: `/admin/dashboard`
- **Deskripsi**: Role admin dengan akses penuh ke semua sistem
- **Menu**:
  - 👥 Kelola User
  - 🏪 Kelola Penjual
  - 📋 Konten
  - ⚙️ Pengaturan

## 📁 Struktur File yang Ditambahkan

```
app/Http/
  Controllers/
    UserController.php       # Controller untuk user
    PenjualController.php    # Controller untuk penjual
    AdminController.php      # Controller untuk admin
  Middleware/
    CheckRole.php           # Middleware untuk cek role

resources/views/roles/
  user/
    dashboard.blade.php     # Dashboard untuk user
  penjual/
    dashboard.blade.php     # Dashboard untuk penjual
  admin/
    dashboard.blade.php     # Dashboard untuk admin

database/migrations/
  2025_11_25_000000_add_role_to_users_table.php  # Migration untuk menambah kolom role
```

## 🛠️ Cara Menggunakan

### 1. Login dengan Role Berbeda
Anda bisa login dengan salah satu dari 3 akun test:
```
User Biasa:
- Email: user@test.com
- Password: password

Penjual:
- Email: penjual@test.com
- Password: password

Admin:
- Email: admin@test.com
- Password: password
```

### 2. Akses Dashboard Sesuai Role
Setelah login, gunakan URL sesuai role:
- User: `/user/dashboard`
- Penjual: `/penjual/dashboard`
- Admin: `/admin/dashboard`

## 🔒 Middleware Role

Middleware `CheckRole` sudah dikonfigurasi untuk melindungi route berdasarkan role user:

```php
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('role:admin');
```

Jika user mencoba akses route yang bukan role mereka, akan mendapat error 403.

## 📝 Cara Menambah Role Baru

Jika ingin menambah role baru:

1. Update migration untuk menambah role baru di enum:
```php
$table->enum('role', ['user', 'penjual', 'admin', 'role_baru'])->default('user');
```

2. Buat controller baru:
```php
// app/Http/Controllers/RoleBaruController.php
```

3. Buat view dashboard:
```blade
// resources/views/roles/rolebaru/dashboard.blade.php
```

4. Tambah route di web.php:
```php
Route::get('/rolebaru/dashboard', [RoleBaruController::class, 'dashboard'])
    ->middleware('role:rolebaru');
```

## ✨ Fitur yang Dapat Dikembangkan

1. Halaman produk untuk penjual
2. Halaman manajemen user untuk admin
3. Sistem notifikasi untuk penjual
4. Dashboard dengan statistik/grafik
5. Halaman kategori produk
6. Sistem pembayaran untuk user
7. Rating dan review produk
8. Wishlist untuk user

---

Sistem role sudah siap digunakan! 🚀

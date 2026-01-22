# CRUD Laravel Siswa (Role Admin & View Only)

Aplikasi CRUD data siswa berbasis **Laravel** yang sudah dilengkapi dengan **autentikasi (login)** dan **role user**.

Project ini merupakan **pengembangan dari CRUD Laravel dasar**, dengan pembagian hak akses:
- **Admin** → full akses (create, edit, delete)
- **User biasa** → hanya melihat data (view only)

---

## ✨ Fitur
- Login & Logout
- CRUD Data Siswa
- Pagination
- Search data siswa
- Validasi Form
- Role User:
  - **Admin**: tambah, edit, hapus data
  - **Non Admin**: hanya melihat data (tanpa tombol edit & delete)
- Proteksi route menggunakan middleware

---

## 🛠️ Teknologi
- Laravel
- PHP
- MySQL
- Blade Template
- Bootstrap

---

## 👥 Role & Hak Akses

| Role  | Akses |
|------|------|
| Admin | Create, Read, Update, Delete |
| User  | Read (View Only) |

Tombol **Edit** dan **Delete** hanya tampil untuk **Admin**.

---

## 📦 Cara Install

### 1. Clone Repository
```bash
git clone https://github.com/Reka212/crud-laravel-siswa-role-admin-viewonly.git
cd crud-laravel-siswa-role-admin-viewonly

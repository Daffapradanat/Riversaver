# Riversaver Native

Riversaver Native adalah aplikasi berbasis PHP Native yang bertujuan untuk membantu pengelolaan data terkait berita, game, galeri, merchandise, dan komentar dengan sistem autentikasi admin. Aplikasi ini memiliki fitur backoffice untuk memudahkan pengelolaan konten.

## Fitur Utama

- **Autentikasi Admin:** Login, registrasi, dan logout untuk admin.
- **Manajemen Profil:** Update profil admin termasuk username, nama, alamat, nomor telepon, dan foto profil.
- **Update Password:** Ubah password dengan verifikasi password lama.
- **CRUD Data:** Kelola data untuk berita, game, galeri, merchandise, dan komentar.
- **Upload Gambar:** Upload gambar untuk profil dan konten lainnya.
- **Dashboard Admin:** Tampilan dashboard untuk memantau dan mengelola data.

## Struktur Proyek

```
riversaver/
├── config/
│   └── koneksi.php
├── route/
├── backoffice/
│   ├── controller/
│   │   ├── authController.php
│   │   └── profileController.php
│   ├── view/
│   │   ├── profile.php
│   │   ├── register.php
│   │   └── tambah/
│   ├── component/
│       ├── sidebar.php
│       ├── header.php
│       ├── updateProfile.php
│       └── updatePassword.php
├── assets/
    ├── css/
    ├── js/
    └── image/
        └── admin/
```

## Instalasi

1. **Clone repository ini:**
   ```bash
   git clone https://github.com/USERNAME/Riversaver_Native.git
   ```

2. **Pindahkan ke direktori proyek:**
   ```bash
   cd Riversaver_Native
   ```

3. **Konfigurasi Database:**
   - Buat database di MySQL.
   - Import file SQL yang sesuai.
   - Edit `config/koneksi.php` dengan konfigurasi database Anda.

4. **Jalankan Proyek:**
   - Pastikan **Laragon** atau **XAMPP** berjalan.
   - Akses melalui browser:
     ```
     http://localhost/Riversaver_Native/
     ```

## Penggunaan

1. **Registrasi Admin:**
   - Akses `register.php` untuk membuat akun admin baru.

2. **Login:**
   - Masuk dengan akun yang sudah terdaftar.

3. **Kelola Data:**
   - Akses dashboard untuk menambah, mengedit, atau menghapus data.

4. **Update Profil & Password:**
   - Gunakan fitur update untuk memperbarui informasi profil atau mengubah password.

## Kontribusi

1. Fork repository ini.
2. Buat branch fitur baru:
   ```bash
   git checkout -b fitur-baru
   ```
3. Commit perubahan:
   ```bash
   git commit -m "Tambah fitur baru"
   ```
4. Push ke branch Anda:
   ```bash
   git push origin fitur-baru
   ```
5. Buat Pull Request.

## Lisensi

Proyek ini dilisensikan di bawah MIT License.

## Kontak

Untuk pertanyaan lebih lanjut, silakan hubungi [neoleo1140@gmail.com].

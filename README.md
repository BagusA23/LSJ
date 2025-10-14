# Laravel 11 Starter Kit - Edisi Keamanan & Livewire

Selamat datang di Laravel 11 Starter Kit! Proyek ini adalah fondasi yang kokoh dan aman untuk memulai pengembangan aplikasi web modern Anda. Dibangun di atas Laravel 11, starter kit ini sudah terintegrasi dengan Laravel Jetstream (stack Livewire) dan dilengkapi dengan lapisan keamanan HTTP Headers yang ketat melalui middleware khusus.

## ✨ Fitur Utama

-   **Framework Terbaru**: Dibangun di atas [Laravel 11](https://laravel.com/docs/11.x).
-   **Autentikasi Lengkap**: Menggunakan [Laravel Jetstream](https://jetstream.laravel.com/2.x/introduction.html) dengan stack [Livewire](https://livewire.laravel.com/).
    -   Registrasi & Login Pengguna
    -   Manajemen Profil (Update data, ganti password)
    -   Fitur Hapus Akun
-   **Keamanan Tingkat Lanjut**: Implementasi middleware `SecurityHeadersMiddleware` untuk menerapkan praktik terbaik keamanan web modern.
-   **Validasi Password Kuat**: Aturan validasi password yang ketat saat registrasi untuk memastikan keamanan akun pengguna.
-   **Konfigurasi Modern**: Menggunakan Vite untuk *asset bundling* yang super cepat.

---

## 🚀 Panduan Instalasi

1.  **Clone Repository**
    ```bash
    git clone https://github.com/BagusA23/LSJ.git
    cd repository
    ```

2.  **Install Dependensi PHP**
    ```bash
    composer install
    ```

3.  **Buat File Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasinya.
    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database**
    Buka file `.env` dan atur koneksi database Anda (nama database, user, password).
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Jalankan Migrasi Database**
    ```bash
    php artisan migrate
    ```

7.  **Install Dependensi JavaScript**
    ```bash
    npm install
    ```

8.  **Jalankan Development Server**
    ```bash
    npm run dev
    ```
    Aplikasi Anda sekarang akan berjalan di `http://127.0.0.1:8000` dan Vite dev server di `http://localhost:5173`.

---

## 🛡️ Fitur Keamanan (SecurityHeadersMiddleware)

Untuk meningkatkan keamanan aplikasi dari serangan umum seperti XSS, Clickjacking, dan lainnya, starter kit ini menyertakan `App\Http\Middleware\SecurityHeadersMiddleware.php`. Middleware ini secara otomatis menambahkan HTTP security headers penting pada setiap response.

### Headers yang Diterapkan

-   `Strict-Transport-Security` (HSTS): Memaksa browser untuk selalu berkomunikasi melalui HTTPS. Aktif hanya di lingkungan `production`.
-   `X-Content-Type-Options`: Mencegah browser dari *MIME-type sniffing*.
-   `X-Frame-Options`: Melindungi dari serangan *Clickjacking* dengan memblokir rendering halaman dalam `<iframe>` dari origin yang berbeda.
-   `Referrer-Policy`: Mengontrol informasi referrer yang dikirim saat navigasi.
-   `Cross-Origin-Opener-Policy` & `Cross-Origin-Resource-Policy`: Melindungi dari serangan *cross-origin* seperti Spectre.
-   `Permissions-Policy`: Membatasi izin penggunaan fitur browser (kamera, geolokasi, dll) secara default.

### Content Security Policy (CSP)

CSP adalah lapisan pertahanan kritis untuk mencegah serangan *Cross-Site Scripting* (XSS). Middleware ini menerapkan kebijakan CSP yang berbeda untuk lingkungan development dan production.

-   **Development (`APP_ENV=local`)**:
    -   Aturan lebih longgar untuk mendukung Vite Dev Server dan Hot Module Replacement (HMR).
    -   Mengizinkan `unsafe-inline` dan `unsafe-eval` untuk kemudahan debugging.

-   **Production (`APP_ENV=production`)**:
    -   Aturan sangat ketat.
    -   **Tidak mengizinkan** script atau style inline (`unsafe-inline`).
    -   **Tidak mengizinkan** `eval()` (`unsafe-eval`).
    -   Semua aset (script, style, font) hanya diizinkan dari domain aplikasi sendiri (`'self'`) dan CDN yang terpercaya (misal: `fonts.bunny.net`).

#### Mode Uji Coba (Report-Only)

Saat Anda menambahkan resource eksternal baru (CDN, script pihak ketiga), Anda mungkin perlu menyesuaikan CSP. Untuk menguji perubahan tanpa memblokir resource, Anda bisa menggunakan mode "Report-Only".

Set variabel berikut di file `.env` Anda:
```env
CSP_REPORT_ONLY=true

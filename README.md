# Praktikum 7 PHP DASAR

|                |                    |
| ------------------ | ------------------ |
|      _Nama_    | Dwi Okta Ramadhani |
|      _NIM_     |      312410056     |
|     _Kelas_    |      TI.24.A1      |
|  _Mata Kuliah_ | Bahasa Pemrograman Web 1 |


# Aplikasi PHP Sederhana: Form Data Diri & Perhitungan Gaji

Aplikasi web sederhana berbasis PHP yang menampilkan form input data diri dan menghitung gaji bersih berdasarkan pilihan pekerjaan. Proyek ini cocok untuk latihan dasar PHP (form handling, kondisi, tanggal, dan formatting angka) menggunakan lingkungan XAMPP.

## Fitur
- **Form Data Diri**: Nama, Tanggal Lahir, dan Pekerjaan.
- **Hitung Umur Otomatis** dari tanggal lahir.
- **Gaji Pokok per Pekerjaan** ditentukan via `switch`.
- **Gaji Bersih** dihitung setelah pajak 10%.
- **Format Rupiah** untuk tampilan angka.

## Teknologi
- PHP (CLI/Apache Module via XAMPP)
- HTML dasar

## Struktur Proyek
```
htdocs/
├─ index.php                 # Redirect bawaan XAMPP ke /dashboard/
└─ data_diri.php/
   └─ tugasgajih.php         # Halaman utama aplikasi (form + logika perhitungan)
```

## Cara Menjalankan (Lokal via XAMPP)
1. Pastikan XAMPP terpasang dan service **Apache** aktif.
2. Letakkan folder/file ini di direktori `htdocs` XAMPP.
3. Akses di browser:
   - `http://localhost/data_diri.php/tugasgajih.php`

Jika `index.php` XAMPP masih aktif, halaman root `http://localhost/` akan mengarah ke dashboard XAMPP. Masuk langsung ke path file aplikasi seperti di atas.

## Penjelasan Kode Utama (`data_diri.php/tugasgajih.php`)
- **Form Input (method POST)** untuk `nama`, `tgl_lahir`, `pekerjaan`.
- Saat form dikirim (`$_SERVER["REQUEST_METHOD"] == "POST"`):
  - Hitung umur: `DateTime($tgl_lahir)` dan `diff` terhadap `new DateTime()`.
  - Tentukan gaji pokok via `switch ($pekerjaan)`:
    - Programmer: 8.000.000
    - Designer: 6.000.000
    - Manager: 10.000.000
    - Admin: 5.000.000
    - Freelancer: 4.000.000
  - Hitung pajak 10% lalu gaji bersih: `gaji - (gaji * 0.1)`.
  - Tampilkan hasil dengan format rupiah: `number_format($angka, 0, ',', '.')`.

## Kustomisasi
- Ubah daftar pekerjaan dan nilai gaji pada blok `switch` sesuai kebutuhan.
- Ubah tarif pajak pada variabel `$pajak`.
- Tambahkan validasi input lanjutan (misal batas umur) bila diperlukan.

## Prasyarat
- XAMPP (Apache + PHP) atau server PHP lain.
- PHP 7.4+ (disarankan) agar kompatibel dengan `DateTime` dan fitur umum.


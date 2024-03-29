# DOKUMENTASI SISTEM PKL

## DAFTAR FOLDER
Buatlah manual beberapa folder berikut didalam folder resource/...
dikarenakan folder ini tidak di push
```sh
dokumenPKL
file
suratMahasiswa
suratResmiPKL
import
```
## DAFTAR ISI
1. [Git Command](https://github.com/Suryanandana/sistempkl#git-command)
2. [Database Command](https://github.com/Suryanandana/sistempkl#database-command)
## GIT COMMAND
Dokumentasi untuk coomand line yang berhubungan dengan git.
Pastikan path atau lokasi terminal sudah dalam project sistem pkl.
Secara default pathnya: C:\xampp\htdocs\sistempkl.
### Fetch
Lakukan perintah dibawah untuk mengecek apakah ada commit baru yang ditambahkan.
Jika tidak maka bisa langsung mulai mengerjakan tugas.
Jika ada maka jalankan perintah pull
```sh
git fetch
```
### Pull
Lakukan perintah dibawah untuk mengambil seluruh perubahan yang mungkin dilakukan oleh anggota lain.
Jika sudah di pull maka bisa mulai mengerjakan tugas
```sh
git pull
```
### Add
Lakukan perintah dibawah untuk menambahkan seluruh file yang sudah diubah.
Lakukan perintah ini hanya ketika tugas sudah selesai dan berhasil tanpa ada error
```sh
git add .
```
### commit
Lakukan perintah dibawah untuk menyimpan seluruh perubahan secara local (device masing-masing).
Lakukan perintah ini hanya ketika tugas sudah selesai dan berhasil tanpa ada error
```sh
git commit -m "deskripsikan pesan tugas atau perubahan yang dibuat"
```
### push
Lakukan perintah dibawah untuk menyimpan seluruh perubahan secara online pada github.
Lakukan perintah ini hanya ketika tugas sudah selesai dan berhasil tanpa ada error
```sh
git push
```
## DATABASE COMMAND
Dokumentasi untuk command line yang berhubungan dengan database.
Pastikan path atau lokasi terminal sudah dalam project sistem pkl.
Secara default pathnya: C:\xampp\htdocs\sistempkl
### Reset migration
Jalankan perintah dibawah untuk melakukan reset seluruh tabel pada database
```sh
composer rollback-reset
```
### Eksekusi Migration
Jalankan perintah dibawah untuk membuat seluruh tabel pada database
```sh
composer migrate
```
### Eksekusi Seeder
Jalankan perintah dibawah untuk mengisi data pada database
```sh
composer run-seed
```
### Daftar Data Dummy
Berikut adalah list daftar dummy yang bisa digunakan saat login pada sistem.
Dengan catatan sudah menjalankan perintah [seeder](https://github.com/Suryanandana/sistempkl#eksekusi-seeder)
| Username           | Password   | Level               |
| :----------------- | :--------- | :------------------ |
| Admin              | admin123   | Admin               |
| 2115354001         | budi123    | Mahasiswa           |
| 111111111111111111 | sucipto123 | Pembimbing_Kampus   |
| bruno@gmail.com    | bruno123   | Pembimbing_Industri |
### Perintah Trigger
Kusus untuk trigger jalankan pada phpmyadmin lalu pilih database sistempkl.
Lalu pada menu bagian atas pilih sql dan paste disana lalu go
```sh
DELIMITER $$
CREATE TRIGGER validasi_hapus
BEFORE DELETE ON login
FOR EACH ROW
BEGIN
	DECLARE row_mhs INT;
    DECLARE row_kampus INT;
    DECLARE row_industri INT;
    SELECT COUNT(*) INTO row_mhs FROM mahasiswa WHERE nim = old.username;
    SELECT COUNT(*) INTO row_kampus FROM pembimbing_kampus WHERE nip = old.username;
    SELECT COUNT(*) INTO row_industri FROM pembimbing_industri WHERE email = old.username;
    IF row_mhs > 0 OR row_kampus > 0 OR row_industri > 0 THEN
    	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot delete login record because there are associated mahasiswa, pembimbing_kampus, or pembimbing_industri';
    END IF;
END$$
DELIMITER ;
```
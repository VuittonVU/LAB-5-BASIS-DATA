# LAB-5-BASIS-DATA
Sulung Ismanara        - 231401060 <br>
Vuitton Varian Utomo   - 231401063 <br>
JASON Sanjaya          - 231401066 <br>
Marco Aprilian Leonard - 231401069 <br>
#
1. Buat sebuah database menggunakan PostgreSQL untuk sebuah aplikasi berbasis web. <br>
CREATE DATABASE Register;                  <br>
CREATE TABLE users(                        <br>
    id SERIAL PRIMARY KEY,                 <br>
    username VARCHAR(100) UNIQUE NOT NULL, <br>
    password VARCHAR(255) NOT NULL,        <br>
    skor INTEGER DEFAULT 0,                <br>
    jumlah_permainan INTEGER DEFAULT 0,    <br>
    jumlah_menang INTEGER DEFAULT 0,       <br>
    rank INTEGER DEFAULT 0,                <br>
    highscore INTEGER DEFAULT 0,           <br>
    winrate DECIMAL(5,2) DEFAULT 0         <br>
);                                         <br>
#
2. Gambarkan ERD database tersebut mencakup entity, attribute, dan cardinality. Jumlah tabel minimal 3.
   ![image](https://github.com/user-attachments/assets/5b14ddfc-0b8c-4868-9b41-9960c7dfabca) <br>
   ![image](https://github.com/user-attachments/assets/4c43cd6e-2dbd-4636-a5de-2d37ef61e8cc) <br>
   ![image](https://github.com/user-attachments/assets/05041486-ef8b-43dd-a67f-9c64e01b1178) <br>
#
3. Pastikan setiap anggota kelompok harus bisa menceritakan struktur database ini. <br>
Sudah sangat mengerti.
#
4. Hubungkan database tersebut dengan web untuk melakukan CRUD (Create, Read, Update, Delete). Setelah database terhubung dengan web, tampilkan data dari database ke dalam web. <br>
CREATE: Pembuatan user baru <br>
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)"); <br>
            if ($stmt->execute(['username' => $username, 'password' => $hashed_password])) {   <br>
                $success = "Pendaftaran berhasil! Anda sekarang dapat masuk ke akun Anda.";    <br>
            } else {                                                                           <br>
                $error = "Terjadi kesalahan saat mendaftar, coba lagi.";                       <br>
            }                                                                                  <br>

READ: <br>
Pengambilan data untuk log in ke akun user yang sudah ada <br>
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username"); <br><br>

Pengambilan data untuk ditampilkan ke leaderboard
$query = "SELECT username, jumlah_permainan, winrate, rank, jumlah_menang, highscore FROM users WHERE id = :id"; <br>
    $stmt = $pdo->prepare($query); <br>

UPDATE: Mengupdate data dalam database sewaktu bermain dan selesai bermain <br>
$query = "UPDATE users SET <br>
            skor = :skor, 
            highscore = :highscore, 
            jumlah_permainan = :jumlah_permainan, 
            jumlah_menang = :jumlah_menang, 
            winrate = :winrate, 
            rank = :rank 
          WHERE id = :id"; <br>

DELETE: Menghapus akun user selamanya <br>
$query = "DELETE FROM users WHERE id = :id"; <br>
    $stmt = $pdo->prepare($query);           <br>

#
Implementasikan query SQL yang sudah dipelajari seperti DDL (Data Definition Language) untuk mendefinisikan skema database, DML (Data Manipulation Language) untuk melakukan proses manipulasi data yang terdapat dalam database. Pastikan query yang dibuat merupakan clean query.








   





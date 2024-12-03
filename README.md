![image](https://github.com/user-attachments/assets/0d3fb110-243f-402d-84af-81229f2c044a)# LAB-5-BASIS-DATA
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
![Screenshot (249)](https://github.com/user-attachments/assets/f0325e0e-07a5-489e-ac3b-b2a8b5e219c5)
![Screenshot (250)](https://github.com/user-attachments/assets/a03a25e2-ec10-49a4-a4ba-260acbcc5688)
![image](https://github.com/user-attachments/assets/38b5393d-89bc-4657-8027-97bd7589334e) <br>

READ: Pengambilan data untuk log in ke akun user yang sudah ada. <br>
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username"); <br><br>

Pengambilan data untuk profil <br>
$query = "SELECT username, jumlah_permainan, winrate, rank, jumlah_menang, highscore FROM users WHERE id = :id"; <br>
    $stmt = $pdo->prepare($query); <br>

![image](https://github.com/user-attachments/assets/453eba6c-c4f4-444b-baca-2185d356b388) <br>

Pengambilan data untuk ditampilkan ke leaderboard
$query = "SELECT username, jumlah_permainan, winrate, rank, jumlah_menang, highscore FROM users WHERE id = :id"; <br>
    $stmt = $pdo->prepare($query); <br>

![image](https://github.com/user-attachments/assets/be02f2ad-2e13-4de3-a55d-949076274299) <br>

UPDATE: Mengupdate data dalam database sewaktu bermain dan selesai bermain. <br>
$query = "UPDATE users SET <br>
            skor = :skor, 
            highscore = :highscore, 
            jumlah_permainan = :jumlah_permainan, 
            jumlah_menang = :jumlah_menang, 
            winrate = :winrate, 
            rank = :rank 
          WHERE id = :id"; <br>
          
![image](https://github.com/user-attachments/assets/4a2a5ede-734b-43db-8355-7193a9c4fef7) <br>
![image](https://github.com/user-attachments/assets/7e7befee-f848-49f1-9d40-4ae82c4a6bd6) <br>


DELETE: Menghapus akun user selamanya <br>
$query = "DELETE FROM users WHERE id = :id"; <br>
    $stmt = $pdo->prepare($query);           <br>

![Screenshot 2024-12-03 131844](https://github.com/user-attachments/assets/07f8e10a-6519-4f1e-a9a4-519d34aeab5c) <br>
![Screenshot 2024-12-03 131913](https://github.com/user-attachments/assets/953f2eb3-3908-4065-9ed6-b498de0af165)
#
5. Implementasikan query SQL yang sudah dipelajari seperti DDL (Data Definition Language) untuk mendefinisikan skema database, DML (Data Manipulation Language) untuk melakukan proses manipulasi data yang terdapat dalam database. Pastikan query yang dibuat merupakan clean query. <br>
DDL: <br>
DROP: drop table utama untuk dinormalisasikan menjadi 3 tabel <br>
![image](https://github.com/user-attachments/assets/743b5092-0e9a-440d-a67d-5417327221e7) <br>

CREATE: membuat 3 tabel: tabel users, user_statistics, dan user_ranking <br>
![image](https://github.com/user-attachments/assets/5d30c264-cde3-48ae-b2ef-1ab2f04011ac) <br>

ALTER: menambah kolom motto tapi drop lagi karena tidak terpakai<br>
![image](https://github.com/user-attachments/assets/a85dccc4-7cd0-4098-88bc-63fd267ae6c2) <br><br>

DML: <br>
DML itu merupakan bentuk implementasi query dari CRUD, jadi query yang dilakukan itu sama. <br>
INSERT: menambah user baru ke database. <br>
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)"); <br>
            if ($stmt->execute(['username' => $username, 'password' => $hashed_password])) {   <br>
                $success = "Pendaftaran berhasil! Anda sekarang dapat masuk ke akun Anda.";    <br>
            } else {                                                                           <br>
                $error = "Terjadi kesalahan saat mendaftar, coba lagi.";                       <br>
            }                                                                                  <br>
![Screenshot (249)](https://github.com/user-attachments/assets/f0325e0e-07a5-489e-ac3b-b2a8b5e219c5)
![Screenshot (250)](https://github.com/user-attachments/assets/a03a25e2-ec10-49a4-a4ba-260acbcc5688)
![image](https://github.com/user-attachments/assets/38b5393d-89bc-4657-8027-97bd7589334e) <br>

SELECT: mengambil data untuk login dan profil. <br>
Pengambilan data untuk log in ke akun user yang sudah ada <br>
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username"); <br><br>

Pengambilan data untuk profil <br>
$query = "SELECT username, jumlah_permainan, winrate, rank, jumlah_menang, highscore FROM users WHERE id = :id"; <br>
    $stmt = $pdo->prepare($query); <br>

![image](https://github.com/user-attachments/assets/453eba6c-c4f4-444b-baca-2185d356b388) <br>

UPDATE: Mengupdate data dalam database sewaktu bermain dan selesai bermain. <br>
$query = "UPDATE users SET <br>
            skor = :skor, 
            highscore = :highscore, 
            jumlah_permainan = :jumlah_permainan, 
            jumlah_menang = :jumlah_menang, 
            winrate = :winrate, 
            rank = :rank 
          WHERE id = :id"; <br>
          
![image](https://github.com/user-attachments/assets/4a2a5ede-734b-43db-8355-7193a9c4fef7) <br>
![image](https://github.com/user-attachments/assets/7e7befee-f848-49f1-9d40-4ae82c4a6bd6) <br>

DELETE: menghapus akun user selamanya. <br>
$query = "DELETE FROM users WHERE id = :id"; <br>
    $stmt = $pdo->prepare($query);           <br>

![Screenshot 2024-12-03 131844](https://github.com/user-attachments/assets/07f8e10a-6519-4f1e-a9a4-519d34aeab5c) <br>
![Screenshot 2024-12-03 131913](https://github.com/user-attachments/assets/953f2eb3-3908-4065-9ed6-b498de0af165)



















   





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

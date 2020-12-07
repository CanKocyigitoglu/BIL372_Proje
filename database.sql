CREATE TABLE sinavlar (
    Sinav_ID INT NOT NULL AUTO_INCREMENT,
    Sinav_Adi varchar(10),
    Baslangic VARCHAR(5) NOT NULL,
    Bitis VARCHAR(5) NOT NULL,
    Sinav_Tarihi DATE NOT NULL,
    Agirligi INT,
    Toplam_Sure INT,
    Soru_Sayisi INT,
    PRIMARY KEY (Sinav_ID)
) ENGINE=INNODB;

CREATE TABLE sorular(
    Soru_ID INT NOT NULL AUTO_INCREMENT,
    Konusu VARCHAR(50),
    Sorusu VARCHAR (1000),
    Sirasi INT,
    PRIMARY KEY (Soru_ID)	
) ENGINE=INNODB;

CREATE TABLE soru_secenekler(
    Soru_ID INT NOT NULL,
    Secenek varchar(10),
    FOREIGN KEY (Soru_ID)
        REFERENCES sorular(Soru_ID)
) ENGINE=INNODB;

CREATE TABLE sinav_soru(
    Sinav_ID INT NOT NULL,
    Soru_ID INT NOT NULL,
    FOREIGN KEY (Sinav_ID)
        REFERENCES sinavlar(Sinav_ID)
        ON DELETE CASCADE,
    FOREIGN KEY (Soru_ID)
        REFERENCES sorular(Soru_ID)
        ON DELETE CASCADE    
) ENGINE=INNODB;

CREATE TABLE cevaplar(
    Cevap_ID INT NOT NULL AUTO_INCREMENT,
    Onaylama_Suresi INT,
    Ilk_Etkilisim_Suresi INT,
    Cevaplama_Suresi INT,
    Cevap varchar(10),
    PRIMARY KEY (Cevap_ID)
) ENGINE=INNODB;

CREATE TABLE ogrenciler(
    Ogrenci_ID VARCHAR(9),
    Ad VARCHAR(20),
    Soyad VARCHAR(20),
    Not_Ortalamasi VARCHAR(5),
    Odev_Ortalamasi VARCHAR(3),
    Yoklama VARCHAR(10),
    PRIMARY KEY (Ogrenci_ID)
) ENGINE=INNODB;

CREATE TABLE dersler(
    Kodu VARCHAR (10) NOT NULL,
    Sinav_ID INT NOT NULL AUTO_INCREMENT,
    Gecme_Notu VARCHAR(4),
    PRIMARY KEY (Kodu),
    FOREIGN KEY (Sinav_ID)
        REFERENCES sinavlar(Sinav_ID)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE ders_ogrenci(
    Ders_Kodu VARCHAR(10) NOT NULL,
    Ogrenci_ID VARCHAR(9),
    FOREIGN KEY (Ogrenci_ID)
        REFERENCES ogrenciler(Ogrenci_ID)
        ON DELETE CASCADE,
    FOREIGN KEY (Ders_Kodu)
        REFERENCES dersler(Kodu)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE Ogretim_Gorevlileri(
    Kodu VARCHAR (10),
    Ad VARCHAR(20),
    Soyad VARCHAR(20),
    PRIMARY KEY (Kodu)    
) ENGINE=INNODB;

CREATE TABLE OG_KAYITLI_DERS(
	Ders_Kodu VARCHAR(10),
    OG_Kodu VARCHAR(10),
    FOREIGN KEY (Ders_Kodu)
        REFERENCES dersler(Kodu)
        ON DELETE CASCADE,
    FOREIGN KEY (OG_Kodu)
        REFERENCES Ogretim_Gorevlileri(Kodu)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE sinava_giren_listesi (
    Ogrenci_ID VARCHAR(9),
    Sinav_ID INT NOT NULL,
    Notu INT NOT NULL,
    FOREIGN KEY (Ogrenci_ID)
        REFERENCES ogrenciler(Ogrenci_ID)
        ON DELETE CASCADE,
    FOREIGN KEY (Sinav_ID)
        REFERENCES sinavlar(Sinav_ID)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE soru_cevap(
    Ogrenci_ID varchar(9) NOT NULL,
    Sinav_ID INT NOT NULL,
    Soru_ID INT NOT NULL,
    Cozum_ID INT NOT NULL,
    FOREIGN KEY (Ogrenci_ID)
        REFERENCES ogrenciler(Ogrenci_ID)
        ON DELETE CASCADE,
    FOREIGN KEY (Sinav_ID)
        REFERENCES sinavlar(Sinav_ID)
        ON DELETE CASCADE,
    FOREIGN KEY (Soru_ID)
        REFERENCES sorular(Soru_ID)
        ON DELETE CASCADE,
    FOREIGN KEY (Cozum_ID)
        REFERENCES cevaplar(Cevap_ID)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB;
  
 INSERT INTO `login` (`id`, `email`, `password`) VALUES
(111101001, 'oguzergin@etu.edu.tr', '456'),
(111101003, 'mehmettan@etu.edu.tr', '1234'),
(111101007, 'tanselozyer@etu.edu.tr', '123');

INSERT INTO `ogretim_gorevlileri` (`Kodu`, `Ad`, `Soyad`) VALUES
('111101001', 'Oğuz', 'Ergin'),
('111101003', 'Mehmet', 'Tan'),
('111101007', 'Tansel', 'Ozyer');

INSERT INTO `sinavlar` (`Sinav_ID`,`Sinav_Adi`, `Baslangic`, `Bitis`, `Sinav_Tarihi`, `Agirligi`, `Toplam_Sure`, `Soru_Sayisi`) VALUES
(1,'midterm1', '19.00', '21.00', '2020-09-09', 20, 120, 3 ),
(2, 'midterm2','12.00', '14.00', '2020-09-10', 15, 120, 3 ),
(3, 'final','15.00', '16.00', '2020-09-21', 30, 60, 3 );

INSERT INTO `sorular` (`Soru_ID`, `Konusu`, `Sorusu`, `Sirasi`) VALUES
(1, 'mat', '10/2x3=?', 1),
(2,  'mat', '6+2x3=?', 2),
(3,  'mat', '2-2x3=?', 3),

(4,  'mat', '5-2x3=?', 3),
(5,  'mat', '2x3+2=?', 1),
(6, 'mat', '2x3/5=?', 2),

(7, 'mat', '4x2x3=?', 2),
(8, 'mat', '2x33=?', 1),
(9, 'mat', '2x32=?', 3);

INSERT INTO `soru_secenekler` (`Soru_ID`, `Secenek`) VALUES
(1,"A"),
(1,"B"),
(1,"C"),

(2,"A"),
(2,"B"),

(3,"A"),
(3,"B"),
(3,"C"),
(3,"D"),
(3,"E"),

(4,"A"),
(4,"B"),
(4,"C"),
(4,"D"),

(5,"A"),
(5,"B"),
(5,"C"),
(5,"D"),
(5,"E"),

(6,"A"),
(6,"B"),
(6,"C"),
(6,"D"),
(6,"E"),

(7,"A"),
(7,"B"),
(7,"C"),

(8,"A"),
(8,"B"),
(8,"C"),
(8,"D"),

(9,"A"),
(9,"B"),
(9,"C"),
(9,"D"),
(9,"E");

INSERT INTO `sinav_soru` (`Sinav_ID`,`Soru_ID`) VALUES
(1,1),
(1,2),
(1,3),

(2,4),
(2,5),
(2,6),

(3,7),
(3,8),
(3,9);

INSERT INTO `cevaplar` (`Cevap_ID`, `Onaylama_Suresi`, `Ilk_Etkilisim_Suresi`, `Cevaplama_Suresi`, `Cevap`) VALUES

(1, 5, 10, 200, "A"),
(2, 50, 14, 205,"B"),
(3, 400, 16, 210,"A" ),
(4, 30, 17, 120, "C" ),

(5, 500, 115, 420,"A"),
(6, 59, 15, 202,"B"),
(7, 23, 107, 220,"A"),
(8, 545, 104, 270,"B"),

(9, 59, 102, 200, "E"),
(10, 50, 14, 205, "A"),
(11, 800, 162, 210, "A"),
(12, 305, 17, 120,"D"),

(13, 502, 115, 420,"A"),
(14, 590, 152, 202, "A"),
(15, 231, 107, 220, "C"),
(16, 549, 104, 270, "B"),

(17, 5, 10, 200, "A"),
(18, 50, 14, 205,"B"),
(19, 400, 16, 210,"A" ),
(20, 30, 17, 120, "A" ),

(21, 500, 115, 420,"E"),
(22, 59, 15, 202,"E"),
(23, 23, 107, 220,"C"),
(24, 545, 104, 270,"C"),

(25, 59, 102, 200, "A"),
(26, 50, 14, 205, "C"),
(27, 800, 162, 210, "B"),
(28, 305, 17, 120,"B"),

(29, 502, 115, 420,"C"),
(30, 590, 152, 202, "D"),
(31, 231, 107, 220, "C"),
(32, 549, 104, 270, "C"),

(33, 590, 152, 202, "D"),
(34, 231, 107, 220, "E"),
(35, 549, 104, 270, "C"),
(36, 549, 104, 270, "C");

INSERT INTO `ogrenciler` (`Ogrenci_ID`, `Ad`, `Soyad`, `Not_Ortalamasi`, `Odev_Ortalamasi`, `Yoklama`) VALUES
('111111111', 'test', 'testoğlu', '4.00', '100', '0'),
('141101029', 'Osman', 'Çalışkan', '2.50', '89', '5'),
('161101066', 'Furkan', 'Dolaşık', '2.50', '89', '3'),
('161101073', 'Can', 'Koçyiğitoğlu', '2.50', '89', '2');

INSERT INTO `dersler` (`Kodu`, `Sinav_ID`, `Gecme_Notu`) VALUES
('Bil 372', 1, '20');

INSERT INTO `ders_ogrenci` (`Ders_Kodu`,`Ogrenci_ID`) VALUES
('Bil 372','161101066'),
('Bil 372','111111111'),
('Bil 372','161101073'),
('Bil 372','141101029');

INSERT INTO `og_kayitli_ders` (`Ders_Kodu`, `OG_Kodu`) VALUES
('Bil 372', '111101003');

INSERT INTO `soru_cevap` (`Ogrenci_ID`, `Sinav_ID`, `Soru_ID`, `Cozum_ID`) VALUES
('111111111', 1, 1, 1),
('111111111', 1, 2, 2),
('111111111', 1, 3, 3),

('141101029', 1, 1, 4),
('141101029', 1, 2, 5),
('141101029', 1, 3, 6),

('161101066', 1, 1, 7),
('161101066', 1, 2, 8),
('161101066', 1, 3, 9),

('161101073', 1, 1, 10),
('161101073', 1, 2, 11),
('161101073', 1, 3, 12),



('111111111', 2, 4, 13),
('111111111', 2, 5, 14),
('111111111', 2, 6, 15),

('141101029', 2, 4, 16),
('141101029', 2, 5, 17),
('141101029', 2, 6, 18),

('161101066', 2, 4, 19),
('161101066', 2, 5, 20),
('161101066', 2, 6, 21),

('161101073', 2, 4, 22),
('161101073', 2, 5, 23),
('161101073', 2, 6, 24),



('111111111', 3, 7, 25),
('111111111', 3, 8, 26),
('111111111', 3, 9, 27),

('141101029', 3, 7, 28),
('141101029', 3, 8, 29),
('141101029', 3, 9, 30),

('161101066', 3, 7, 31),
('161101066', 3, 8, 32),
('161101066', 3, 9, 33),

('161101073', 3, 7, 34),
('161101073', 3, 8, 35),
('161101073', 3, 9, 36);

INSERT INTO `sinava_giren_listesi` (`Ogrenci_ID`, `Sinav_ID`, `Notu`) VALUES
('111111111', 1, 100),
('141101029', 1, 78),
('161101066', 1, 72),
('161101073', 1, 87),

('111111111', 2, 95),
('141101029', 2, 63),
('161101066', 2, 62),
('161101073', 2, 47),

('111111111', 3, 100),
('141101029', 3, 50),
('161101066', 3, 60),
('161101073', 3, 73);
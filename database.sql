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
    Sifre VARCHAR(100),
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
(1,'midterm1', '19.00', '21.00', '2020-09-09', 20, 120, 5 ),
(2, 'midterm2','12.00', '14.00', '2020-09-10', 15, 120, 7 ),
(3, 'final','15.00', '16.00', '2020-09-21', 30, 60, 6 ),
(4, 'midterm1','19.00', '22.00', '2020-09-03', 25, 180, 4 ),
(5, 'quiz1','08.00', '10.00', '2020-09-12', 40, 120, 5 ),
(6, 'midterm2','19.00', '21.00', '2020-09-09', 30, 120, 8 );

INSERT INTO `sorular` (`Soru_ID`, `Konusu`, `Sorusu`, `Sirasi`) VALUES
(1, 'mat', '10/2x3=?', 1),
(2,  'mat', '6+2x3=?', 2),
(3,  'mat', '2-2x3=?', 3),
(4,  'mat', '5-2x3=?', 4),
(5,  'mat', '2x3+2=?', 1),
(6, 'mat', '2x3/5=?', 2),
(7, 'mat', '4x2x3=?', 3),
(8, 'mat', '2x33=?', 4);

INSERT INTO `soru_secenekler` (`Soru_ID`, `Secenek`) VALUES
(1,"A"),
(1,"B"),
(1,"C"),
(1,"D"),
(1,"E"),
(2,"A"),
(2,"B"),
(2,"C"),
(2,"D"),
(2,"E"),
(3,"A"),
(3,"B"),
(3,"C"),
(3,"D"),
(3,"E"),
(4,"A"),
(4,"B"),
(4,"C"),
(4,"D"),
(4,"E"),
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
(7,"D"),
(7,"E"),
(8,"A"),
(8,"B"),
(8,"C"),
(8,"D"),
(8,"E");


INSERT INTO `sinav_soru` (`Sinav_ID`,`Soru_ID`) VALUES
(1,1),
(1,5),
(1,8),
(1,3),
(2,2),
(2,4),
(2,6),
(3,1),
(3,4),
(4,5),
(4,6),
(5,8),
(5,3),
(6,4),
(6,6),
(6,3);

INSERT INTO `cevaplar` (`Cevap_ID`, `Onaylama_Suresi`, `Ilk_Etkilisim_Suresi`, `Cevaplama_Suresi`, `Cevap`) VALUES
(1, 5, 10, 200, "A"),
(2, 50, 14, 205,"B"),
(3, 400, 16, 210,"A" ),
(4, 30, 17, 120, "C" ),
(5, 500, 115, 420,"C"),
(6, 59, 15, 202,"D"),
(7, 23, 107, 220,"A"),
(8, 545, 104, 270,"B"),
(9, 59, 102, 200, "E"),
(10, 50, 14, 205, "E"),
(11, 800, 162, 210, "A"),
(12, 305, 17, 120,"B"),
(13, 502, 115, 420,"C"),
(14, 590, 152, 202, "D"),
(15, 231, 107, 220, "E"),
(16, 549, 104, 270, "C");

INSERT INTO `ogrenciler` (`Ogrenci_ID`, `Ad`, `Soyad`, `Sifre`, `Not_Ortalamasi`, `Odev_Ortalamasi`, `Yoklama`) VALUES
('111111111', 'test', 'testoğlu', '789', '4.00', '100', '0'),
('141101029', 'Osman', 'Çalışkan', '123', '2.50', '89', '5'),
('161101066', 'Furkan', 'Dolaşık', '456', '2.50', '89', '3'),
('161101073', 'Can', 'Koçyiğitoğlu', '1234', '2.50', '89', '2');

INSERT INTO `dersler` (`Kodu`, `Sinav_ID`, `Gecme_Notu`) VALUES
('Bil 103', 3, '40' ),
('Bil 361', 2, '60'),
('Bil 372', 1, '20');

INSERT INTO `ders_ogrenci` (`Ders_Kodu`,`Ogrenci_ID`) VALUES
('Bil 103','111111111'),
('Bil 103','141101029'),
('Bil 361','141101029'),
('Bil 361','161101073'),
('Bil 372','161101066'),
('Bil 372','111111111'),
('Bil 372','161101073');

INSERT INTO `og_kayitli_ders` (`Ders_Kodu`, `OG_Kodu`) VALUES
('Bil 361', '111101001'),
('Bil 372', '111101003'),
('Bil 103', '111101007');

INSERT INTO `soru_cevap` (`Ogrenci_ID`, `Sinav_ID`, `Soru_ID`, `Cozum_ID`) VALUES
('111111111', 1, 2, 2),
('141101029', 1, 5, 1),
('161101066', 2, 3, 5),
('161101073', 3, 4, 6),
('111111111', 2, 2, 2),
('141101029', 4, 5, 1),
('161101066', 3, 3, 5),
('161101073', 1, 4, 6);

INSERT INTO `sinava_giren_listesi` (`Ogrenci_ID`, `Sinav_ID`, `Notu`) VALUES
('111111111', 2, 100),
('141101029', 3, 78),
('161101066', 1, 72),
('161101073', 2, 87),
('111111111', 1, 100),
('141101029', 2, 78),
('161101066', 3, 72),
('161101073', 4, 87),
('111111111', 4, 100),
('141101029', 1, 78),
('161101066', 4, 72),
('161101073', 1, 87);
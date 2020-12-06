CREATE TABLE sinavlar (
    Sinav_ID INT NOT NULL AUTO_INCREMENT,
    Baslangic VARCHAR(5) NOT NULL,
    Bitis VARCHAR(5) NOT NULL,
    Sinav_Tarihi DATE NOT NULL,
    Agirligi INT,
    Toplam_Sure INT,
    Soru_Sayisi INT,
    Soru_Dagilimi VARCHAR(10),
    PRIMARY KEY (Sinav_ID)
) ENGINE=INNODB;

CREATE TABLE sorular(
    Soru_ID INT NOT NULL AUTO_INCREMENT,
    Turu VARCHAR(15),
    Konusu VARCHAR(50),
    Sorusu VARCHAR (1000),
    Cevap_Suresi INT,
    Sirasi INT,
    Zorluk_Derecesi VARCHAR(10),
    PRIMARY KEY (Soru_ID)	
) ENGINE=INNODB;

CREATE TABLE cevaplar(
    Cevap_ID INT NOT NULL AUTO_INCREMENT,
    Onaylama_Suresi INT,
    Ilk_Etkilisim_Suresi INT,
    Cevaplama_Suresi INT,
    Cevap_Turu VARCHAR(20),
    PRIMARY KEY (Cevap_ID)
) ENGINE=INNODB;

CREATE TABLE bosluk_doldurma(
    Cevap_ID INT NOT NULL,
    Cevap VARCHAR(10000),
    FOREIGN KEY (Cevap_ID)
        REFERENCES cevaplar(Cevap_ID)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE sesli(
    Cevap_ID INT,
    Cevap_Dosyasi VARCHAR(10000),
    FOREIGN KEY (Cevap_ID)
        REFERENCES cevaplar(Cevap_ID)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE metin(
    Cevap_ID INT,
    Basilan_Tus_sayisi INT,
    Karakter_sayisi INT,
    FOREIGN KEY (Cevap_ID)
        REFERENCES cevaplar(Cevap_ID)
        ON DELETE CASCADE
) ENGINE=INNODB;

CREATE TABLE secmeli(
    Cevap_ID INT,
    Tercihi VARCHAR(10000),
    FOREIGN KEY (Cevap_ID)
        REFERENCES cevaplar(Cevap_ID)
        ON DELETE CASCADE
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
    Kodu VARCHAR (10),
    Sinav_ID INT NOT NULL AUTO_INCREMENT,
    Gecme_Notu VARCHAR(4),
    Ogrenci_Listesi VARCHAR(100000),
    PRIMARY KEY (Kodu),
    FOREIGN KEY (Sinav_ID)
        REFERENCES sinavlar(Sinav_ID)
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

INSERT INTO `ogrenciler` (`Ogrenci_ID`, `Ad`, `Soyad`, `Sifre`, `Not_Ortalamasi`, `Odev_Ortalamasi`, `Yoklama`) VALUES
('111111111', 'test', 'testoğlu', '789', '4.00', '100', '0'),
('141101029', 'Osman', 'Çalışkan', '123', '2.50', '89', '5'),
('161101066', 'Furkan', 'Dolaşık', '456', '2.50', '89', '3'),
('161101073', 'Can', 'Koçyiğitoğlu', '1234', '2.50', '89', '2');

INSERT INTO `ogretim_gorevlileri` (`Kodu`, `Ad`, `Soyad`) VALUES
('111101001', 'Oğuz', 'Ergin'),
('111101003', 'Mehmet', 'Tan'),
('111101007', 'Tansel', 'Ozyer');
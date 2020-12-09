# Bil372 Group Project

- Can KOÇYİĞİTOĞLU
- Furkan DOLAŞIK
- OSMAN ÇALIŞKAN

# Analysand

*MySQL Scripts are available at* [database.sql](./database.sql)

1) XAMPP Control Panel v3.2.4 kullandık.
   indirme linki ==> apachefriends.org/download.html

2) Framework olarak Codeigneter kullandık.

3) İlgili github repository'si bilgisayara (windows c kısmı önerimiz) klonlanır. Kurulum dosya isimi:
	BIL372_Proje
   Adlı klasör bilgisayaranıza yüklenmiş olacak

3) XAMPP ayarları:

	-XAMPP yüklendikten sonra control panel açılır. 
	-Apache servisinin olduğu satırda config tuşuna basılır.
	-"Apache(httdp.conf)" seçeneğine tıklanır.
	-Açılan dosyanın içeriğini, proje reposunda bulunan "httdp.conf"
	 adlı dosyanın içeriği ile değiştiriniz.
apache ve MySql satırlarında bulunan start tuşuna basınız.

4) veri tabanı tablolarının eklenmesi:

XAMPP panelinde ki MySql satırı içindeki Admin butonuna basınız.
Açılan internet sayfasında (PHPMyAdmin) "Yeni" yazan bölüme tıklayınız ve
veri tabanının ismini belirleyiniz ve oluşturunuz. Başka bir şey yapmanıza gerek yok.
Sonra ismini belirleyerek oluşturduğunuz veritabanının sql bölümünü açıp. github
repository'sinde bulunan "database.sql" sayfasını bu kısıma bulunan ekleyiniz.
Veritabanı tablolarınız veri olmadan oluşmuş olacaktır.

5) Veritabanı ve Web servisi bağlamak:

	Bil372_Proje/application/config/database.php

dosyasını açıp 

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'DATABASE ADINIZI GİRİNİZ', // Bu kısıma oluşturduğunuz database adını giriniz
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

6)Local'den proje websitesini açmak:

Google açıp arama bölümüne "http://localhost/login" adresini giriniz.
Sign Up işlemi yaptıktan sonra login olup işlemlerinizi gerçekleştirebilirsiniz.

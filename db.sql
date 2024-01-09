-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2024 pada 11.37
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id_informasi` int(11) NOT NULL,
  `nama_informasi` varchar(255) NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `foto` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_informasi`
--

INSERT INTO `tb_informasi` (`id_informasi`, `nama_informasi`, `tanggal_upload`, `foto`, `deskripsi`) VALUES
(2, 'Karnaval Ceria 2023', '2023-11-13 18:35:00', 'images.jpeg', 'Dalam rangka Peringatan HUT Kemerdekaan Republik Indonesia ke – 78, Pemerintah Kabupaten Kulon Progo menyelanggarakan Karnaval Pesona Mahardika pada tanggal 19 Agustus 2023 yang diikuti oleh 35 tim dengan rute dari Taman Budaya Kulon Progo dan finish di Pasar WatesGuna mendukung kegiatan tersebut dan menjaga keindahan kota Wates, UPT Persampahan Air Limbah dan Pertamanan DPUPKP Kulon Progo mengerahkan tim lapangan untuk membersihkan timbulan sampah sepanjang rute karnaval. Pembersihan dilakukan dibelakang peserta terakhir, masyarakat menyebut sebagai “Kontingen Terakhir”.'),
(3, 'Acara Akbar', '2023-11-13 16:51:06', 'images2.jpeg', 'Dalam rangka Peringatan HUT Kemerdekaan Republik Indonesia ke – 78, Pemerintah Kabupaten Kulon Progo menyelanggarakan Karnaval Pesona Mahardika pada tanggal 19 Agustus 2023 yang diikuti oleh 35 tim dengan rute dari Taman Budaya Kulon Progo dan finish di Pasar Wates\r\n\r\nGuna mendukung kegiatan tersebut dan menjaga keindahan kota Wates, UPT Persampahan Air Limbah dan Pertamanan DPUPKP Kulon Progo mengerahkan tim lapangan untuk membersihkan timbulan sampah sepanjang rute karnaval. Pembersihan dilakukan dibelakang peserta terakhir, masyarakat menyebut sebagai “Kontingen Terakhir”.'),
(4, 'Acara Bazar Ramadhan', '2023-11-13 16:52:10', 'images3.jpeg', 'Dalam rangka Peringatan HUT Kemerdekaan Republik Indonesia ke – 78, Pemerintah Kabupaten Kulon Progo menyelanggarakan Karnaval Pesona Mahardika pada tanggal 19 Agustus 2023 yang diikuti oleh 35 tim dengan rute dari Taman Budaya Kulon Progo dan finish di Pasar Wates\r\n\r\nGuna mendukung kegiatan tersebut dan menjaga keindahan kota Wates, UPT Persampahan Air Limbah dan Pertamanan DPUPKP Kulon Progo mengerahkan tim lapangan untuk membersihkan timbulan sampah sepanjang rute karnaval. Pembersihan dilakukan dibelakang peserta terakhir, masyarakat menyebut sebagai “Kontingen Terakhir”.'),
(5, 'Lomba 17 Agustus ', '2023-11-13 16:52:32', 'images4.jpeg', 'Dalam rangka Peringatan HUT Kemerdekaan Republik Indonesia ke – 78, Pemerintah Kabupaten Kulon Progo menyelanggarakan Karnaval Pesona Mahardika pada tanggal 19 Agustus 2023 yang diikuti oleh 35 tim dengan rute dari Taman Budaya Kulon Progo dan finish di Pasar Wates\r\n\r\nGuna mendukung kegiatan tersebut dan menjaga keindahan kota Wates, UPT Persampahan Air Limbah dan Pertamanan DPUPKP Kulon Progo mengerahkan tim lapangan untuk membersihkan timbulan sampah sepanjang rute karnaval. Pembersihan dilakukan dibelakang peserta terakhir, masyarakat menyebut sebagai “Kontingen Terakhir”.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `id_wisata` int(100) NOT NULL,
  `wisata` varchar(255) NOT NULL,
  `tanggal_kunjungan` varchar(255) DEFAULT NULL,
  `jumlah_tiket` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `total_pembayaran` varchar(255) NOT NULL,
  `bayar` varchar(255) DEFAULT NULL,
  `kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id`, `id_wisata`, `wisata`, `tanggal_kunjungan`, `jumlah_tiket`, `harga`, `total_pembayaran`, `bayar`, `kembali`) VALUES
(4, 1, 0, 'Dapur Semar', '2023-11-13T21:09', '2', '15000', '30000', '50000', '20000.00'),
(6, 1, 0, 'Air Terjun Kedung Pedut', '2023-11-13T21:26', '0', '20000', '40000', '54998', '14998.00'),
(12, 3, 148, 'Gua Maria Sendangsono', '2023-11-13T16:24', '2', '25000', '50000.00', '50000', '0.00'),
(13, 3, 142, 'Air Terjun Kedung Pedut', '2023-11-13T17:04', '2', '15000', '30000.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(100) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `orang` varchar(255) DEFAULT NULL,
  `terakhir_login` datetime DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `tanggal_ditambahkan` datetime NOT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama_lengkap`, `email`, `username`, `password`, `orang`, `terakhir_login`, `type`, `tanggal_ditambahkan`, `tanggal_update`) VALUES
(3, 'Tejo Supratno', 'tejo@gmail.co.id', 'tejo', '123', 'pengguna', NULL, '1', '2023-11-13 16:46:00', NULL),
(4, 'Abdul Mustofa', 'abdul@gmail.com', 'abdul', '123', 'pengguna', NULL, '0', '2023-11-14 19:23:00', NULL),
(5, 'indri', 'indri@gmail', 'indri', 'indri123', NULL, NULL, '', '0000-00-00 00:00:00', NULL),
(6, 'dian', 'dian@gmail.com', 'dian', 'dian123', NULL, NULL, '', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_login` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_login`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', '$2y$10$OKXP7BH.uH.XfTvKaY45R./rIwYQH292V9pQm5EYEo5'),
(3, 'admin', '$2y$10$FDDZ8pNIOyccby8kB774G.d43zzEROJthlA.NUW9YMO'),
(4, 'admin2', '$2y$10$v5cgqURBU2v8fjrfQw98h.SU0lwJlw/y/UAheBOsYJ2'),
(5, 'admin2', '$2y$10$/qGEUl8hZmOcskTaNiKZouc8h5s6110R5S/A9Pzy2Qu'),
(6, 'admin2', '$2y$10$Ah1TYwhHjbAjDoaj8VDgT.ukJEjAfA9PRvNmBgHbQyz'),
(7, 'admin', '$2y$10$KFUH/AMkBCc2VDoriV4MUuEaO/MefsBlVecd0S03.FN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori` varchar(30) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `nama`, `alamat`, `latitude`, `longitude`, `gambar`, `deskripsi`, `kategori`, `harga`) VALUES
(135, 'Pantai Glagah', '33R5+6P, Sidorejo, Glagah, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta', -7.914569663126623, 110.07217900583, '.jpg', 'indah, ada pemecah ombak', 'alam', '15000'),
(136, 'Ziarah Makam Kyai Landoh', 'Jl. Lendah Kulon, Bangeran, Jatirejo, Kec. Lendah, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55663', -7.936167218372596, 110.2294808813223, '.jpg', 'Pada hari-hari tertentu tempat ini banyak dikunjungi oleh warga masyarakat, baik oleh warga sekitar maupun luar kota yang mengenal dan mengagumi sosok Kyai Landoh atau Syech Jangkung. Beliau adalah tokoh munculnya nama Lendah, sangat dihormati dan dikagumi warga masyarakat sekitar karena kedermawanannya dan suka menolong. Syech Jangkung adalah penyebar agama Islam di daerah tersebut. Lokasi tempat ini di Desa Jatirejo Kecamatan Lendah.', 'religi', '10000'),
(137, 'Museum Bale Agung', 'Terbah, Wates, Kec. Wates, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55651', -7.858073098924191, 110.1592190794701, '.jpg', 'Bale Agung berdiri tahun 1918 saat masa kolonial. Ada prasasti candra sengkolo beraksara Jawa yang berbunyi ” Bale Agung Ing Ngesti Prayogi Samadyaning Siniwi” artinya 1918. Ditetapkan sebagain bangunan cagar budaya, desain arsitektur bangunan Museum Bale Agung bergaya kolonial. Museum ini menampung dan menyimpan benda-benda warisan budaya seperti Patung Ganesa, Lesung Batu, Batu Lumpang, Yoni, Mata Uang Kuno dan lainnya. Letak Museum Bale Agung di Desa Terbah, Kecamatan Wates, Kulonprogo.', 'sejarah', '20000'),
(138, 'Makam Nyi Ageng Serang', 'Beku, Banjarharjo, Kec. Kalibawang, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55672', -7.686563305856021, 110.24085783899, '.jpg', 'Makam Nyi Ageng Serang dibangun untuk menghormati perjuangan salah satu pahlawan nasional yakni Nyi Ageng Serang dalam melawan penjajah. Makam ini terletak di atas bukit di desa Banjarharjo, Kecamatan Kalibawang, Kulon Progo. Kini, makam ini dijadikan sebagai salah satu destinasi wisata religi yang banyak dikunjungi para wisatawan. Para wisatawan biasanya datang untuk berziarah saat hari Kemerdekaan.', 'religi', '10000'),
(139, 'Goa Kiskendo', 'Jl. Raya Kaligesing, Sokomoyo, Jatimulyo, Kec. Girimulyo, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55674', -7.746913335825528, 110.1310254236475, '.jpg', 'Goa beserta kisah-kisah yang menyertainya menjadi daya tarik terbesar obyek wisata ini. Goa konon sudah ditemukan 2 abad silam. Para leluhur terdahulu memanfaatkan untuk mencari ketenangan batin dan pencerahan lewat bertapa.  Pemerintah Daerah DI Yogyakarta melihat potensi wisata goa ini lantas mengelolanya sejak1979. Kemudian, Dinas Pariwisata Kulonprogo mengelolanya sejak 2005.', 'sejarah', '25000'),
(140, 'Pasar Kembang Nanggulan (Pasar Kenteng)', 'Jl. Raya Ps. Kenteng, Kenteng, Kembang, Kec. Nanggulan, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55671', -7.753153000162311, 110.20729665063246, '.jpg', 'Pasar ini merupakan pasar tradisional yang berbentuk los dengan atap tipe kampung. Pasar Bendo ini mempunyai 12 (dua belas) lajur bangunan los. Ukuran masing-masing bangunan los adalah 16,55 m x 3,25 m. Lantai los pasar ada yang masih asli, yaitu menggunakan plesteran dan ada yang sudah ditinggikan dan dikeramik.  Bagian atap menggunakan konstruksi besi sistem knock down dengan mur-baut. Perkuatan sambungan menggunakan besi sebagai plat buhul. Rangka atap berupa rangkaian kuda-kuda dan gording / blandar besi berprofil seperti huruf “U”, usuk dan reng berprofil seperti huruf “L”, bahan atap los menggunakan bahan genting vlaam/keripik. Di bawah genting tampak depan dan belakang terdapat tutup keong dengan bahan seng gelombang yang difinishing cat. Di salah satu tutup keong sisi depan bagian luar terdapat plakat bertuliskan “BRAAT SOERABAIA, DJOGJA, TEGAL, SOEKABOEMI” dan di salah satu tutup keong bagian dalam sisi luar terdapat plakat bertuliskan “N.V. CONSTRUCTIE ATELIER DER VORSTENLANDEN DJOKJAKARTA”,  Bubungan atap berupa genting dengan plesteran.', 'belanja', '10000'),
(141, 'Wisata Alam Kalibiru', 'Jalan Waduk Sermo, Kalibiru, Hargowilis, Kec. Kokap, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55653', -7.807124269393311, 110.12921455063336, '.jpg', 'Tepat terletak di Hargowilis, Kokap, kabupaten Kulon Progo dengan jarak kurang lebih 40 km dari pusat kota, Kalibiru merupakan harmonisasi antara hijaunya hutan dengan hamparan berbukit yang sangat luas dengan pemandangan yang indah. Awal mula terbentuknya tempat ini adalah sebuah hutan negara yang diolah menjadi tempat wisata.  Sebagai tempat wisata yang berada pada dataran tinggi, Kalibiru mengandalkan pemandangan alam sebagai daya tarik utama bagi wisatawan. Disamping itu, Kalibiru juga memfasilitasi wisatawan untuk melihat pemandangan dengan menara pandang dan gardu pandang yang berbentuk rumah pohon.', 'alam', '15000'),
(142, 'Air Terjun Kedung Pedut', 'Jl. Kutogiri Gunung Kelir, Kembang, Jatimulyo, Kec. Girimulyo, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55674', -7.769711103510289, 110.12115652549889, '.jpg', 'Air terjun ini memiliki sebuah kolam alami yang memiliki campuran warna biru dan putih sehingga tampak seperti kabut. Sesuai namanya, kedung dalam bahasa jawa artinya kolam sedangkan pedut artinya kabut. Tempat wisata ini merupakan salah satu tempat wisata favorit di Kulon Progo. Di sini, kamu bisa seru-seruan main air dan berendam di kolam sepuasnya. Area sekitar air terjun merupakan hutan hujan tropis yang tampak sangat menyejukkan sekali.', 'alam', '15000'),
(143, 'Kebun Teh Nglinggo', 'Nglinggo Barat, Pagerharjo, Kec. Samigaluh, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55673', -7.646540917474842, 110.14147341265198, '.jpg', 'Letaknya yang strategis di atas puncak perbukitan menjadi daya tarik bagi wisatawan domestik. Selain pemandangan yang indah, di sini kamu juga dapat mempelajari cara memetik daun teh yang baik dan benar. Fasilitas Kebun Teh Nglinggo juga cukup lengkap, diantaranya; Mushola, toilet, area parkir, warung makan dan minum, penginapan, tempat istirahat. Lokasi wisata Kebun Teh ini juga sangat mudah dijangkau karena akses jalan yang cukup memadai, meskipun jarak cukup jauh dari pusat Kota Yogyakarta.', 'alam', '10000'),
(144, 'Taman Budaya Kulon Progo', 'Jl. Kawijo No.5, Pengasih, Kec. Wates, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55652', -7.8457938265928435, 110.16795637946987, '.jpg', 'dapun Gedung Taman Budaya Kulon Progo ini dilengkapi dengan bangunan joglo pendopo, mushola, panggung tertutup, gedung teater terbuka, rumah genset, gapura dan pagar keliling, dilengkapi sound system dan AC, serta berbagai fasilitas penunjang lainnya. Untuk Tahun 2018 rangkaian pembangunan Taman Budaya Kulon Progo akan menyelesaikan pembangunan teater terbuka.', 'budaya', '35000'),
(145, 'Astana Girigondo', 'Balong, Kaligintung, Kec. Temon, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55654', -7.86998279761295, 110.0900336543364, '.jpg', 'Makam Girigondo adalah makam Paku Alam V sampai dengan Paku Alam VIII. Makam ini terletak sekitar 10 km dari pusat Kota Wates, tepatnya berada di Desa Kaligintung, Kecamatan Temon. Makam Girigondo berdiri di atas sebuah bukit dan menghadap ke selatan, struktur bangunannya terdiri dari 6 tingkat. Ada 258 buah anak tangga untuk mencapai makam tersebut. Pada tingkat pertama merupakan tempat dimakamkannya kerabat jauh Paku Alam. Di tingkat ke-dua tidak terdapat makam, sedangkan pada tingkat ke-tiga dan ke-empat digunakan juga sebagai makam kerabat. Pada tingkatan selanjutnya yaitu tingkat 5 digunakan sebagai tempat makam kerabat dekat, sedangkan pada tingkat ke enam atau bagian paling atas adalah makam Paku Alam V-VIII.', 'budaya', '40000'),
(146, 'Dapur Semar', 'RSUD, Jl. Tentara Pelajar Jl. Wates, Area Sawah, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55651', -7.8139310076361745, 110.14668709625279, '.jpg', 'GEBLEK PARI berlokasi di  Pronosutan, Kembang, Kec. Nanggulan, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta. Buka dari pukul 07.00-20.00 WIB. Tempat makan keluarga di Kulon Progo yang pertama ini menawarkan fasilitas makan terbuka. Ada menu makan seperti Nasi Putih dan Sayur, Telur, Ikan Pindang, Aneka Sate-satean, dan Lele dengan harga mulai dari Rp 3.000-14.000.  Artikel ini telah tayang di Kompas.com dengan judul \"5 Tempat Makan di Kulon Progo Yogyakarta, Wisata Kuliner Populer \", Klik untuk baca: https://www.kompas.com/food/read/2023/06/11/121700875/5-tempat-makan-di-kulon-progo-yogyakarta-wisata-kuliner-populer-.   Kompascom+ baca berita tanpa iklan: https://kmp.im/plus6 Download aplikasi: https://kmp.im/app6', 'kuliner', '35000'),
(147, 'Tumpeng Menoreh dan Tumpeng Ayu', 'Jalan Nglinggo, Nglinggo Barat, Pagerharjo, Kec. Salaman, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta', -7.6449620741837645, 110.14553196597406, '.jpg', 'Selain karena panoramanya yang apik, tempat ini juga terkenal dengan kulinernya yang lezat. Anda bisa bebas memilih menu yang tersedia secara prasmanan yang semuanya buatan warga, misalnya mangut lele dan kikil.  Objek wisata yang buka 24 jam ini juga menyediakan kopi serta minuman hangat lain untuk menemani suasana malam yang dingin. Anda juga bisa menunggu sunrise di Tumpeng Ayu yang masih ada di satu lokasi.', 'kuliner', '35000'),
(148, 'Gua Maria Sendangsono', 'Semagung, Samagang, Banjaroyo, Kec. Kalibawang, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55672', -7.667770068535577, 110.22553372364622, '.jpg', 'Gua Maria Sendangsono adalah tempat ziarah Goa Maria yang terletak di Desa Banjaroyo, Kecamatan Kalibawang, Kabupaten Kulon Progo, DI Yogyakarta. Gua Maria Sendangsono dikelola oleh Paroki St. Maria Lourdes di Promasan, barat laut Yogyakarta.', 'sejarah', '25000'),
(149, 'Pusat Oleh-oleh Prasojo', 'Jl. KRT Kertodiningrat, Karang Tengah Kidul, Margosari, Kec. Pengasih, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55652', -7.859459743319654, 110.1743488083059, '.jpg', 'Home  Travel  Destination 7 Tempat Belanja Oleh-Oleh Di Kulon Progo, Dari Cokelat Hingga Wingko11 Sep 22 | 08:11 7 Tempat Belanja Oleh-oleh di Kulon Progo, dari Cokelat hingga Wingko Didominasi produk UMKM setempat, keren kan! 7 Tempat Belanja Oleh-oleh di Kulon Progo, dari Cokelat hingga WingkoCokelat Makaryo (instagram.com/cokelatmakaryo) Natasha Wiyanti	 Verified Writer Natasha Wiyanti Verified Writer  Share to Facebook  Share to Twitter	 Kulon Progo merupakan salah satu kabupaten di Provinsi Yogyakarta yang memiliki banyak UMKM di bidang kuliner. Termasuk home industry pembuatan oleh-oleh seperti geblek, kopi menoreh hingga wingko dan bakpia juga terdapat di kabupaten ini. Tak heran bila sangat mudah menemukan tempat belanja oleh-oleh saat berada di Kulon Progo.  Selain itu terdapat aneka olahan pisang serta cokelat kemasan lokal yang cocok jadi buah tangan untuk keluarga di rumah. Dimana ya belinya?   1. JnC Pusat Oleh-oleh Jogja 7 Tempat Belanja Oleh-oleh di Kulon Progo, dari Cokelat hingga WingkoJ&C Kulonprogo (facebook.com/j&cpusatoleholehjogja) Saat mencari oleh oleh di Kulon Progo, coba mampir ke J&C yang berlokasi di Jalan Tanggalan, Palihan, Temon, Kulon Progo. Tempatnya cukup strategis karena berada tak jauh dari Bandara Yogyakarta International Airport (YIA).  Di tempat ini banyak oleh-oleh khas Daerah Istimewa Yogyakarta (DIY) seperti aneka bakpia, wingko, yangko, dodol dan masih banyak lagi. Tempatnya bersih dan tersedia bangku kursi untuk beristirahat dan memesan kopi.   2. Toko Oleh-oleh Wingko Susilowati 7 Tempat Belanja Oleh-oleh di Kulon Progo, dari Cokelat hingga WingkoKios Wingko Susilowati (instagram.com/bolenku_jogja) Selain di daerah Temon, ada pusat oleh-oleh lengkap yang sering dikunjungi wisatawan yaitu Pusat Oleh-oleh Wingko Susilowati. Alamatnya ada di Jalan Kolonel Sugiono nomor 41 Durungan, Wates, Kulon Progo. Toko buka setiap hari mulai jam 08.00 hingga 20.30 WIB.  Produk Wingko Susilowati awalnya dijual dengan cara berkeliling, kini setelah dikenal mendirikan toko. Selain wingko, oleh-oleh yang berada di toko ini yaitu bakpia, yangko dan kue kacang.   Baca Juga: Pesona Gua Kiskendo Kulon Progo: Lokasi, Tiket dan Tips Berkunjung  3. Pusat Oleh-oleh Prasojo 7 Tempat Belanja Oleh-oleh di Kulon Progo, dari Cokelat hingga WingkoBakpia wingko Prasojo (facebook.com/wingkobakpiaprasojo) Di Kulon Progo juga terdapat produksi bakpia dan wingko lain yaitu bernama Prasojo. Jajanan tradisional ini merupakan produk UMKM Kulon Progo yang dijual di kios oleh-oleh sendiri. Alamatnya di Jalan KRT Kertodiningrat, Karang Tengah Kidul, Margosari, Pengasih,  Kulon Progo. Selain dijual sendiri, produk makanan ini juga dipasarkan di beberapa toko oleh-oleh yang berada di sekitar Kulon Progo.  ', 'belanja', '10000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

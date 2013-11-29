-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2013 pada 05.49
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `sashacode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE IF NOT EXISTS `cabang` (
  `kode_cabang` varchar(255) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `ym_id` varchar(255) NOT NULL,
  PRIMARY KEY (`kode_cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`kode_cabang`, `nama_cabang`, `alamat`, `telepon`, `ym_id`) VALUES
('B01', 'Cililitan', 'Jl. Dewi Sartika Kav. 2 & 3, Cililitan, ', '. 8090474, 8015349', ''),
('B02', 'Rawamangun', 'Jl. Sunan Sedayu 12, Rawamangun, ', '. 4753601, 4718795', ''),
('B04', 'Kemayoran', 'Jl. Kemayoran Ketapang No. 8, ', '. 4209118', ''),
('B05', 'Bekasi I', 'JI. I r. H.Juanda 133 ', '. 8802649,8808264', ''),
('B07', 'Depok Timur', 'Jl. Raya Bahagia 3-4, Depok II Timur, ', '. 7703426', ''),
('B08', 'Pondok Gede', 'JI. Raya Jati Makmur No.1, Pondok Gede, ', '. 8461037', ''),
('B09', 'Pondok Labu', 'Jl. Raya Margasatwa 58-B, Pondok Labu, ', '. 7507888', ''),
('B11', 'Tangerang', 'Jl. Beringin Raya 16, Perum Karawaci, ', '. 5511757', ''),
('B13', 'Ciledug', 'Jl HOS. Cokroaminoto No.61, (Prmpt Pojok) Ciledug ', '. 73454366', ''),
('B15', 'Bandung', 'JI. Kerta Bumi 1 dan 2, (samping Bank BJB) ', '. (0267) 8452345', ''),
('B16', 'Depok I', 'Jl. Nusantara No. 80 Depok 1, ', '. 7776869', ''),
('B17', 'Karawang', 'JI. Kerta Bumi 1 dan 2, (samping Bank BJB) ', '. (0267) 8452345', ''),
('B19', 'Klender', 'Jl. Raya Perumnas (Delima) 5 FG, Malaka Klender ', '. 8611318', ''),
('B20', 'Ciracas', 'Jl. Raya Bogor Km. 26 No. 5, Ciracas ', '. 8711146', ''),
('B22', 'Semarang I', 'JI. Jati Raya Blok K/4 Perum Banyumanik, ', '. (024) 7475881', ''),
('B23', 'Bekasi 3', 'JI. Dasa Darma No. 8, Bumi Bekasi Baru Rawalumbu, ', '. 98234658', ''),
('B24', 'Bogor', 'Jl. Pandawa Raya No. 11 Bogor Telp. (0251)8356832', '', ''),
('B25', 'Semarang II', 'Jl. Tlogosari Raya I/47,.Perum Tlogosari,', '. (024) 6719682', ''),
('B27', 'Pondok Cabe', 'Jl.Terbang Layang 10A Pondok Cabe ', '. 7403731', ''),
('B28', 'Cimanggis', 'Jl. Raya Bogor Km. 30/54, Cimanggis ', '. 87710043', ''),
('B32', 'Koja', 'JI. Menteng 76, Lagoa Koja  Tg Priok ', '. 4374352', ''),
('B34', 'Bumi Serpong Damai', 'Ruko Golden Viena I Blok BA 18 sektor 12, BSD, Telp 75882384', '', ''),
('B36', 'Jati Asih', 'Jl. Swatantra No. 2, Jatiasih (Dpn Kec.) ', '. 82428009', ''),
('B37', 'Sukatani', 'Jl. Pekapuran Raya No.11, Sukatani Tapos-Depok, ', '87741284', ''),
('B38', 'Kayu Manis', 'Jl. Kebon Kelapa Raya No: 3. Kayu Manis, Matraman, ', '85901650', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_agama`
--

CREATE TABLE IF NOT EXISTS `m_agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `agama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `m_agama`
--

INSERT INTO `m_agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Khatolik'),
(3, 'Protestan'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_gerakan_pejalan`
--

CREATE TABLE IF NOT EXISTS `m_gerakan_pejalan` (
  `id_gerakan_pejalan` int(11) NOT NULL AUTO_INCREMENT,
  `gerakan_pejalan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_gerakan_pejalan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `m_gerakan_pejalan`
--

INSERT INTO `m_gerakan_pejalan` (`id_gerakan_pejalan`, `gerakan_pejalan`) VALUES
(1, 'Berjalan'),
(2, 'Menyebrang'),
(3, 'Bermain'),
(4, 'Berdiri'),
(5, 'Duduk'),
(6, 'Jualan Kaki Lima'),
(7, 'Lainnya'),
(8, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_gol_laka`
--

CREATE TABLE IF NOT EXISTS `m_gol_laka` (
  `id_gol_laka` int(11) NOT NULL AUTO_INCREMENT,
  `gol_laka` varchar(30) NOT NULL,
  PRIMARY KEY (`id_gol_laka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `m_gol_laka`
--

INSERT INTO `m_gol_laka` (`id_gol_laka`, `gol_laka`) VALUES
(1, 'A'),
(2, 'A.UMUM'),
(3, 'B.I'),
(4, 'B.I UMUM'),
(5, 'B.II'),
(6, 'B.II UMUM'),
(7, 'C'),
(8, 'D'),
(9, 'TANPA SIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_helm`
--

CREATE TABLE IF NOT EXISTS `m_helm` (
  `id_helm` int(11) NOT NULL AUTO_INCREMENT,
  `helm` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_helm`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `m_helm`
--

INSERT INTO `m_helm` (`id_helm`, `helm`) VALUES
(1, 'Ya (Standard)'),
(2, 'Ya (Tidak Standard)'),
(3, 'Tidak Pakai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_kecelakaan`
--

CREATE TABLE IF NOT EXISTS `m_jenis_kecelakaan` (
  `id_jenis_laka` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_laka` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_laka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `m_jenis_kecelakaan`
--

INSERT INTO `m_jenis_kecelakaan` (`id_jenis_laka`, `jenis_laka`) VALUES
(1, 'TUNGGAL'),
(2, 'DEPAN-DEPAN'),
(3, 'DEPAN BELAKANG'),
(4, 'DEPAN SAMPING'),
(5, 'SAMPING-SAMPING'),
(6, 'BENTURAN'),
(7, 'TABRAK MANUSIA'),
(8, 'TABRAK HEWAN'),
(9, 'LAIN-LAIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kawasan_laka`
--

CREATE TABLE IF NOT EXISTS `m_kawasan_laka` (
  `id_kawasan_laka` int(11) NOT NULL AUTO_INCREMENT,
  `kawasan_laka` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kawasan_laka`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `m_kawasan_laka`
--

INSERT INTO `m_kawasan_laka` (`id_kawasan_laka`, `kawasan_laka`) VALUES
(1, 'K_Pemukiman'),
(2, 'K_Pertokoan/Mall'),
(3, 'K_Wisata'),
(4, 'T_Hiburan'),
(5, 'TOL'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_keadaan_lantas`
--

CREATE TABLE IF NOT EXISTS `m_keadaan_lantas` (
  `id_keadaan` int(11) NOT NULL AUTO_INCREMENT,
  `keadaan_lantas` varchar(50) NOT NULL,
  PRIMARY KEY (`id_keadaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `m_keadaan_lantas`
--

INSERT INTO `m_keadaan_lantas` (`id_keadaan`, `keadaan_lantas`) VALUES
(1, 'Sepi'),
(2, 'Ramai'),
(3, 'Macet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kondisi_jalan`
--

CREATE TABLE IF NOT EXISTS `m_kondisi_jalan` (
  `id_kondisi_jalan` int(11) NOT NULL AUTO_INCREMENT,
  `kondisi_jalan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kondisi_jalan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `m_kondisi_jalan`
--

INSERT INTO `m_kondisi_jalan` (`id_kondisi_jalan`, `kondisi_jalan`) VALUES
(1, 'Rusak'),
(2, 'Lubang'),
(3, 'Pandangan Terhalang'),
(4, 'Licin'),
(5, 'Tidak Berlampu'),
(6, 'Tidak Ada Marka'),
(7, 'Tidak Ada Rambu'),
(8, 'Marka Rusak'),
(9, 'Rambu Rusak'),
(10, 'Tikungan Tajam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_korban`
--

CREATE TABLE IF NOT EXISTS `m_korban` (
  `id_korban` int(11) NOT NULL AUTO_INCREMENT,
  `korban` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_korban`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `m_korban`
--

INSERT INTO `m_korban` (`id_korban`, `korban`) VALUES
(1, 'Pengemudi'),
(2, 'Penumpang'),
(3, 'Pejalan Kaki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_laka_fungsi_jalan`
--

CREATE TABLE IF NOT EXISTS `m_laka_fungsi_jalan` (
  `id_laka_fungsi_jalan` int(11) NOT NULL AUTO_INCREMENT,
  `laka_fungsi_jalan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_laka_fungsi_jalan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `m_laka_fungsi_jalan`
--

INSERT INTO `m_laka_fungsi_jalan` (`id_laka_fungsi_jalan`, `laka_fungsi_jalan`) VALUES
(1, 'TOL'),
(2, 'ARTERI'),
(3, 'KOLEKTOR'),
(4, 'LAKA'),
(5, 'LINGKUNGAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_lokasi_laka`
--

CREATE TABLE IF NOT EXISTS `m_lokasi_laka` (
  `id_lokasi_laka` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi_laka` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi_laka`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `m_lokasi_laka`
--

INSERT INTO `m_lokasi_laka` (`id_lokasi_laka`, `lokasi_laka`) VALUES
(1, 'Nasional'),
(2, 'Provinsi'),
(3, 'Kab/Kota'),
(4, 'Tol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_objek`
--

CREATE TABLE IF NOT EXISTS `m_objek` (
  `id_objek` int(11) NOT NULL AUTO_INCREMENT,
  `objek` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_objek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `m_objek`
--

INSERT INTO `m_objek` (`id_objek`, `objek`) VALUES
(1, 'Korban'),
(2, 'Pelaku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `m_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `m_pekerjaan`
--

INSERT INTO `m_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'PNS'),
(2, 'TNI'),
(3, 'POLRI'),
(4, 'Karyawan/Swasta'),
(5, 'Pelajar'),
(6, 'Mahasiswa'),
(7, 'Pengemudi'),
(8, 'Pedagang'),
(9, 'Petani/Buruh'),
(10, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pendidikan`
--

CREATE TABLE IF NOT EXISTS `m_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `m_pendidikan`
--

INSERT INTO `m_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'Perguruan Tinggi'),
(5, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pengaman`
--

CREATE TABLE IF NOT EXISTS `m_pengaman` (
  `id_pengaman` int(11) NOT NULL AUTO_INCREMENT,
  `pengaman` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pengaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `m_pengaman`
--

INSERT INTO `m_pengaman` (`id_pengaman`, `pengaman`) VALUES
(1, 'Tanpa'),
(2, 'Tidak Pakai'),
(3, 'Helm'),
(4, 'Pejalan Kaki'),
(5, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_penyebab_laka`
--

CREATE TABLE IF NOT EXISTS `m_penyebab_laka` (
  `id_penyebab_laka` int(11) NOT NULL AUTO_INCREMENT,
  `penyebab_laka` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_penyebab_laka`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `m_penyebab_laka`
--

INSERT INTO `m_penyebab_laka` (`id_penyebab_laka`, `penyebab_laka`) VALUES
(1, 'Rem Tidak Berfungsi'),
(2, 'Kemudi Kurang Baik'),
(3, 'Ban Kurang Baik'),
(4, 'AS Muka Pecah'),
(5, 'AS Belakang Pecah'),
(6, 'Lampu Depan Tidak Berfungsi'),
(7, 'Lampu Belakang Tidak Berfungsi'),
(8, 'Penerangan Kurang'),
(9, 'Lampu Kendaraan Lain'),
(10, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_posisi_korban`
--

CREATE TABLE IF NOT EXISTS `m_posisi_korban` (
  `id_posisi_korban` int(11) NOT NULL AUTO_INCREMENT,
  `posisi_korban` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_posisi_korban`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `m_posisi_korban`
--

INSERT INTO `m_posisi_korban` (`id_posisi_korban`, `posisi_korban`) VALUES
(1, 'Mobil-Duduk Didepan'),
(2, 'Mobil-Duduk Dibelakang'),
(3, 'Motor-Duduk Didepan'),
(4, 'Motor-Duduk Dibelakang'),
(5, 'Bus-Duduk Didalam'),
(6, 'Bus-Berdiri'),
(7, 'Mobil Barang-Duduk Didalam'),
(8, 'Mobil Barang-Duduk Dibak'),
(9, 'Mobil Barang-Berdidi Dibak'),
(10, 'Pejalan Kaki'),
(11, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_posisi_pejalan`
--

CREATE TABLE IF NOT EXISTS `m_posisi_pejalan` (
  `id_posisi_pejalan` int(11) NOT NULL AUTO_INCREMENT,
  `posisi_pejalan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_posisi_pejalan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `m_posisi_pejalan`
--

INSERT INTO `m_posisi_pejalan` (`id_posisi_pejalan`, `posisi_pejalan`) VALUES
(1, 'Bahu Jalan'),
(2, 'Badan Jalan'),
(3, 'Penyebrangan'),
(4, '<50 km Dari Zebra Cross'),
(5, 'Dimedian'),
(6, 'Lainya'),
(7, 'Tidak diketahui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_safety_belt`
--

CREATE TABLE IF NOT EXISTS `m_safety_belt` (
  `id_safety_belt` int(11) NOT NULL AUTO_INCREMENT,
  `safety_belt` char(20) DEFAULT NULL,
  PRIMARY KEY (`id_safety_belt`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `m_safety_belt`
--

INSERT INTO `m_safety_belt` (`id_safety_belt`, `safety_belt`) VALUES
(1, 'Ya'),
(2, 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tempat_luka`
--

CREATE TABLE IF NOT EXISTS `m_tempat_luka` (
  `id_tempat_luka` int(11) NOT NULL AUTO_INCREMENT,
  `tempat_luka` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tempat_luka`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `m_tempat_luka`
--

INSERT INTO `m_tempat_luka` (`id_tempat_luka`, `tempat_luka`) VALUES
(1, 'Tidak Luka'),
(2, 'Di Kepala'),
(3, 'Luka Wajah Sampai Leher'),
(4, 'Luka Dada Sampai Perut'),
(5, 'Luka Di Punggung'),
(6, 'Luka Di Paha dan Kaki'),
(7, 'Luka Di Tangan'),
(8, 'Luka Di Pinggul'),
(9, 'Luka Dibeberapa Tempat'),
(10, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tingkat_luka`
--

CREATE TABLE IF NOT EXISTS `m_tingkat_luka` (
  `id_luka` int(11) NOT NULL AUTO_INCREMENT,
  `tingkat_luka` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_luka`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `m_tingkat_luka`
--

INSERT INTO `m_tingkat_luka` (`id_luka`, `tingkat_luka`) VALUES
(1, 'LR'),
(2, 'LB'),
(3, 'MD'),
(4, 'Tidak Ada'),
(5, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_bentuk_laka`
--

CREATE TABLE IF NOT EXISTS `t_bentuk_laka` (
  `No_LP` varchar(255) NOT NULL,
  `Kd_Bentuk_Laka` int(11) NOT NULL,
  `Nama_Bentuk_Laka` varchar(255) DEFAULT NULL,
  `Golongan_Kecelakaan` varchar(50) DEFAULT NULL,
  `Keadaan_Lantas` varchar(50) DEFAULT NULL,
  `Kondisi_Jalan` varchar(50) DEFAULT NULL,
  `Kondisi_Permukaan_Jln` varchar(50) DEFAULT NULL,
  `Situasi_Jalan` varchar(50) DEFAULT NULL,
  `Perbaikan_Jalan` varchar(50) DEFAULT NULL,
  `Bentuk_Simpangan` varchar(50) DEFAULT NULL,
  `Arus_Lalulintas` varchar(50) DEFAULT NULL,
  `Batas_Kecepatan` varchar(50) DEFAULT NULL,
  `Lingkungan_Sekitar` varchar(50) DEFAULT NULL,
  `Fungsi_Jalan` varchar(20) DEFAULT NULL,
  `Berdasarkan_Jalur` varchar(20) DEFAULT NULL,
  `Lokasi_Laka` enum('Nasional','Provinsi','Kab/Kota','Desa','Tol') DEFAULT NULL,
  `Penyebab_Laka` varchar(20) DEFAULT NULL,
  `Laka_Fungsi_Jalan` varchar(255) DEFAULT NULL,
  `Kawasan_Laka` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Kd_Bentuk_Laka`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_bentuk_laka`
--

INSERT INTO `t_bentuk_laka` (`No_LP`, `Kd_Bentuk_Laka`, `Nama_Bentuk_Laka`, `Golongan_Kecelakaan`, `Keadaan_Lantas`, `Kondisi_Jalan`, `Kondisi_Permukaan_Jln`, `Situasi_Jalan`, `Perbaikan_Jalan`, `Bentuk_Simpangan`, `Arus_Lalulintas`, `Batas_Kecepatan`, `Lingkungan_Sekitar`, `Fungsi_Jalan`, `Berdasarkan_Jalur`, `Lokasi_Laka`, `Penyebab_Laka`, `Laka_Fungsi_Jalan`, `Kawasan_Laka`) VALUES
('LP/56/33-L/III/2013/RES.CLG', 1, 'Tabrakan', 'Sedang', 'Malam Hari', 'Lancar', 'Bagus', 'Lancar', 'Tidak Ada', 'Bagus', 'Lancar', '50', 'Ramai', 'Bagus', 'Ya', 'Kab/Kota', 'Ngebut', 'Bagus', 'Bagus'),
('LP/55/33-L/III/2013/RES.CLG', 2, 'TUNGGAL', 'A', 'Sepi', 'Rusak', NULL, 'a', 'Ya', 'Ya', 'Ramai', 'Dibawah 60Km/Jam', 'Sepi', 'Tol', 'a', 'Nasional', 'Rem Tidak Berfungsi', 'TOL', 'K_Pemukiman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis_kend`
--

CREATE TABLE IF NOT EXISTS `t_jenis_kend` (
  `No_LP` varchar(50) NOT NULL,
  `id_kend` int(11) NOT NULL AUTO_INCREMENT,
  `Jenis_Kend` enum('Sepeda Motor','Mobil') DEFAULT NULL,
  `No_Pol` varchar(10) DEFAULT NULL,
  `Tipe_Kend` varchar(20) DEFAULT NULL,
  `Gerakan_Kend` varchar(25) DEFAULT NULL,
  `Merk_Kend` varchar(25) DEFAULT NULL,
  `Tahun_Pembuatan` varchar(4) DEFAULT NULL,
  `Warna_Plat` enum('Umum (Kuning)','Negeri (Merah)','Swasta (Hitam)') DEFAULT NULL,
  `Jumlah_Penumpang` varchar(2) DEFAULT NULL,
  `Kecepatan` varchar(25) DEFAULT NULL,
  `Kerusakan_Kend` varchar(25) DEFAULT NULL,
  `Desk_Kerusakan` varchar(255) DEFAULT NULL,
  `STUJ` enum('Ada','Tidak Ada') DEFAULT NULL,
  `Kerusakan_Lain` varchar(255) DEFAULT NULL,
  `BBM` varchar(255) DEFAULT NULL,
  `Silinder_CC` varchar(255) DEFAULT NULL,
  `No_STNK` varchar(25) DEFAULT NULL,
  `An_STNK` varchar(255) DEFAULT NULL,
  `Alamat_STNK` varchar(255) DEFAULT NULL,
  `No_Rangka` varchar(255) DEFAULT NULL,
  `No_Mesin` varchar(255) DEFAULT NULL,
  `No_BPKB` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kend`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_jenis_kend`
--

INSERT INTO `t_jenis_kend` (`No_LP`, `id_kend`, `Jenis_Kend`, `No_Pol`, `Tipe_Kend`, `Gerakan_Kend`, `Merk_Kend`, `Tahun_Pembuatan`, `Warna_Plat`, `Jumlah_Penumpang`, `Kecepatan`, `Kerusakan_Kend`, `Desk_Kerusakan`, `STUJ`, `Kerusakan_Lain`, `BBM`, `Silinder_CC`, `No_STNK`, `An_STNK`, `Alamat_STNK`, `No_Rangka`, `No_Mesin`, `No_BPKB`) VALUES
('LP/55/33-L/III/2013/RES.CLG', 3, 'Sepeda Motor', 'A1020AK', 'a', 'a', 'a', 'a', 'Umum (Kuning)', '0', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kasat`
--

CREATE TABLE IF NOT EXISTS `t_kasat` (
  `ID_Kasat` varchar(255) NOT NULL,
  `Nama_Kasat` varchar(255) DEFAULT NULL,
  `Pangkat` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Tempat_Lahir` varchar(255) DEFAULT NULL,
  `Tgl_Lahir` date DEFAULT NULL,
  `No_Tlp` char(11) DEFAULT NULL,
  `Jabatan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Kasat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kecelakaan`
--

CREATE TABLE IF NOT EXISTS `t_kecelakaan` (
  `No_LP` varchar(255) NOT NULL,
  `ID_Petugas` varchar(255) DEFAULT NULL,
  `Waktu_Dilaporkan` datetime DEFAULT NULL,
  `Waktu_Kejadian` datetime NOT NULL,
  `Waktu_Diterima` datetime DEFAULT NULL,
  `Alamat_Kejadian` varchar(255) DEFAULT NULL,
  `Jenis_Kend` varchar(255) DEFAULT NULL,
  `ID_Pengemudi` varchar(255) DEFAULT NULL,
  `Keadaan_Pengemudi` varchar(255) DEFAULT NULL,
  `Keadaan_Cuaca` varchar(255) DEFAULT NULL,
  `Posisi` varchar(255) DEFAULT NULL,
  `ID_Saksi` varchar(255) DEFAULT NULL,
  `ID_Korban` varchar(255) DEFAULT NULL,
  `Kerusakan_Benda` varchar(255) DEFAULT NULL,
  `Kerugian_Materi` varchar(255) DEFAULT NULL,
  `Ket_Singkat` varchar(255) DEFAULT NULL,
  `Kesimpulan` varchar(255) DEFAULT NULL,
  `BB` varchar(255) DEFAULT NULL,
  `Orang_Ditahan` enum('Ada','Tidak Ada') DEFAULT 'Ada',
  `Pelapor` varchar(25) DEFAULT NULL,
  `ID_Penerima_Lap` varchar(255) DEFAULT NULL,
  `ID_Kesat` varchar(255) DEFAULT NULL,
  `ID_Pelaku` varchar(255) DEFAULT NULL,
  `Kd_Bentuk_Laka` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`No_LP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kecelakaan`
--

INSERT INTO `t_kecelakaan` (`No_LP`, `ID_Petugas`, `Waktu_Dilaporkan`, `Waktu_Kejadian`, `Waktu_Diterima`, `Alamat_Kejadian`, `Jenis_Kend`, `ID_Pengemudi`, `Keadaan_Pengemudi`, `Keadaan_Cuaca`, `Posisi`, `ID_Saksi`, `ID_Korban`, `Kerusakan_Benda`, `Kerugian_Materi`, `Ket_Singkat`, `Kesimpulan`, `BB`, `Orang_Ditahan`, `Pelapor`, `ID_Penerima_Lap`, `ID_Kesat`, `ID_Pelaku`, `Kd_Bentuk_Laka`) VALUES
('LP/55/33-L/III/2013/RES.CLG', '111', '2013-05-12 23:17:00', '2013-05-12 23:18:00', '0000-00-00 00:00:00', 'Cimuncang', NULL, NULL, 'Ngantuk', 'tes', 'Lurus', NULL, NULL, 'Ada', '1000', 'tess', 'aa', 'aaa', 'Ada', NULL, NULL, NULL, NULL, NULL),
('LP/56/33-L/III/2013/RES.CLG', '111', '2013-05-12 23:09:00', '2013-05-12 23:18:00', '2013-05-12 23:12:00', 'Serang tes', NULL, NULL, 'tes', 'tes', 'Lurus', NULL, NULL, 'Ada', '1000', 'tes', 'tes0', 'tes', 'Ada', NULL, NULL, NULL, NULL, NULL),
('LP/57/33-L/III/2013/RES.CLG', '111', '2013-12-02 20:20:00', '2013-05-12 23:18:00', '2013-12-02 21:30:00', 'Jl. Lingkar Selatan Cilegon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('LP/58/33-L/III/2013/RES.CLG', '111', '2013-06-03 00:00:00', '2013-06-03 00:00:00', NULL, 'Serang', NULL, NULL, 'tes', 'tes', 'tes', NULL, NULL, 'tes', 'tes', 'tes', 'tes', 'tes', 'Ada', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_korban`
--

CREATE TABLE IF NOT EXISTS `t_korban` (
  `No_LP` varchar(50) NOT NULL,
  `ID_Korban` int(20) NOT NULL AUTO_INCREMENT,
  `Nama_Korban` varchar(20) DEFAULT NULL,
  `Alamat_Korban` varchar(40) DEFAULT NULL,
  `T_Lahir_Korban` varchar(10) DEFAULT NULL,
  `Tgl_Lahir_Korban` date DEFAULT NULL,
  `JK_Korban` varchar(9) DEFAULT NULL,
  `Pendidikan_Korban` varchar(20) DEFAULT NULL,
  `Pekerjaan` varchar(20) DEFAULT NULL,
  `Agama` varchar(20) DEFAULT NULL,
  `Tingkat_Luka` varchar(20) DEFAULT NULL,
  `Tempat_Luka` varchar(30) DEFAULT NULL,
  `Korban` varchar(20) DEFAULT NULL,
  `Posisi_Korban` varchar(30) DEFAULT NULL,
  `Pengaman` varchar(20) DEFAULT NULL,
  `Helm` varchar(20) DEFAULT NULL,
  `Safety_Belt` varchar(20) DEFAULT NULL,
  `Posisi_Pejalan` varchar(20) DEFAULT NULL,
  `Gerakan_Pejalan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_Korban`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `t_korban`
--

INSERT INTO `t_korban` (`No_LP`, `ID_Korban`, `Nama_Korban`, `Alamat_Korban`, `T_Lahir_Korban`, `Tgl_Lahir_Korban`, `JK_Korban`, `Pendidikan_Korban`, `Pekerjaan`, `Agama`, `Tingkat_Luka`, `Tempat_Luka`, `Korban`, `Posisi_Korban`, `Pengaman`, `Helm`, `Safety_Belt`, `Posisi_Pejalan`, `Gerakan_Pejalan`) VALUES
('LP/55/33-L/III/2013/RES.CLG', 2, 'a', 'a', 'a', '2013-06-02', 'L', 'SD', 'PNS', 'Khatolik', 'LR', 'Tidak Luka', 'a', 'Mobil-Duduk Didepan', 'Tanpa', 'Ya (Standard)', 'Ya', '0', 'Berjalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelaku`
--

CREATE TABLE IF NOT EXISTS `t_pelaku` (
  `No_LP` varchar(50) NOT NULL,
  `ID_Pelaku` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Pelaku` varchar(255) DEFAULT NULL,
  `Alamat_Pelaku` varchar(255) DEFAULT NULL,
  `T_Lahir_Pelaku` varchar(255) DEFAULT NULL,
  `Tgl_Lahir_Pelaku` varchar(255) DEFAULT NULL,
  `JK_Pelaku` varchar(9) DEFAULT NULL,
  `Pendidikan_Pelaku` varchar(30) DEFAULT NULL,
  `Pekerjaan_Pelaku` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_Pelaku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_pelaku`
--

INSERT INTO `t_pelaku` (`No_LP`, `ID_Pelaku`, `Nama_Pelaku`, `Alamat_Pelaku`, `T_Lahir_Pelaku`, `Tgl_Lahir_Pelaku`, `JK_Pelaku`, `Pendidikan_Pelaku`, `Pekerjaan_Pelaku`) VALUES
('LP/55/33-L/III/2013/RES.CLG', 2, 'a', 'a', 'a', '2013-06-02', 'L', 'SD', 'Karyawan/Swasta'),
('LP/55/33-L/III/2013/RES.CLG', 3, 'Sumardi', 'Bojong Keyot', 'Subang', '2013-06-06', 'L', 'SD', 'Pengemudi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penerima_lap`
--

CREATE TABLE IF NOT EXISTS `t_penerima_lap` (
  `ID_Penerima_Lap` varchar(255) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Pangkat` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Tempat_Lahir` varchar(255) DEFAULT NULL,
  `Tgl_Lahir` datetime DEFAULT NULL,
  `No_Tlp` int(11) DEFAULT NULL,
  `Jabatan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Penerima_Lap`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengemudi`
--

CREATE TABLE IF NOT EXISTS `t_pengemudi` (
  `No_LP` varchar(255) NOT NULL,
  `ID_Pengemudi` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Pengemudi` varchar(255) DEFAULT NULL,
  `Alamat_Pengemudi` varchar(255) DEFAULT NULL,
  `Tempat_Lahir` varchar(255) DEFAULT NULL,
  `Tanggal_Lahir` date DEFAULT NULL,
  `Agama` varchar(255) DEFAULT NULL,
  `JK` varchar(255) DEFAULT NULL,
  `Pendidikan` varchar(255) DEFAULT NULL,
  `Pekerjaan` varchar(255) DEFAULT NULL,
  `Objek_Sbgai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Pengemudi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_pengemudi`
--

INSERT INTO `t_pengemudi` (`No_LP`, `ID_Pengemudi`, `Nama_Pengemudi`, `Alamat_Pengemudi`, `Tempat_Lahir`, `Tanggal_Lahir`, `Agama`, `JK`, `Pendidikan`, `Pekerjaan`, `Objek_Sbgai`) VALUES
('LP/55/33-L/III/2013/RES.CLG', 1, 'Saya', 'Ada', 'Dunia', '0000-00-00', 'Islam', 'L', 'SD', 'PNS', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_petugas`
--

CREATE TABLE IF NOT EXISTS `t_petugas` (
  `ID_Petugas` varchar(8) NOT NULL,
  `Nama_Petugas` varchar(20) DEFAULT NULL,
  `Pangkat` varchar(20) DEFAULT NULL,
  `Alamat` varchar(40) DEFAULT NULL,
  `Tempat_Lahir` varchar(10) DEFAULT NULL,
  `Tgl_Lahir` date DEFAULT NULL,
  `No_Tlp` varchar(12) DEFAULT NULL,
  `Jabatan` varchar(30) DEFAULT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_petugas`
--

INSERT INTO `t_petugas` (`ID_Petugas`, `Nama_Petugas`, `Pangkat`, `Alamat`, `Tempat_Lahir`, `Tgl_Lahir`, `No_Tlp`, `Jabatan`, `pwd`) VALUES
('111', 'Wihadi', 'Briptu', 'Perum Bumi Agung', 'Serang', '1985-05-05', '1234589099', 'Baur Min', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_saksi`
--

CREATE TABLE IF NOT EXISTS `t_saksi` (
  `No_LP` varchar(50) NOT NULL,
  `ID_Saksi` int(20) NOT NULL AUTO_INCREMENT,
  `Nama_Saksi` varchar(20) DEFAULT NULL,
  `Alamat_Saksi` varchar(40) DEFAULT NULL,
  `Tempat_Lahir` varchar(255) DEFAULT NULL,
  `Tanggal_Lahir` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_Saksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_saksi`
--

INSERT INTO `t_saksi` (`No_LP`, `ID_Saksi`, `Nama_Saksi`, `Alamat_Saksi`, `Tempat_Lahir`, `Tanggal_Lahir`) VALUES
('LP/55/33-L/III/2013/RES.CLG', 1, 'aa', 'aa', 'aa', '2013-06-02 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Administrator', 'surat@gmail.com', '-', 'admin', 'N', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

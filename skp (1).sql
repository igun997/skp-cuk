-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2019 pada 04.21
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `gol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `gol`) VALUES
(14, 'IV/e Jaksa Utama'),
(15, 'IV/d Jaksa Utama Madya'),
(16, 'IV/c Jaksa Utama Muda'),
(17, 'IV/b Jaksa Utama Pratama'),
(18, 'IV/a Jaksa Madya'),
(20, 'III/d Jaksa Muda'),
(21, 'III/c Jaksa Pratama'),
(22, 'III/b Ajun Jaksa'),
(23, 'III/a Ajun Jaksa Madya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(17, 'Kepala Sub.Bagian Pembinaan'),
(18, 'Kepala Seksi Intelijen'),
(19, 'Kepala Seksi Tindak Pindana Umum'),
(20, 'Kepala Seksi Pengelolaan Barang Bukti dan Barang Rampas'),
(21, 'Kepala Seksi Tindak Pidana Khusus'),
(22, 'Kepala Seksi Perdata dan Tata Usaha'),
(23, 'Kepala Seksi Ideologi, Politik, Pertahanan dan Keamanan, Sosial Budaya dan Kemasyarakatan'),
(24, 'Kepala Subseksi Ekonomi, Keuangan dan Pengamanan Pembangunan Strategis'),
(25, 'Kepala Subseksi Eksekusi dan Eksaminasi'),
(26, 'Kepala Subseksi Upaya Hukum Luar Biasa dan Eksekusi'),
(27, 'Kepala Subseksi Penyidikan pada Seksi Tindak Pidana Khusus'),
(28, 'Kepala Urusan Kepegawaian'),
(29, 'Kepala Urusan Keuangan'),
(30, 'Kepala Urusan Perlengkapan'),
(31, 'Kepala Urusan Daskrimti'),
(32, 'Kepala Urusan Tata Usaha dan Perpustakaan'),
(33, 'Pengelola Bahan Informasi dan Publikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `kuantitas` double NOT NULL,
  `satuan_kuantitas` varchar(20) NOT NULL,
  `kualitas` double NOT NULL,
  `waktu` int(11) NOT NULL,
  `biaya` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama`, `kuantitas`, `satuan_kuantitas`, `kualitas`, `waktu`, `biaya`) VALUES
(19, 'Mengagendakan dan Mengarsipkan Surat Masuk', 40, 'berkas', 100, 12, NULL),
(20, 'Mengagendakan dan Mengarsipkan Surat Keluar', 900, 'berkas', 100, 12, NULL),
(21, 'Mencatat Peristiwa Nikah kedalam Buku Stok model NB', 700, 'berkas', 100, 12, NULL),
(22, 'Mencatat Peristiwa Nikah kedalam Buku Stok model N', 700, 'peristiwa', 100, 12, NULL),
(23, 'Mencatat Peristiwa Nikah kedalam Buku Stok model NA', 700, 'peristiwa', 100, 12, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `password`, `nama`, `id_golongan`, `id_jabatan`, `id_unit`, `jk`) VALUES
('10515208', '10515208', 'Miftaah Fauzi', 18, 22, 4, 'laki-laki'),
('196326111992031002', '196326111992031002', 'Budi Dalton, SH', 20, 33, 4, 'laki-laki'),
('197607282001121001', '197607282001121001', 'DEDDY YULIANSYAH RASYID,SH.MH.', 18, 21, 4, 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp`
--

CREATE TABLE `skp` (
  `id_skp` int(11) NOT NULL,
  `nip_pejabat` varchar(30) NOT NULL,
  `nip_pegawai` varchar(30) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skp`
--

INSERT INTO `skp` (`id_skp`, `nip_pejabat`, `nip_pegawai`, `tahun`) VALUES
(10, '197607282001121001', '196326111992031002', 2018),
(11, '197607282001121001', '196326111992031002', 2019),
(12, '197607282001121001', '10515208', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp_detail`
--

CREATE TABLE `skp_detail` (
  `id_sd` int(11) NOT NULL,
  `id_skp` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `kuantitas` double NOT NULL,
  `kualitas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skp_detail`
--

INSERT INTO `skp_detail` (`id_sd`, `id_skp`, `id_kegiatan`, `kuantitas`, `kualitas`) VALUES
(19, 11, 19, 41, 80),
(20, 11, 20, 936, 80),
(21, 11, 21, 777, 81),
(22, 11, 22, 777, 81),
(23, 11, 23, 777, 81),
(29, 12, 19, 41, 98),
(30, 12, 20, 902, 98),
(31, 12, 21, 700, 97),
(32, 12, 22, 701, 95),
(33, 12, 23, 702, 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp_perilaku`
--

CREATE TABLE `skp_perilaku` (
  `id_sp` int(11) NOT NULL,
  `id_skp` int(11) NOT NULL,
  `orientasi_pelayanan` double NOT NULL,
  `integritas` double NOT NULL,
  `komitmen` double NOT NULL,
  `disiplin` double NOT NULL,
  `kerjasama` double NOT NULL,
  `kepemimpinan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama`) VALUES
(4, 'Kejaksaan Negeri Kabupaten Bandung');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_gol` (`id_golongan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `skp`
--
ALTER TABLE `skp`
  ADD PRIMARY KEY (`id_skp`),
  ADD KEY `nip_pejabat` (`nip_pejabat`,`nip_pegawai`),
  ADD KEY `nip_pegawai` (`nip_pegawai`);

--
-- Indeks untuk tabel `skp_detail`
--
ALTER TABLE `skp_detail`
  ADD PRIMARY KEY (`id_sd`),
  ADD KEY `skp_id` (`id_skp`),
  ADD KEY `ix_ka` (`id_kegiatan`);

--
-- Indeks untuk tabel `skp_perilaku`
--
ALTER TABLE `skp_perilaku`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `skp_id` (`id_skp`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `skp`
--
ALTER TABLE `skp`
  MODIFY `id_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `skp_detail`
--
ALTER TABLE `skp_detail`
  MODIFY `id_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `skp_perilaku`
--
ALTER TABLE `skp_perilaku`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skp`
--
ALTER TABLE `skp`
  ADD CONSTRAINT `skp_ibfk_1` FOREIGN KEY (`nip_pegawai`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skp_ibfk_2` FOREIGN KEY (`nip_pejabat`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skp_detail`
--
ALTER TABLE `skp_detail`
  ADD CONSTRAINT `skp_detail_ibfk_1` FOREIGN KEY (`id_skp`) REFERENCES `skp` (`id_skp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skp_detail_ibfk_3` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skp_perilaku`
--
ALTER TABLE `skp_perilaku`
  ADD CONSTRAINT `skp_perilaku_ibfk_1` FOREIGN KEY (`id_skp`) REFERENCES `skp` (`id_skp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

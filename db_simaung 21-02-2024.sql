-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2024 pada 03.17
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simaung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cicilanpiutang`
--

CREATE TABLE `tb_cicilanpiutang` (
  `id` int(11) NOT NULL,
  `id_piutang` int(11) NOT NULL,
  `id_dompet` int(11) NOT NULL,
  `catatan_cicilan` varchar(255) NOT NULL,
  `jml_cicilan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status_cicilan` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_cicilanpiutang`
--

INSERT INTO `tb_cicilanpiutang` (`id`, `id_piutang`, `id_dompet`, `catatan_cicilan`, `jml_cicilan`, `tanggal`, `status_cicilan`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'horeee', 1000000, '2024-02-04', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 2, 'hmm...', 500000, '2024-02-04', 1, '2024-02-04 17:28:25', '2024-02-04 17:28:25'),
(3, 1, 2, 'horeee', 500000, '2024-02-04', 0, '2024-02-04 18:00:47', '2024-02-04 18:00:47'),
(4, 1, 2, 'horeee', 750000, '2024-02-04', 0, '2024-02-04 18:01:39', '2024-02-04 18:01:39'),
(5, 1, 2, 'hm....', 2000000, '2024-02-04', 1, '2024-02-04 18:05:32', '2024-02-04 18:05:32'),
(6, 1, 2, 'Ketik catatan . . .', 1000000, '2024-02-04', 0, '2024-02-04 18:26:22', '2024-02-04 18:26:22'),
(7, 1, 2, 'Ketik catatan . . .', 1000000, '2024-02-04', 0, '2024-02-04 18:26:56', '2024-02-04 18:26:56'),
(8, 1, 2, 'Ketik catatan . . .', 2000000, '2024-02-05', 1, '2024-02-05 16:32:56', '2024-02-05 16:32:56'),
(9, 1, 2, 'Ketik catatan . . .', 1000000, '2024-02-05', 0, '2024-02-05 16:37:09', '2024-02-05 16:37:09'),
(10, 2, 1, 'Ketik catatan . . .', 500000, '2024-02-07', 1, '2024-02-07 12:18:02', '2024-02-07 12:18:02'),
(11, 2, 2, 'Ketik catatan . . .', 250000, '2024-02-07', 0, '2024-02-07 17:10:13', '2024-02-07 17:10:13'),
(12, 3, 1, 'Ketik catatan . . .', 500000, '2024-02-07', 1, '2024-02-07 21:18:54', '2024-02-07 21:18:54'),
(13, 3, 1, 'Ketik catatan . . .', 150000, '2024-02-07', 1, '2024-02-07 21:19:31', '2024-02-07 21:19:31'),
(14, 3, 2, 'Ketik catatan . . .', 150000, '2024-02-07', 0, '2024-02-07 21:19:57', '2024-02-07 21:19:57'),
(15, 6, 1, 'cicil dulu bos', 500000, '2024-02-09', 0, '2024-02-09 23:54:02', '2024-02-09 23:54:02'),
(16, 5, 3, 'Lunas', 100000, '2024-02-10', 0, '2024-02-10 00:03:36', '2024-02-10 00:03:36'),
(17, 4, 3, 'cicil segini dulu bos', 500000, '2024-02-10', 0, '2024-02-10 00:06:19', '2024-02-10 00:06:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dompet`
--

CREATE TABLE `tb_dompet` (
  `id_dompet` int(11) NOT NULL,
  `nama_dompet` varchar(100) NOT NULL,
  `saldo` int(11) NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dompet`
--

INSERT INTO `tb_dompet` (`id_dompet`, `nama_dompet`, `saldo`, `saldo_awal`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'CIMB', 5003500, 5000000, 0, NULL, '2024-02-09 23:54:02', ''),
(2, 'BRI', 12472000, 13000000, 1, NULL, '2024-02-19 17:18:40', ''),
(3, 'Cash', 330000, 500000, 0, NULL, '2024-02-19 14:39:55', ''),
(4, 'BCA', 600000, 500000, 0, NULL, '2024-01-20 16:36:33', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` int(11) NOT NULL,
  `gaji` int(11) NOT NULL,
  `tanggal_gajian` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`id`, `gaji`, `tanggal_gajian`, `created_at`, `updated_at`, `slug`) VALUES
(1, 2853862, 27, '2023-11-28 06:31:32', '2023-11-28 06:31:32', 'h92^%wS!E8MmQ$d665d301543cee71.62139025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kebutuhan`
--

CREATE TABLE `tb_kebutuhan` (
  `id` int(11) NOT NULL,
  `kebutuhan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `tanggal_pakai` date NOT NULL,
  `tanggal_habis` date NOT NULL,
  `periode` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id_dompet` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kebutuhan`
--

INSERT INTO `tb_kebutuhan` (`id`, `kebutuhan`, `harga`, `catatan`, `created_at`, `updated_at`, `tanggal_pakai`, `tanggal_habis`, `periode`, `status`, `id_dompet`, `slug`) VALUES
(1, 'Perawatan rambut', 200000, 'shampoo, conditioner, hair tonic, serum, hair vitamin', '0000-00-00', NULL, '0000-00-00', '0000-00-00', 'Saturday, 2023-11-11 18:29:31', 0, 4, ''),
(3, 'Bensin 1Bln', 250000, 'uang 250k untuk 1 bulan', '0000-00-00', '2024-01-21 13:12:39', '0000-00-00', '0000-00-00', 'Sunday, 2024-01-21 13:12:21', 0, 3, ''),
(6, 'Kasih ortu', 500000, 'berikan uang kepada ortu 1 bulan sekali', '0000-00-00', NULL, '0000-00-00', '0000-00-00', 'Saturday, 2023-11-11 18:32:50', 0, 2, ''),
(7, 'Wifi bulanan', 250000, 'berlangganan di myrepublic', '2024-02-04', '2024-02-04 15:16:07', '0000-00-00', '0000-00-00', '', 1, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lamapenggunaan`
--

CREATE TABLE `tb_lamapenggunaan` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_penggunaan` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lamapenggunaan`
--

INSERT INTO `tb_lamapenggunaan` (`id`, `nama_barang`, `catatan`, `tanggal_mulai`, `tanggal_selesai`, `status_penggunaan`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Shampoo', 'gunakanlah secukupnya, jangan boros', '2023-11-08', '0000-00-00', 0, NULL, NULL, ''),
(2, 'Sabun muka', 'pond\'s men acne solution (acne defense + oil fighter facial foam)', '2023-11-01', '2023-11-23', 1, NULL, NULL, ''),
(4, 'Hatomugi', 'Skin conditioner (pelembap muka)', '2024-02-20', '0000-00-00', 0, '2024-02-20 12:00:48', '2024-02-20 12:00:48', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logaktivitas`
--

CREATE TABLE `tb_logaktivitas` (
  `id` int(11) NOT NULL,
  `log_aktivitas` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `id_dompet` int(11) NOT NULL,
  `ke_iddompet` int(11) NOT NULL,
  `id_piutang` int(11) NOT NULL,
  `biaya_tf` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_logaktivitas`
--

INSERT INTO `tb_logaktivitas` (`id`, `log_aktivitas`, `jumlah`, `tanggal`, `catatan`, `created_at`, `updated_at`, `status`, `id_dompet`, `ke_iddompet`, `id_piutang`, `biaya_tf`, `slug`) VALUES
(1, 'Bensin', 29000, '2023-11-01', 'beli bensin di pertamina sayang2', '0000-00-00', NULL, 0, 3, 0, 0, 0, ''),
(2, 'Geprek', 10000, '2023-11-01', 'utk makan malam', '0000-00-00', NULL, 0, 3, 0, 0, 0, ''),
(3, 'Pulsa Listrik sebulan', 53500, '2023-10-31', 'pulsa listrik utk sebulan', '0000-00-00', NULL, 0, 1, 0, 0, 0, ''),
(4, 'beli shampoo', 54000, '2023-11-06', 'belum kebeli hair tonic', '0000-00-00', NULL, 0, 2, 0, 0, 0, ''),
(5, 'bahan salad buah', 72000, '2023-11-07', 'mayones, yogurt, susu kental manis, keju, buah melon', '0000-00-00', NULL, 0, 3, 0, 0, 0, ''),
(7, 'Bayar WI-FI', 220000, '2023-11-11', 'langganan wifi dari iconnet', '0000-00-00', NULL, 4, 1, 0, 0, 0, ''),
(8, 'Perawatan rambut', 200000, '2023-11-11', 'shampoo, conditioner, hair tonic, serum, hair vitamin', '0000-00-00', NULL, 4, 4, 0, 0, 0, ''),
(9, 'Kasih ortu', 500000, '2023-11-11', 'berikan uang kepada ortu 1 bulan sekali', '0000-00-00', NULL, 4, 2, 0, 0, 0, ''),
(10, 'Buku 48 Law of Power', 118500, '2023-11-11', 'Jangan lupa membeli buku ini', '0000-00-00', NULL, 3, 2, 0, 0, 0, ''),
(11, 'Processor Intel Core I5-3470', 240000, '2023-11-11', 'Untuk membuat server baru', '0000-00-00', NULL, 3, 2, 0, 0, 0, ''),
(12, 'bahan grill', 150000, '2023-11-12', 'sosis, daging ayam, daging sapi, jamur enoki', '0000-00-00', NULL, 0, 2, 0, 0, 0, ''),
(13, 'beli bakso, natur hair tonic', 51000, '2023-11-13', 'beli bakso pong 15k, ganti uang ke dani 36k', '0000-00-00', NULL, 0, 2, 0, 0, 0, ''),
(14, 'bensin', 30000, '2023-11-14', 'beli bensin full', '0000-00-00', NULL, 0, 2, 0, 0, 0, ''),
(15, 'Beli geprek', 20000, '2023-11-15', 'geprek 2 + nasi, beli di belencong', '0000-00-00', NULL, 0, 3, 0, 0, 0, ''),
(16, 'Duren 2', 25000, '2023-11-15', 'Duren sudah cukup utk dibeli', '0000-00-00', NULL, 0, 3, 0, 0, 0, ''),
(17, 'pulsa listrik', 53500, '2023-11-25', 'pulsa listrik utk sebulan (75.40 kWh)', '2023-11-26', '2023-11-26 09:49:43', 0, 1, 0, 0, 0, ''),
(18, 'Beli bensin', 31000, '2024-01-15', 'pembelian bensin bulan januari yang pertama', '2024-01-15', '2024-01-15 22:04:44', 0, 2, 0, 0, 0, ''),
(19, 'Beli makanan', 25000, '2024-01-17', 'pembelian makanan pertama di bulan januari 2024', '2024-01-17', '2024-01-17 10:24:20', 0, 2, 0, 0, 0, ''),
(20, 'Beras 15Kg', 240000, '2024-01-17', 'dipakai untuk sebulan', '2024-01-17', '2024-01-17 10:25:27', 4, 2, 0, 0, 0, ''),
(21, 'Pulsa', 101500, '2024-01-17', 'Langsung beli paket internet/ kuota', '2024-01-17', '2024-01-17 21:57:16', 0, 1, 0, 0, 0, ''),
(22, 'Transfer', 200000, '2024-01-18', 'transfer', '2024-01-18', '2024-01-18 15:36:27', 2, 2, 0, 0, 0, ''),
(23, 'Transfer', 100000, '2024-01-18', 'transfer ke bca', '2024-01-18', '2024-01-18 15:40:11', 2, 2, 0, 0, 0, ''),
(24, 'Transfer', 150000, '2024-01-18', 'tarik tunai', '2024-01-18', '2024-01-18 15:44:08', 2, 1, 0, 0, 0, ''),
(25, 'Transfer', 200000, '2024-01-18', 'transfer ke bca', '2024-01-18', '2024-01-18 15:46:54', 2, 2, 4, 0, 2500, ''),
(26, 'tarik kabel', 75000, '2024-01-20', 'biaya tarik kabel teknisi wifi myrepublic', '2024-01-20', '2024-01-20 15:39:39', 0, 3, 0, 0, 0, ''),
(27, 'bonus', 300000, '2024-01-20', 'bonus bulan januari', '2024-01-20', '2024-01-20 15:48:50', 1, 1, 0, 0, 0, ''),
(28, 'bonus', 300000, '2024-01-20', 'bonus bulan januari', '2024-01-20', '2024-01-20 15:49:44', 0, 1, 0, 0, 0, ''),
(29, 'bonus', 300000, '2024-01-20', 'bonus bulan januari', '2024-01-20', '2024-01-20 15:51:22', 1, 1, 0, 0, 0, ''),
(30, 'Transfer', 100000, '2024-01-20', 'transfer ke bca', '2024-01-20', '2024-01-20 16:36:23', 2, 2, 4, 0, 0, ''),
(31, 'Bensin 1Bln', 250000, '2024-01-21', 'uang 250k untuk 1 bulan', '2024-01-21', '2024-01-21 13:12:39', 4, 1, 0, 0, 0, ''),
(32, 'beli pulsa', 193000, '2024-01-28', 'utk beli kuota', '2024-01-28', '2024-01-28 21:49:02', 0, 1, 0, 0, 0, ''),
(33, 'pulsa listrik', 53500, '2024-01-27', 'listrik untuk sebulan', '2024-01-28', '2024-01-28 21:51:25', 0, 1, 0, 0, 0, ''),
(34, 'Beli pop mie(2)', 55000, '2024-01-30', 'tambahan ultramilk(2), sosis kenzler(2), yakult(1)', '2024-01-31', '2024-01-31 12:31:11', 0, 3, 0, 0, 0, ''),
(35, 'bensin + isi angin', 40000, '2024-01-31', 'bulan ini', '2024-02-01', '2024-02-01 12:11:14', 0, 3, 0, 0, 0, ''),
(36, 'ticket kolam + konsumsi', 90000, '2024-02-03', 'masuk kolam nirwana + beli sosis 4 (1 sosis 10k)', '2024-02-03', '2024-02-03 17:25:42', 0, 2, 0, 0, 0, ''),
(37, 'ichi ocha + cukur rambut', 95000, '2024-02-03', 'promo ichi ocha di gede + cukur di gunungsari', '2024-02-03', '2024-02-03 17:28:01', 0, 2, 0, 0, 0, ''),
(38, 'bensin', 30000, '2024-02-06', 'habis dari lotim', '2024-02-06', '2024-02-06 15:36:37', 0, 2, 0, 0, 0, ''),
(39, 'belanja di indomaret', 22000, '2024-02-09', 'pop mie+sosis+susu', '2024-02-09', '2024-02-09 21:43:24', 0, 2, 0, 0, 0, ''),
(42, 'Piutang', 500000, '2024-02-09', 'cicil dulu bos', '2024-02-09', '2024-02-09 23:54:02', 5, 1, 0, 0, 0, ''),
(45, 'geprek + nasgor', 44000, '2024-02-17', 'geprek 2, nasgor 2', '2024-02-17', '2024-02-17 22:23:54', 0, 2, 0, 0, 0, ''),
(46, 'pulsa listrik', 53000, '2024-02-17', 'lebih hemat lagi', '2024-02-17', '2024-02-17 22:24:36', 0, 2, 0, 0, 0, ''),
(47, 'bayar teknisi myrepublic', 150000, '2024-02-19', 'tarik kabel + biaya kabel', '2024-02-19', '2024-02-19 17:17:04', 0, 2, 0, 0, 0, ''),
(48, 'Jajan alfmart', 44000, '2024-02-19', 'sedak untuk teknisi myrepublic', '2024-02-19', '2024-02-19 17:18:40', 0, 2, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_loginventory`
--

CREATE TABLE `tb_loginventory` (
  `id` int(11) NOT NULL,
  `nama_inventory` varchar(100) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status_inventory` int(11) NOT NULL,
  `status_periode` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penghitungperiode`
--

CREATE TABLE `tb_penghitungperiode` (
  `id` int(11) NOT NULL,
  `nama_aktivitas` varchar(50) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_penghitung` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penghitungperiode`
--

INSERT INTO `tb_penghitungperiode` (`id`, `nama_aktivitas`, `catatan`, `tanggal_mulai`, `tanggal_selesai`, `status_penghitung`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Panjangin rambut', 'sudah dirapikan (mulai panjangkan lagi utk di mullet)', '2023-12-30', '0000-00-00', 0, NULL, '2023-12-30 12:21:16', ''),
(3, 'pulsa listrik habis', 'kWh 75.40', '2023-11-25', '2023-11-30', 1, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_piutang`
--

CREATE TABLE `tb_piutang` (
  `id` int(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_dompet` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_piutang`
--

INSERT INTO `tb_piutang` (`id`, `nama_peminjam`, `nominal`, `tanggal_pinjam`, `catatan`, `status`, `id_dompet`, `created_at`, `updated_at`) VALUES
(1, 'Saburo Uzumaki', 3500000, '2023-12-02 03:27:07', 'Butuh banget', 1, 1, '2023-12-02 03:27:07', '2023-12-02 03:27:07'),
(2, 'Uzumaki Boruso', 500000, '2023-12-02 04:11:46', 'Utk beli hp', 1, 2, '2023-12-02 04:11:46', '2023-12-02 04:11:46'),
(3, 'Roronoa Zoro', 1500000, '2024-02-07 11:14:06', 'beli pedang', 1, 2, '2024-02-07 11:14:06', '2024-02-07 11:14:06'),
(4, 'd Luffy', 2000000, '2024-02-07 23:20:19', 'Beli mera-mera no mi', 1, 1, '2024-02-07 23:20:45', '2024-02-08 11:10:06'),
(5, 'Tes Piutang', 100000, '2024-02-09 23:32:53', 'percobaan perhitungan cara double', 1, 2, '2024-02-09 23:33:11', '2024-02-09 23:33:11'),
(6, 'Tes 2', 1000000, '2024-02-09 23:36:33', 'tes lagi ygy', 1, 2, '2024-02-09 23:36:51', '2024-02-09 23:36:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rencana`
--

CREATE TABLE `tb_rencana` (
  `id` int(11) NOT NULL,
  `rencana` varchar(50) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_rencana`
--

INSERT INTO `tb_rencana` (`id`, `rencana`, `catatan`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Buat casing PC', 'dibuat dengan bahan kayu (stik eskrim) dan ditaruh dibawah meja', 0, '2023-11-26 11:21:28', '2023-11-26 11:35:14', ''),
(3, 'membuat web portfolio', 'selesaikan project2 kecil untuk di masukkan ke dalam portfolio', 0, '2023-11-26 15:38:37', '2023-11-26 15:38:37', ''),
(4, 'Buat home server', 'kumpulkan dana untuk beli PC lagi satu utk dijadikan home server', 0, '2024-01-28 23:18:49', '2024-01-28 23:18:49', ''),
(5, 'beli  kebutuhan olahraga', 'celana training / jogging + baju, sepatu training atau running', 0, '2024-01-28 23:21:13', '2024-01-28 23:21:13', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayatgaji`
--

CREATE TABLE `tb_riwayatgaji` (
  `id` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_riwayatgaji`
--

INSERT INTO `tb_riwayatgaji` (`id`, `id_gaji`, `tanggal`, `status`, `created_at`, `updated_at`, `slug`) VALUES
(1, 1, '2023-11-28 16:53:47', 1, '2023-11-28 16:53:47', '2023-11-28 16:53:47', '.a~sDZk20n1+>OE96565aa9b222dc4.02536523'),
(2, 1, '2023-11-28 16:53:54', 1, '2023-11-28 16:53:54', '2023-11-28 16:53:54', 'vD02l\'s9,?7)CXUg6565aaa2059364.34277058');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayatp`
--

CREATE TABLE `tb_riwayatp` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status_riwayat` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_target`
--

CREATE TABLE `tb_target` (
  `id` int(11) NOT NULL,
  `target` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `tanggal_mulai` varchar(35) NOT NULL,
  `tanggal_selesai` varchar(35) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id_dompet` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_target`
--

INSERT INTO `tb_target` (`id`, `target`, `cost`, `tanggal_mulai`, `tanggal_selesai`, `catatan`, `created_at`, `updated_at`, `status`, `id_dompet`, `slug`) VALUES
(1, 'Processor Intel Core I5-3470', 240000, 'Minggu, 2023-10-29 13:38:40', 'Saturday, 2023-11-11 23:51:43', 'Untuk membuat server baru', '0000-00-00', NULL, 0, 2, ''),
(2, 'Buku 48 Law of Power', 118500, 'Rabu, 2023-10-18 16:45:13', 'Saturday, 2023-11-11 23:47:22', 'Jangan lupa membeli buku ini', '0000-00-00', NULL, 0, 2, ''),
(4, 'Salad buah', 100000, 'Minggu, 2023-11-11 23:52:04', '', 'mau buat salad buah ukuran jumbo', '0000-00-00', NULL, 1, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_todolist`
--

CREATE TABLE `tb_todolist` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_todolist`
--

INSERT INTO `tb_todolist` (`id`, `title`, `deskripsi`, `tanggal`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Membaca buku', 'buku atomic habits hal 180 an (minimal 1 lembar)', '0000-00-00 00:00:00', '2023-11-28 12:36:47', '2023-11-28 13:00:18', '5gh7!;CNcE61W[x`65656e5f7f5ba6.35881135'),
(8, 'Ngoding', 'minimal ketik 1 baris code', '2023-12-01 20:29:08', '2023-12-01 20:29:08', '2023-12-01 20:29:08', 'j8;1?OdA:t9o0L`F6569d1942a4b54.97657314'),
(10, 'Lari pagi hari', 'selesai sholat subuh di hari minggu, selasa, kamis', '2024-02-12 18:44:52', '2024-02-12 18:44:52', '2024-02-12 18:44:52', 'Jy9H.4l)%B3nq2E_65c9f6a4894925.71791015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_cicilanpiutang`
--
ALTER TABLE `tb_cicilanpiutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_dompet`
--
ALTER TABLE `tb_dompet`
  ADD PRIMARY KEY (`id_dompet`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kebutuhan`
--
ALTER TABLE `tb_kebutuhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lamapenggunaan`
--
ALTER TABLE `tb_lamapenggunaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_logaktivitas`
--
ALTER TABLE `tb_logaktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_loginventory`
--
ALTER TABLE `tb_loginventory`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_penghitungperiode`
--
ALTER TABLE `tb_penghitungperiode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_piutang`
--
ALTER TABLE `tb_piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rencana`
--
ALTER TABLE `tb_rencana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_riwayatgaji`
--
ALTER TABLE `tb_riwayatgaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_riwayatp`
--
ALTER TABLE `tb_riwayatp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_target`
--
ALTER TABLE `tb_target`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_todolist`
--
ALTER TABLE `tb_todolist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_cicilanpiutang`
--
ALTER TABLE `tb_cicilanpiutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_dompet`
--
ALTER TABLE `tb_dompet`
  MODIFY `id_dompet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kebutuhan`
--
ALTER TABLE `tb_kebutuhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_lamapenggunaan`
--
ALTER TABLE `tb_lamapenggunaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_logaktivitas`
--
ALTER TABLE `tb_logaktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_loginventory`
--
ALTER TABLE `tb_loginventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_penghitungperiode`
--
ALTER TABLE `tb_penghitungperiode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_piutang`
--
ALTER TABLE `tb_piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_rencana`
--
ALTER TABLE `tb_rencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatgaji`
--
ALTER TABLE `tb_riwayatgaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatp`
--
ALTER TABLE `tb_riwayatp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_target`
--
ALTER TABLE `tb_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_todolist`
--
ALTER TABLE `tb_todolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

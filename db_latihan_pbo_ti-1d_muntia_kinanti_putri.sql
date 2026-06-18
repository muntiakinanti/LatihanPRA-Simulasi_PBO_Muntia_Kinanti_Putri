-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti-1d_muntia_kinanti_putri`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(100) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(20) DEFAULT NULL,
  `efek_gerak_fitur` varchar(50) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'The Avengers', '2026-06-12 13:00:00', 2, '45000.00', 'Regular', 'Standard Stereo', 'Row G', NULL, NULL, NULL, NULL),
(2, 'Spiderman: No Way Home', '2026-06-13 10:00:00', 4, '40000.00', 'Regular', 'Standard Stereo', 'Row H', NULL, NULL, NULL, NULL),
(3, 'Conjuring 4', '2026-06-14 23:30:00', 1, '50000.00', 'Regular', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Toy Story 5', '2026-06-15 11:00:00', 5, '35000.00', 'Regular', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Despicable Me 5', '2026-06-16 13:00:00', 3, '40000.00', 'Regular', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'The Batman 2', '2026-06-16 19:15:00', 2, '45000.00', 'Regular', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Fast X: Part 2', '2026-06-17 15:00:00', 2, '45000.00', 'Regular', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Frozen 3', '2026-06-18 10:30:00', 4, '40000.00', 'Regular', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Avatar: The Way of Water', '2026-06-12 15:30:00', 1, '75000.00', 'IMAX', 'Dolby Atmos', 'Row E', 'IMAX-3D-092', '4DX Motion', NULL, NULL),
(10, 'Doctor Strange 3', '2026-06-13 14:15:00', 2, '80000.00', 'IMAX', 'Dolby Atmos', 'Row D', 'IMAX-3D-115', '4DX Motion', NULL, NULL),
(11, 'Oppenheimer', '2026-06-14 12:00:00', 3, '75000.00', 'IMAX', 'IMAX 6-Track', 'Row F', NULL, NULL, NULL, NULL),
(12, 'Interstellar 2', '2026-06-17 20:00:00', 2, '80000.00', 'IMAX', 'Dolby Atmos', 'Row C', 'IMAX-3D-004', NULL, NULL, NULL),
(13, 'Star Wars: New Jedi', '2026-06-18 14:00:00', 2, '80000.00', 'IMAX', 'Dolby Atmos', 'Row D', 'IMAX-3D-221', 'D-Box Motion', NULL, NULL),
(14, 'Jurassic World Rebirth', '2026-06-19 16:30:00', 1, '75000.00', 'IMAX', 'IMAX 6-Track', 'Row E', NULL, NULL, NULL, NULL),
(15, 'Matrix Resurrections', '2026-06-19 21:00:00', 2, '75000.00', 'IMAX', 'Dolby Atmos', 'Row F', 'IMAX-3D-055', NULL, NULL, NULL),
(16, 'Inception', '2026-06-12 19:00:00', 2, '120000.00', 'Velvet', 'DTS:X', 'Row A', NULL, NULL, 'Premium Pack VIP', 'Personal Butler Service'),
(17, 'Interstellar', '2026-06-13 21:00:00', 2, '150000.00', 'Velvet', 'DTS:X', 'Row B', NULL, NULL, 'Double Blanket Pack', 'Premium Butler Service'),
(18, 'Dune: Part Two', '2026-06-15 16:00:00', 2, '110000.00', 'Velvet', 'Dolby Atmos', 'Row C', NULL, NULL, 'Single Quilt Pack', NULL),
(19, 'Gladiator II', '2026-06-15 20:30:00', 2, '130000.00', 'Velvet', NULL, 'Row A', NULL, NULL, 'Premium Pack VIP', 'Personal Butler Service'),
(20, 'Wicked', '2026-06-16 16:00:00', 2, '120000.00', 'Velvet', NULL, 'Row B', NULL, NULL, 'Standard Pillow Pack', NULL),
(21, 'Superman (2025)', '2026-06-17 18:30:00', 2, '150000.00', 'Velvet', 'Dolby Atmos', 'Row A', NULL, NULL, 'Double Blanket Pack', 'Premium Butler Service'),
(22, 'The Godfather Remaster', '2026-06-18 21:00:00', 1, '130000.00', 'Velvet', 'DTS:X', 'Row C', NULL, NULL, 'Single Quilt Pack', 'Personal Butler Service');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

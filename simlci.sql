-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 07:01 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simlci`
--

-- --------------------------------------------------------

--
-- Table structure for table `asnaf`
--

CREATE TABLE `asnaf` (
  `id_asnaf` int(20) NOT NULL,
  `nama_asnaf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asnaf`
--

INSERT INTO `asnaf` (`id_asnaf`, `nama_asnaf`) VALUES
(2, 'Fakir'),
(3, 'Miskin'),
(4, 'Ibnu Sabil'),
(5, 'Hamba Sahaya'),
(6, 'GHARIMIN (Program Bantuan Pelunasan Hutang)');

-- --------------------------------------------------------

--
-- Table structure for table `cara_donasi`
--

CREATE TABLE `cara_donasi` (
  `id_cara` int(11) NOT NULL,
  `cara_donasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cara_donasi`
--

INSERT INTO `cara_donasi` (`id_cara`, `cara_donasi`) VALUES
(1, 'Payroll (Potong Gaji)'),
(2, 'Transfer'),
(3, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_donasi`
--

CREATE TABLE `jenis_donasi` (
  `id_jenis` int(20) NOT NULL,
  `jenis_donasi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_donasi`
--

INSERT INTO `jenis_donasi` (`id_jenis`, `jenis_donasi`) VALUES
(6, 'Barang'),
(7, 'Uang');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `nama_kec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`) VALUES
(3, 'Tampan'),
(4, 'Bukit Raya'),
(5, 'Lima Puluh'),
(6, 'Marpoyan Damai'),
(7, 'Payung Sekaki'),
(8, 'Pekanbaru Kota'),
(9, 'Rumbai'),
(10, 'Rumbai Pesisir'),
(11, 'Sail'),
(12, 'Senapelan'),
(13, 'Sukajadi'),
(15, 'Tenayan Raya');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kel` int(11) NOT NULL,
  `nama_kel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kel`, `nama_kel`) VALUES
(1, 'Tuah Madani'),
(2, 'Delima'),
(3, 'Tuah Karya'),
(4, 'Simpang Baru'),
(5, 'Sidomulyo Barat'),
(6, 'Sri Meranti'),
(7, 'Palas'),
(8, 'Rumbai Bukit'),
(9, 'Umban Sari'),
(10, 'Muara Fajar');

-- --------------------------------------------------------

--
-- Table structure for table `mustahik`
--

CREATE TABLE `mustahik` (
  `id_mustahik` int(20) NOT NULL,
  `nama_mus` varchar(50) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat_mus` varchar(100) NOT NULL,
  `waktu_survey` date NOT NULL,
  `kategori_asnaf` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `no_hp` text NOT NULL,
  `no_registrasi` varchar(10) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `usia` varchar(25) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `rt_rw` varchar(10) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `masjid_musholla` varchar(50) NOT NULL,
  `surveyor` varchar(20) NOT NULL,
  `tgl_verifikasi` date NOT NULL,
  `tgl_persetujuan` date NOT NULL,
  `status_persetujuan` enum('BELUM DISETUJUI','DISETUJUI','DITOLAK') NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mustahik`
--

INSERT INTO `mustahik` (`id_mustahik`, `nama_mus`, `no_ktp`, `alamat_mus`, `waktu_survey`, `kategori_asnaf`, `program`, `no_hp`, `no_registrasi`, `tgl_registrasi`, `tempat_lahir`, `tgl_lahir`, `usia`, `pekerjaan`, `rt_rw`, `kelurahan`, `kecamatan`, `masjid_musholla`, `surveyor`, `tgl_verifikasi`, `tgl_persetujuan`, `status_persetujuan`, `keterangan`) VALUES
(31, 'Yanto', '12834834832', 'jl. rambutan', '2018-12-28', 'Miskin', 'Pengobatan Gratis', '081231236', '01/01', '2019-01-01', 'dumai', '1990-01-29', '29 tahun', 'Buruh', '09/09', 'Tuah Madani', 'Rumbai Pesisir', 'Masjid Al-Fatihah', 'Latif', '2019-01-01', '0000-00-00', 'DISETUJUI', 'DIA SUDAH DITERIMA DAN LAYAK'),
(32, 'siti', '123127312', 'jl. durian', '2019-01-01', 'Miskin', '', '081237112372', '02/02', '2019-03-01', 'pekanbaru', '1989-09-09', '30 tahun', 'Buruh', '09/09', 'Tuah Madani', 'Tampan', 'masjid al-badar', 'Latif', '2019-01-02', '0000-00-00', 'DISETUJUI', 'DIA SUDAH DITERIMA DAN LAYAK'),
(35, 'muchsin', '1423561236125', 'jl.durian no.12', '2019-03-04', 'Miskin', '', '0812362135', '01/05`', '2019-03-04', 'duri', '1991-09-09', '28 tahun', 'Buruh', '01/09', 'Tuah Madani', 'Tampan', 'masjid al-badar', 'Latif', '2019-03-04', '0000-00-00', 'DISETUJUI', 'DIA SUDAH DITERIMA DAN LAYAK');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` int(20) NOT NULL,
  `nama_muz` varchar(50) NOT NULL,
  `alamat_muz` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_npwp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_muz`, `alamat_muz`, `no_hp`, `email`, `no_npwp`) VALUES
(19, 'Mail', 'jl. ujung kulon no.11', '08128936', 'mail@gmail.com', '1212112337643'),
(20, 'hadi', 'jl. limbungan', '08123727316238', 'hadi@gmail.com', '829147248721'),
(23, 'Ahmad', 'jl.durian no.2', '081235232', 'amuchsin32@gmail.com', '514236123612'),
(24, 'fitri insani', 'jl. mangga no.2', '0812352135', 'fitri@gmail.com', '6123613216');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `jabatan`) VALUES
(2, 'Anto', 'Surveyor'),
(3, 'Latif', 'Surveyor'),
(4, 'Hengki', 'Surveyor');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(20) NOT NULL,
  `nama_program` text NOT NULL,
  `jenis_program` enum('kemanusiaan','kesehatan','ekonomi','pendidikan','dakwah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `nama_program`, `jenis_program`) VALUES
(8, 'Program Beasiswa Rumbai Cerdas', 'pendidikan'),
(12, 'Pengobatan Gratis', 'kesehatan'),
(15, 'Miskin(Program Peduli Dhu''afa)', 'kemanusiaan'),
(16, 'FAQIR (PROGRAM LANSIA SEJAHTERA)', 'kemanusiaan'),
(17, 'MISKIN (PROGRAMLAZNAS TANGGAP BENCANA)', 'kemanusiaan'),
(18, 'GHARIMIN (PROGRAM BANTUAN PELUNASAN HUTANG)', 'kemanusiaan'),
(19, 'IBNU SABIL (PROGRAM BANTUAN IBNU SABIL)', 'kemanusiaan'),
(20, 'MISKIN (PROGRAM PASAR SEMBAKO MURAH)', 'kemanusiaan'),
(21, 'MISKIN (PROGRAM BANTUAN MODAL USAHA MANDIRI)', 'ekonomi'),
(22, 'FISABILILLAH (PROGRAM DA''I BINA UMAT)', 'dakwah');

-- --------------------------------------------------------

--
-- Table structure for table `program_mustahik`
--

CREATE TABLE `program_mustahik` (
  `id_promus` int(11) NOT NULL,
  `id_mustahik` int(20) NOT NULL,
  `id_program` int(20) NOT NULL,
  `bulan` date NOT NULL,
  `penyalur` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_mustahik`
--

INSERT INTO `program_mustahik` (`id_promus`, `id_mustahik`, `id_program`, `bulan`, `penyalur`, `jumlah`) VALUES
(56, 31, 8, '2019-03-03', '0', 500000),
(57, 32, 17, '2019-03-04', '0', 200000),
(58, 33, 15, '2019-03-04', '0', 400000),
(59, 34, 12, '2019-03-04', '0', 500000),
(60, 35, 8, '2019-03-04', '0', 400000),
(61, 31, 12, '2019-03-04', '0', 200000),
(62, 31, 12, '2019-03-04', '0', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `program_muzakki`
--

CREATE TABLE `program_muzakki` (
  `id_promuz` int(11) NOT NULL,
  `id_muzakki` int(20) NOT NULL,
  `id_program` int(20) NOT NULL,
  `id_jenis` int(20) NOT NULL,
  `id_cara` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_muzakki`
--

INSERT INTO `program_muzakki` (`id_promuz`, `id_muzakki`, `id_program`, `id_jenis`, `id_cara`, `tgl_transaksi`, `jumlah`) VALUES
(41, 19, 8, 7, 2, '2019-03-03', 5000000),
(42, 20, 12, 7, 2, '2019-03-03', 5000000),
(43, 20, 22, 7, 2, '2019-03-03', 10000000),
(44, 21, 16, 7, 2, '2019-03-04', 120000),
(45, 21, 8, 7, 2, '2019-03-04', 5000000),
(46, 23, 8, 7, 2, '2019-03-04', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rek` int(20) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `saldo` int(11) NOT NULL,
  `tgl_aktivasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rek`, `nama_bank`, `no_rek`, `saldo`, `tgl_aktivasi`) VALUES
(2, 'BCA', '0123701', 9200000, '2009-11-11'),
(5, 'BRI', '12312123123', 4800000, '2019-01-09'),
(6, 'BNI', '1236123681', 9720000, '2018-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `last_login` date NOT NULL,
  `level` enum('pimpinan','administrasi','muzakki') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `last_login`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Devi', '2018-10-25', 'administrasi'),
(2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Pak Age', '0000-00-00', 'pimpinan'),
(3, 'muzakki', 'e10adc3949ba59abbe56e057f20f883e', 'muzakki', '0000-00-00', 'muzakki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asnaf`
--
ALTER TABLE `asnaf`
  ADD PRIMARY KEY (`id_asnaf`);

--
-- Indexes for table `cara_donasi`
--
ALTER TABLE `cara_donasi`
  ADD PRIMARY KEY (`id_cara`);

--
-- Indexes for table `jenis_donasi`
--
ALTER TABLE `jenis_donasi`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kel`);

--
-- Indexes for table `mustahik`
--
ALTER TABLE `mustahik`
  ADD PRIMARY KEY (`id_mustahik`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `program_mustahik`
--
ALTER TABLE `program_mustahik`
  ADD PRIMARY KEY (`id_promus`);

--
-- Indexes for table `program_muzakki`
--
ALTER TABLE `program_muzakki`
  ADD PRIMARY KEY (`id_promuz`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_jenis_2` (`id_jenis`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asnaf`
--
ALTER TABLE `asnaf`
  MODIFY `id_asnaf` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cara_donasi`
--
ALTER TABLE `cara_donasi`
  MODIFY `id_cara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_donasi`
--
ALTER TABLE `jenis_donasi`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mustahik`
--
ALTER TABLE `mustahik`
  MODIFY `id_mustahik` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `program_mustahik`
--
ALTER TABLE `program_mustahik`
  MODIFY `id_promus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `program_muzakki`
--
ALTER TABLE `program_muzakki`
  MODIFY `id_promuz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rek` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

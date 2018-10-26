CREATE TABLE `angsuran_detail` (
  `NO` int(5) NOT NULL,
  `tahun` int(5) NOT NULL,
  `bulan` int(5) NOT NULL,
  `outstanding` decimal(15,2) NOT NULL,
  `angsuran_pokok` decimal(15,2) NOT NULL,
  `angsuran_bunga` decimal(15,2) NOT NULL,
  `angsuran_total` decimal(15,2) NOT NULL,
  `NO_KTP_PEMOHON` varchar(100) NOT NULL,
  `batch_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1
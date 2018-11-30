create table system_upload(
ID int not null auto_increment,
file_name varchar(255),
application_source varchar(50),
batch_id int,
process_month int,
process_year int,
uploader int,
update_at timestamp,

primary key(ID)
)

CREATE TABLE IF NOT EXISTS `system_flpp` (
  `NAMA_PEMOHON` varchar(250) NOT NULL,
  `PEKERJAAN_PEMOHON` varchar(250) NOT NULL,
  `JENIS_KELAMIN` varchar(250) NOT NULL,
  `NO_KTP_PEMOHON` varchar(250) NOT NULL,
  `NPWP_PEMOHON` varchar(250) NOT NULL,
  `GAJI_POKOK` varchar(250) NOT NULL,
  `NAMA_PASANGAN` varchar(250) NOT NULL,
  `NO_KTP_PASANGAN` varchar(250) NOT NULL,
  `NO_REKENING_PEMOHON` varchar(250) NOT NULL,
  `TGL_AKAD` varchar(250) NOT NULL,
  `HARGA_RUMAH` varchar(250) NOT NULL,
  `NILAI_KPR` varchar(250) NOT NULL,
  `SUKU_BUNGA_KPR` varchar(250) NOT NULL,
  `TENOR` varchar(250) NOT NULL,
  `ANGSURAN_KPR` varchar(250) NOT NULL,
  `NILAI_FLPP` varchar(250) NOT NULL,
  `NAMA_PENGEMBANG` varchar(250) NOT NULL,
  `NAMA_PERUMAHAN` varchar(250) NOT NULL,
  `ALAMAT_AGUNAN` varchar(250) NOT NULL,
  `KOTA_AGUNAN` varchar(250) NOT NULL,
  `KODE_POS_AGUNAN` varchar(250) NOT NULL,
  `LUAS_TANAH` varchar(250) NOT NULL,
  `LUAS_BANGUNAN` varchar(250) NOT NULL,
  `batch_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `month` int(5) NOT NULL DEFAULT '0',
  `year` int(5) NOT NULL DEFAULT '0',
  `is_generate` int(5) NOT NULL DEFAULT '0',
`ID` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(ID)
) 
-- drop table system_flpp
-- drop table system_upload
select * from system_upload

truncate system_flpp

select * from system_flpp

	
LOAD DATA INFILE 'C:/xampp/htdocs/mattools/uploads/system_upload/FLPP/FLPP_2.csv'
INTO TABLE system_flpp
FIELDS TERMINATED BY ','  ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
-- (title,@expired_date,amount)
-- SET expired_date = STR_TO_DATE(@expired_date, '%m/%d/%Y');
(
  NAMA_PEMOHON,
  PEKERJAAN_PEMOHON,
  JENIS_KELAMIN,
  NO_KTP_PEMOHON,
  NPWP_PEMOHON,
  GAJI_POKOK,
  NAMA_PASANGAN,
  NO_KTP_PASANGAN,
  NO_REKENING_PEMOHON,
  TGL_AKAD,
  HARGA_RUMAH,
  NILAI_KPR,
  SUKU_BUNGA_KPR,
  TENOR,
  ANGSURAN_KPR,
  NILAI_FLPP,
  NAMA_PENGEMBANG,
  NAMA_PERUMAHAN,
  ALAMAT_AGUNAN,
  KOTA_AGUNAN,
  KODE_POS_AGUNAN,
  LUAS_TANAH,
  LUAS_BANGUNAN,
  @batch_id,
  @create_date,
  @month,
  @year,
  @is_generate 

)

  SET batch_id=001,
  create_date = CURRENT_TIMESTAMP,
  month = 12,
  year = 2019,
  is_generate = 0; 


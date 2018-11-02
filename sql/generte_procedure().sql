-- 1=======================

CALL clean_match(2018,1); -- IS_UPDATE=0
CALL generate_match(2018,1);
-- select count(*) from mismer_detail where BatchID=20181;
CALL clean_unmatch(2018,1);
CALL generate_unmatch(2018,1);
-- select count(*) from mismer_unmatch where BatchID=20181;



-- 2=======================
CALL clean_match(2018,2);
CALL generate_match(2018,2);
-- select count(*) from mismer_detail where BatchID=20182;
CALL clean_unmatch(2018,2);
CALL generate_unmatch(2018,2);
-- select count(*) from mismer_unmatch where BatchID=20182;



-- 3=======================
CALL clean_match(2018,3);
CALL generate_match(2018,3);
-- select count(*) from mismer_detail where BatchID=20183;
CALL clean_unmatch(2018,3);
CALL generate_unmatch(2018,3);
-- select count(*) from mismer_unmatch where BatchID=20183;

-- 4=======================
CALL clean_match(2018,4);
CALL generate_match(2018,4);
-- select count(*) from mismer_detail where BatchID=20184;
CALL clean_unmatch(2018,4);
CALL generate_unmatch(2018,4);
-- select count(*) from mismer_unmatch where BatchID=20184;



-- 5=======================
CALL clean_match(2018,5);
CALL generate_match(2018,5);
-- select count(*) from mismer_detail where BatchID=20185;
CALL clean_unmatch(2018,5);
CALL generate_unmatch(2018,5);
-- select count(*) from mismer_unmatch where BatchID=20185;



-- 6=======================
CALL clean_match(2018,6);
CALL generate_match(2018,6);
-- select count(*) from mismer_detail where BatchID=20186;
CALL clean_unmatch(2018,6);
CALL generate_unmatch(2018,6);
-- select count(*) from mismer_unmatch where BatchID=20186;



-- 7=======================
CALL clean_match(2018,7);
CALL generate_match(2018,7);
-- select count(*) from mismer_detail where BatchID=20187;
CALL clean_unmatch(2018,7);
CALL generate_unmatch(2018,7);
-- select count(*) from mismer_unmatch where BatchID=20181;



-- 8=======================
CALL clean_match(2018,8);
CALL generate_match(2018,8);
-- select count(*) from mismer_detail where BatchID=20188;
CALL clean_unmatch(2018,8);
CALL generate_unmatch(2018,8);
-- select count(*) from mismer_unmatch where BatchID=20188;



-- 9=======================
CALL clean_match(2018,9);
CALL generate_match(2018,9);
-- select count(*) from mismer_detail where BatchID=20189;
CALL clean_unmatch(2018,9);
CALL generate_unmatch(2018,9);
-- select count(*) from mismer_unmatch where BatchID=20189;



-- 10=======================
CALL clean_match(2018,10);
CALL generate_match(2018,10);
-- select count(*) from mismer_detail where BatchID=201810;
CALL clean_unmatch(2018,10);
CALL generate_unmatch(2018,10);
-- select count(*) from mismer_unmatch where BatchID=201810;





-- ==============
CREATE TABLE `mismer_bulk` (
  `kolom1` varchar(255) NOT NULL,
  `kolom2` varchar(255) NOT NULL,
  `kolom3` varchar(255) NOT NULL,
  `kolom4` varchar(255) NOT NULL,
  `kolom5` varchar(255) NOT NULL,
  `kolom6` varchar(255) NOT NULL,
  `kolom7` varchar(255) NOT NULL,
  `kolom8` varchar(255) NOT NULL,
  `kolom9` varchar(255) NOT NULL,
  `kolom10` varchar(255) NOT NULL,
  `kolom11` varchar(255) NOT NULL,
  `kolom12` varchar(255) NOT NULL,
  `kolom13` varchar(255) NOT NULL,
  `kolom14` varchar(255) NOT NULL,
  `kolom15` varchar(255) NOT NULL,
  `kolom16` varchar(255) NOT NULL,
  `kolom17` varchar(255) NOT NULL,
  `kolom18` varchar(255) NOT NULL,
  `kolom19` varchar(255) NOT NULL,
  `kolom20` varchar(255) NOT NULL,
  `kolom21` varchar(255) NOT NULL,
  `kolom22` varchar(255) NOT NULL,
  `kolom23` varchar(255) NOT NULL,
  `kolom24` varchar(255) NOT NULL,
  `kolom25` varchar(255) NOT NULL,
  `kolom26` varchar(255) NOT NULL,
  `kolom27` varchar(255) NOT NULL,
  `kolom28` varchar(255) NOT NULL,
  `kolom29` varchar(255) NOT NULL,
  `kolom30` varchar(255) NOT NULL,
  `kolom31` varchar(255) NOT NULL,
  `kolom32` varchar(255) NOT NULL,
  `kolom33` varchar(255) NOT NULL,
  `kolom34` varchar(255) NOT NULL,
  `kolom35` varchar(255) NOT NULL,
  `kolom36` varchar(255) NOT NULL,
  `kolom37` varchar(255) NOT NULL,
  `kolom38` varchar(255) NOT NULL,
  `kolom39` varchar(255) NOT NULL,
  `kolom40` varchar(255) NOT NULL,
  `kolom41` varchar(255) NOT NULL,
  `kolom42` varchar(255) NOT NULL,
  `kolom43` varchar(255) NOT NULL,
  `kolom44` varchar(255) NOT NULL,
  `kolom45` varchar(255) NOT NULL,
  `kolom46` varchar(255) NOT NULL,
  `kolom47` varchar(255) NOT NULL,
  `kolom48` varchar(255) NOT NULL,
  `kolom49` varchar(255) NOT NULL,
  `kolom50` varchar(255) NOT NULL,
  `kolom51` varchar(255) NOT NULL,
  `kolom52` varchar(255) NOT NULL,
  `kolom53` varchar(255) NOT NULL,
  `kolom54` varchar(255) NOT NULL,
  `kolom55` varchar(255) NOT NULL,
  `kolom56` varchar(255) NOT NULL,
  `kolom57` varchar(255) NOT NULL,
  `kolom58` varchar(255) NOT NULL,
  `kolom59` varchar(255) NOT NULL,
  `kolom60` varchar(255) NOT NULL,
  `kolom61` varchar(255) NOT NULL,
  `kolom62` varchar(255) NOT NULL,
  `kolom63` varchar(255) NOT NULL,
  `kolom64` varchar(255) NOT NULL,
  `kolom65` varchar(255) NOT NULL,
  `kolom66` varchar(255) NOT NULL,
  `kolom67` varchar(255) NOT NULL,
  `kolom68` varchar(255) NOT NULL,
  `kolom69` varchar(255) NOT NULL,
  `kolom70` varchar(255) NOT NULL,
  `kolom71` varchar(255) NOT NULL,
  `kolom72` varchar(255) NOT NULL,
  `kolom73` varchar(255) NOT NULL,
  `kolom74` varchar(255) NOT NULL,
  `kolom75` varchar(255) NOT NULL,
  `kolom76` varchar(255) NOT NULL,
  `kolom77` varchar(255) NOT NULL,
  `kolom78` varchar(255) NOT NULL,
  `kolom79` varchar(255) NOT NULL,
  `kolom80` varchar(255) NOT NULL,
  `kolom81` varchar(255) NOT NULL,
  `kolom82` varchar(255) NOT NULL,
  `kolom83` varchar(255) NOT NULL,
  `kolom84` varchar(255) NOT NULL,
  `kolom85` varchar(255) NOT NULL,
  `kolom86` varchar(255) NOT NULL,
  `kolom87` varchar(255) NOT NULL,
  `kolom88` varchar(255) NOT NULL,
  `kolom89` varchar(255) NOT NULL,
  `kolom90` varchar(255) NOT NULL,
  `kolom91` varchar(255) NOT NULL,
  `kolom92` varchar(255) NOT NULL,
  `kolom93` varchar(255) NOT NULL,
  `kolom94` varchar(255) NOT NULL,
  `kolom95` varchar(255) NOT NULL,
  `kolom96` varchar(255) NOT NULL,
  `kolom97` varchar(255) NOT NULL,
  `kolom98` varchar(255) NOT NULL,
  `kolom99` varchar(255) NOT NULL,
  `kolom100` varchar(255) NOT NULL,
  `kolom101` varchar(255) NOT NULL,
  `kolom102` varchar(255) NOT NULL,
  `kolom103` varchar(255) NOT NULL,
  `kolom104` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1

-- =====================================================

CREATE DEFINER=`root`@`localhost` PROCEDURE `generate_match`(IN Y_Generate INT(5),M_Generate INT(5))
BEGIN
 
-- SELECT *  FROM offices WHERE country = countryName;
 
 
 
 -- ======
 
-- select count(*) from mismer_detail
-- select count(*) from truncate mismer_detail
-- SET SQL_SAFE_UPDATES = 0;

-- delete  from mismer_detail where BatchID=concat('Y_Generate','M_Generate') ; 

 INSERT INTO  mismer_detail

SELECT 

NULL RowID,
concat(Y_Generate,M_Generate) BatchID,
STR_TO_DATE(concat(concat(20,SUBSTRING(a.kolom5,5,2)),'/',SUBSTRING(a.kolom5,3,2),'/',SUBSTRING(a.kolom5,1,2)), '%Y/%m/%d') as OPEN_DATE,
a.kolom2 as MID,
a.kolom3 as MERCHAN_DBA_NAME,
a.kolom4 as STATUS_EDC,
a.kolom12 as MSO,
a.kolom17 as SOURCE_CODE,
-- =======POS1
CASE
	WHEN CAST(a.kolom30  AS SIGNED) <= 100 THEN 1
	ELSE LEFT(CAST(a.kolom30  AS SIGNED),1)
END
AS
POS1,
-- ======WILAYAH
CASE
	WHEN LEFT(a.kolom12,1)='A' THEN 'WMD'
	WHEN LEFT(a.kolom12,1)='B' THEN 'WPD'
	WHEN LEFT(a.kolom12,1)='C' THEN 'WPL'
	WHEN LEFT(a.kolom12,1)='D' THEN 'WBN'
	WHEN LEFT(a.kolom12,1)='E' THEN 'WSM'
	WHEN LEFT(a.kolom12,1)='F' THEN 'WSY'
	WHEN LEFT(a.kolom12,1)='G' THEN 'WMK'
	WHEN LEFT(a.kolom12,1)='H' THEN 'WDR'
	WHEN LEFT(a.kolom12,1)='I' THEN 'WBJ'
	WHEN LEFT(a.kolom12,1)='J' THEN 'WMO'
	WHEN LEFT(a.kolom12,1)='K' THEN 'WPU'
	WHEN LEFT(a.kolom12,1)='L' THEN 'WJS'
	WHEN LEFT(a.kolom12,1)='M' THEN 'WJK'
	WHEN LEFT(a.kolom12,1)='N' THEN 'WJB'
	WHEN LEFT(a.kolom12,1)='O' THEN 'WJY'
	WHEN LEFT(a.kolom12,1)='R' THEN 'WYK'
	WHEN LEFT(a.kolom12,1)='S' THEN 'WMA'	
    
	WHEN SUBSTRING(a.kolom2,2,2)='01' THEN 'WMD'
	WHEN SUBSTRING(a.kolom2,2,2)='02' THEN 'WPD'
	WHEN SUBSTRING(a.kolom2,2,2)='03' THEN 'WPL'
	WHEN SUBSTRING(a.kolom2,2,2)='04' THEN 'WBN'
	WHEN SUBSTRING(a.kolom2,2,2)='05' THEN 'WSM'
	WHEN SUBSTRING(a.kolom2,2,2)='06' THEN 'WSY'
	WHEN SUBSTRING(a.kolom2,2,2)='07' THEN 'WMK'
	WHEN SUBSTRING(a.kolom2,2,2)='08' THEN 'WDR'
	WHEN SUBSTRING(a.kolom2,2,2)='09' THEN 'WBJ'
	WHEN SUBSTRING(a.kolom2,2,2)='10' THEN 'WJS'
	WHEN SUBSTRING(a.kolom2,2,2)='11' THEN 'WMO'
	WHEN SUBSTRING(a.kolom2,2,2)='12' THEN 'WJK'
	WHEN SUBSTRING(a.kolom2,2,2)='14' THEN 'WJB'
	WHEN SUBSTRING(a.kolom2,2,2)='15' THEN 'WJY'
	WHEN SUBSTRING(a.kolom2,2,2)='16' THEN 'WPU'
	WHEN SUBSTRING(a.kolom2,2,2)='17' THEN 'WYK'
	WHEN SUBSTRING(a.kolom2,2,2)='18' THEN 'WMA'    
  	ELSE NULL
END
as WILAYAH,
-- =======CHANNEL
CASE
	WHEN a.kolom3 like'%EXH%'  THEN 'EXH'
	WHEN LEFT(a.kolom2,1)=5 THEN 'SUPPORT'
	WHEN LEFT(a.kolom2,1)=8 THEN 'E-COMMERS'
	WHEN LEFT(a.kolom2,1)=9 THEN 'MPOS'
  -- 	ELSE '???'  -- ????????????????????
  	ELSE mc.Channel   
END
as CHANNEL,

 CASE
	WHEN LEFT(a.kolom2,1)='2'  THEN 'EDC'
	WHEN LEFT(a.kolom2,1)='3'  THEN 'YAP'
	WHEN LEFT(a.kolom2,1)='5'  THEN 'EBK'
	WHEN LEFT(a.kolom2,1)='8'  THEN 'EBK'
	WHEN LEFT(a.kolom2,1)='9'  THEN 'EBK'
  	ELSE '???'
END
as TYPE_MID

-- ,LEFT(a.kolom2,1) as MID
,NULL IS_MATCH
,0 IS_UPDATE
,null create_at
,null update_at


from mismer_bulk a
LEFT JOIN mso_channel mc ON a.kolom12=mc.MSO

WHERE LEFT(a.kolom2,1) IN (2,3,5,8,9)

 AND EXTRACT(YEAR FROM STR_TO_DATE(concat(concat(20,SUBSTRING(a.kolom5,5,2)),'/',SUBSTRING(a.kolom5,3,2),'/',SUBSTRING(a.kolom5,1,2)), '%Y/%m/%d') )=Y_Generate
AND EXTRACT(MONTH FROM STR_TO_DATE(concat(concat(20,SUBSTRING(a.kolom5,5,2)),'/',SUBSTRING(a.kolom5,3,2),'/',SUBSTRING(a.kolom5,1,2)), '%Y/%m/%d') )=M_Generate

-- AND  STR_TO_DATE(concat(concat(20,SUBSTRING(a.kolom5,5,2)),'/',SUBSTRING(a.kolom5,3,2),'/',SUBSTRING(a.kolom5,1,2)), '%Y/%m/%d') 
-- >='2010-10-01'

-- AND  STR_TO_DATE(concat(concat(20,SUBSTRING(a.kolom5,5,2)),'/',SUBSTRING(a.kolom5,3,2),'/',SUBSTRING(a.kolom5,1,2)), '%Y/%m/%d') 
-- <='2010-10-05'


-- LIMIT 100
 ;


 END
 
 -- ===================================================
 
 CREATE DEFINER=`root`@`localhost` PROCEDURE `generate_unmatch`(IN Y_Generate INT(5),M_Generate INT(5))
BEGIN

SET SQL_SAFE_UPDATES = 0;

-- DELETE  from mismer_detail where BatchID=concat(Y_Generate,M_Generate) ; 

 INSERT INTO mismer_unmatch

SELECT 
RowID,
BatchID,
OPEN_DATE,
MID,
MERCHAN_DBA_NAME,
STATUS_EDC,
MSO,
SOURCE_CODE,
POS1,
WILAYAH,
CHANNEL,
TYPE_MID,
0 IS_UPDATE,
null create_at,
null update_at

FROM mismer_detail
WHERE TYPE_MID='EDC'
AND CHANNEL IS NULL
AND IS_UPDATE=0
AND BatchID=concat(Y_Generate,M_Generate)

UNION ALL

SELECT 
RowID,
BatchID,
OPEN_DATE,
MID,
MERCHAN_DBA_NAME,
STATUS_EDC,
MSO,
SOURCE_CODE,
POS1,
WILAYAH,
CHANNEL,
TYPE_MID,
0 IS_UPDATE,
null create_at,
null update_at
FROM mismer_detail
WHERE TYPE_MID='YAP'
AND CHANNEL IS NULL 
AND WILAYAH IS NULL 
AND IS_UPDATE=0
AND BatchID=concat(Y_Generate,M_Generate)

;

 END
 -- ====================================================
 
 CREATE DEFINER=`root`@`localhost` PROCEDURE `clean_match`(IN Y_Generate INT(5),M_Generate INT(5))
BEGIN

SET SQL_SAFE_UPDATES = 0;

DELETE  from mismer_detail where BatchID=concat(Y_Generate,M_Generate) AND IS_UPDATE=0 ; 



 END
 -- ====================================================
 
 CREATE DEFINER=`root`@`localhost` PROCEDURE `clean_unmatch`(IN Y_Generate INT(5),M_Generate INT(5))
BEGIN

SET SQL_SAFE_UPDATES = 0;

DELETE  from mismer_unmatch where BatchID=concat(Y_Generate,M_Generate) AND IS_UPDATE=0 ; 



 END
 
 -- =====================================================
 
  SELECT *
FROM mismer_detail
LIMIT 100
-- INTO OUTFILE '/var/lib/mysql-files/orders.csv'
INTO OUTFILE 'C:/MISMER/mismer1.csv'
FIELDS TERMINATED BY ','
-- ENCLOSED BY '"'
LINES TERMINATED BY '\n';
select * from 
-- truncate 
mismer_bulk;

select count(*) from mismer_bulk;

-- EXEC CMD
LOAD DATA INFILE 'E:/MISMER BSK/15-10-2018/mismer1015.txt' INTO TABLE mismer_bulk FIELDS TERMINATED BY '|';
-- ==========================


SELECT 
REPLACE(kolom1,'"','') as ORG,
kolom2 as MID,
kolom3 as MERCHAN_DBA_NAME,
kolom4 as STATUS_EDC,
kolom5 as OPEN_DATE,
-- SUBSTRING(kolom5,1,2) as D, SUBSTRING(kolom5,3,2) as M, concat(20,SUBSTRING(kolom5,5,2)) as Y, 
STR_TO_DATE(concat(concat(20,SUBSTRING(kolom5,5,2)),'/',SUBSTRING(kolom5,3,2),'/',SUBSTRING(kolom5,1,2)), '%Y/%m/%d') as YMD,


kolom12 as MSO,
kolom30 as POS1
/*
CASE
	WHEN CAST(kolom30  AS SIGNED) <= 100 THEN 1
	ELSE LEFT(kolom30,1)
END
AS
POS1
*/
-- ,LEFT(kolom2,1) as MID
,NULL IS_MATCH
,null create_at
,null update_at


from mismer_bulk

WHERE LEFT(kolom2,1) IN (2,3,5,8,9)

AND EXTRACT(YEAR FROM STR_TO_DATE(concat(concat(20,SUBSTRING(kolom5,5,2)),'/',SUBSTRING(kolom5,3,2),'/',SUBSTRING(kolom5,1,2)), '%Y/%m/%d') )=2018

LIMIT 100
;




-- ================================


-- INSERT INTO mismer_detail

SELECT 

STR_TO_DATE(concat(concat(20,SUBSTRING(kolom5,5,2)),'/',SUBSTRING(kolom5,3,2),'/',SUBSTRING(kolom5,1,2)), '%Y/%m/%d') as OPEN_DATE,

kolom2 as MID,
kolom3 as MERCHAN_DBA_NAME,
kolom4 as STATUS_EDC,
kolom12 as MSO,
kolom17 as SOURCE_CODE,


kolom12 as MSO,
kolom30 as POS1,


CASE
	WHEN kolom30 <= 100 THEN 1
	ELSE LEFT(kolom30,1)
END
AS
POS1,
/*

CASE
	WHEN LEFT(a.MSO,1)='A' THEN 'WMD'
	WHEN LEFT(a.MSO,1)='B' THEN 'WPD'
	WHEN LEFT(a.MSO,1)='C' THEN 'WPL'
	WHEN LEFT(a.MSO,1)='D' THEN 'WBN'
	WHEN LEFT(a.MSO,1)='E' THEN 'WSM'
	WHEN LEFT(a.MSO,1)='F' THEN 'WSY'
	WHEN LEFT(a.MSO,1)='G' THEN 'WMK'
	WHEN LEFT(a.MSO,1)='H' THEN 'WDR'
	WHEN LEFT(a.MSO,1)='I' THEN 'WBJ'
	WHEN LEFT(a.MSO,1)='J' THEN 'WMO'
	WHEN LEFT(a.MSO,1)='K' THEN 'WPU'
	WHEN LEFT(a.MSO,1)='L' THEN 'WJS'
	WHEN LEFT(a.MSO,1)='M' THEN 'WJK'
	WHEN LEFT(a.MSO,1)='N' THEN 'WJB'
	WHEN LEFT(a.MSO,1)='O' THEN 'WJY'
	WHEN LEFT(a.MSO,1)='R' THEN 'WYK'
	WHEN LEFT(a.MSO,1)='S' THEN 'WMA'	
    
	WHEN SUBSTRING(a.MID,2,2)='01' THEN 'WMD'
	WHEN SUBSTRING(a.MID,2,2)='02' THEN 'WPD'
	WHEN SUBSTRING(a.MID,2,2)='03' THEN 'WPL'
	WHEN SUBSTRING(a.MID,2,2)='04' THEN 'WBN'
	WHEN SUBSTRING(a.MID,2,2)='05' THEN 'WSM'
	WHEN SUBSTRING(a.MID,2,2)='06' THEN 'WSY'
	WHEN SUBSTRING(a.MID,2,2)='07' THEN 'WMK'
	WHEN SUBSTRING(a.MID,2,2)='08' THEN 'WDR'
	WHEN SUBSTRING(a.MID,2,2)='09' THEN 'WBJ'
	WHEN SUBSTRING(a.MID,2,2)='10' THEN 'WJS'
	WHEN SUBSTRING(a.MID,2,2)='11' THEN 'WMO'
	WHEN SUBSTRING(a.MID,2,2)='12' THEN 'WJK'
	WHEN SUBSTRING(a.MID,2,2)='14' THEN 'WJB'
	WHEN SUBSTRING(a.MID,2,2)='15' THEN 'WJY'
	WHEN SUBSTRING(a.MID,2,2)='16' THEN 'WPU'
	WHEN SUBSTRING(a.MID,2,2)='17' THEN 'WYK'
	WHEN SUBSTRING(a.MID,2,2)='18' THEN 'WMA'    
    
-- 	WHEN LEFT(a.MSO,1)='' THEN 'BLANK'
  	ELSE NULL
END
as WILAYAH,

 CASE
	WHEN MERCHAN_DBA_NAME like'%EXH%'  THEN 'EXH'
  	ELSE mc.Channel 
END
as CHANNEL,

 CASE
	WHEN LEFT(a.MID,1)='3'  THEN 'YAP'
  	ELSE 'EDC'
END
as TYPE_MID
*/
,NULL IS_MATCH
,null create_at
,null update_at


FROM mismer_bulk -- a 
-- LEFT JOIN mso_channel mc ON a.MSO=mc.MSO

WHERE LEFT(kolom2,1) IN (2,3,5,8,9)

AND EXTRACT(YEAR FROM STR_TO_DATE(concat(concat(20,SUBSTRING(kolom5,5,2)),'/',SUBSTRING(kolom5,3,2),'/',SUBSTRING(kolom5,1,2)), '%Y/%m/%d') )=2018

LIMIT 100

;


-- ==============


CREATE TABLE mismer_bulk (
  
kolom1	 varchar(255) NOT NULL,
kolom2	 varchar(255) NOT NULL,
kolom3	 varchar(255) NOT NULL,
kolom4	 varchar(255) NOT NULL,
kolom5	 varchar(255) NOT NULL,
kolom6	 varchar(255) NOT NULL,
kolom7	 varchar(255) NOT NULL,
kolom8	 varchar(255) NOT NULL,
kolom9	 varchar(255) NOT NULL,
kolom10	 varchar(255) NOT NULL,
kolom11	 varchar(255) NOT NULL,
kolom12	 varchar(255) NOT NULL,
kolom13	 varchar(255) NOT NULL,
kolom14	 varchar(255) NOT NULL,
kolom15	 varchar(255) NOT NULL,
kolom16	 varchar(255) NOT NULL,
kolom17	 varchar(255) NOT NULL,
kolom18	 varchar(255) NOT NULL,
kolom19	 varchar(255) NOT NULL,
kolom20	 varchar(255) NOT NULL,
kolom21	 varchar(255) NOT NULL,
kolom22	 varchar(255) NOT NULL,
kolom23	 varchar(255) NOT NULL,
kolom24	 varchar(255) NOT NULL,
kolom25	 varchar(255) NOT NULL,
kolom26	 varchar(255) NOT NULL,
kolom27	 varchar(255) NOT NULL,
kolom28	 varchar(255) NOT NULL,
kolom29	 varchar(255) NOT NULL,
kolom30	 varchar(255) NOT NULL,
kolom31	 varchar(255) NOT NULL,
kolom32	 varchar(255) NOT NULL,
kolom33	 varchar(255) NOT NULL,
kolom34	 varchar(255) NOT NULL,
kolom35	 varchar(255) NOT NULL,
kolom36	 varchar(255) NOT NULL,
kolom37	 varchar(255) NOT NULL,
kolom38	 varchar(255) NOT NULL,
kolom39	 varchar(255) NOT NULL,
kolom40	 varchar(255) NOT NULL,
kolom41	 varchar(255) NOT NULL,
kolom42	 varchar(255) NOT NULL,
kolom43	 varchar(255) NOT NULL,
kolom44	 varchar(255) NOT NULL,
kolom45	 varchar(255) NOT NULL,
kolom46	 varchar(255) NOT NULL,
kolom47	 varchar(255) NOT NULL,
kolom48	 varchar(255) NOT NULL,
kolom49	 varchar(255) NOT NULL,
kolom50	 varchar(255) NOT NULL,
kolom51	 varchar(255) NOT NULL,
kolom52	 varchar(255) NOT NULL,
kolom53	 varchar(255) NOT NULL,
kolom54	 varchar(255) NOT NULL,
kolom55	 varchar(255) NOT NULL,
kolom56	 varchar(255) NOT NULL,
kolom57	 varchar(255) NOT NULL,
kolom58	 varchar(255) NOT NULL,
kolom59	 varchar(255) NOT NULL,
kolom60	 varchar(255) NOT NULL,
kolom61	 varchar(255) NOT NULL,
kolom62	 varchar(255) NOT NULL,
kolom63	 varchar(255) NOT NULL,
kolom64	 varchar(255) NOT NULL,
kolom65	 varchar(255) NOT NULL,
kolom66	 varchar(255) NOT NULL,
kolom67	 varchar(255) NOT NULL,
kolom68	 varchar(255) NOT NULL,
kolom69	 varchar(255) NOT NULL,
kolom70	 varchar(255) NOT NULL,
kolom71	 varchar(255) NOT NULL,
kolom72	 varchar(255) NOT NULL,
kolom73	 varchar(255) NOT NULL,
kolom74	 varchar(255) NOT NULL,
kolom75	 varchar(255) NOT NULL,
kolom76	 varchar(255) NOT NULL,
kolom77	 varchar(255) NOT NULL,
kolom78	 varchar(255) NOT NULL,
kolom79	 varchar(255) NOT NULL,
kolom80	 varchar(255) NOT NULL,
kolom81	 varchar(255) NOT NULL,
kolom82	 varchar(255) NOT NULL,
kolom83	 varchar(255) NOT NULL,
kolom84	 varchar(255) NOT NULL,
kolom85	 varchar(255) NOT NULL,
kolom86	 varchar(255) NOT NULL,
kolom87	 varchar(255) NOT NULL,
kolom88	 varchar(255) NOT NULL,
kolom89	 varchar(255) NOT NULL,
kolom90	 varchar(255) NOT NULL,
kolom91	 varchar(255) NOT NULL,
kolom92	 varchar(255) NOT NULL,
kolom93	 varchar(255) NOT NULL,
kolom94	 varchar(255) NOT NULL,
kolom95	 varchar(255) NOT NULL,
kolom96	 varchar(255) NOT NULL,
kolom97	 varchar(255) NOT NULL,
kolom98	 varchar(255) NOT NULL,
kolom99	 varchar(255) NOT NULL,
kolom100	 varchar(255) NOT NULL,
kolom101	 varchar(255) NOT NULL,
kolom102	 varchar(255) NOT NULL,
kolom103	 varchar(255) NOT NULL,
kolom104	 varchar(255) NOT NULL

)
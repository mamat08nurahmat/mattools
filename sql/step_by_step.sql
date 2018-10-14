-- ============STEP 1===================================

truncate temp_upload_mismer;

LOAD DATA INFILE 'C:/xampp/htdocs/mattools/uploads/system_upload/2-MISMER.csv' 
INTO TABLE temp_upload_mismer
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
 IGNORE 1 ROWS
(MID,MERCHAN_DBA_NAME,STATUS_EDC,@OPEN_DATE,MSO,SOURCE_CODE,POS1,IS_MATCH,BatchID,ID)
SET OPEN_DATE = STR_TO_DATE(@OPEN_DATE, '%m/%d/%Y')

;



-- ============STEP 2===================================
INSERT INTO mismer_detail

SELECT 
NULL RowID,
-- (SELECT max(BatchID) as BatchID FROM systemupload WHERE ApplicationSource='MISMER') BatchID, -- !!!
999 BatchID, -- dev

a.OPEN_DATE,
a.MID,
a.MERCHAN_DBA_NAME,
a.STATUS_EDC,
a.MSO,
a.SOURCE_CODE,

CASE
	WHEN a.POS1 <= 100 THEN 1
	ELSE LEFT(a.POS1,1)
END
AS
POS1,

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

,NULL IS_MATCH
,null create_at
,null update_at


FROM temp_upload_mismer a 
LEFT JOIN mso_channel mc ON a.MSO=mc.MSO

;

-- truncate mismer_detail
-- select * from mismer_detail where channel='EXH'



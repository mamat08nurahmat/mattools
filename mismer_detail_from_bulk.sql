SELECT 

null RowID,
null BatchID,
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
,null create_at
,null update_at


from mismer_bulk a
LEFT JOIN mso_channel mc ON a.kolom12=mc.MSO

WHERE LEFT(a.kolom2,1) IN (2,3,5,8,9)

AND EXTRACT(YEAR FROM STR_TO_DATE(concat(concat(20,SUBSTRING(a.kolom5,5,2)),'/',SUBSTRING(a.kolom5,3,2),'/',SUBSTRING(a.kolom5,1,2)), '%Y/%m/%d') )=2018
-- AND LEFT(a.kolom2,1)=8

 LIMIT 100
;

-- select * from mso_channel;
-- ======================================

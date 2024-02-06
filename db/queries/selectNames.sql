select line_id,line_text,file_name from sutta_pi      
  where line_id REGEXP '(an|sn|mn|dn)[0-9].*:0.[0-5]'  
  and ( line_text REGEXP '.*sutta.*'   
  or
   line_text REGEXP '.*vatthu.*' )
  and line_text not like '%vagg%'  
  and line_text not like '%peyyāla%'  

    union all  
SELECT line_id, line_text,file_name FROM sutta_pi  
where line_id REGEXP 'an[0-9].*' 
  and line_text REGEXP '^[0-9]* '   
  union all  
  
 select line_id,line_text,file_name from sutta_pi      
  where line_id REGEXP '(dhp)[0-9].*:0'  
  and 
   line_text REGEXP '.*vatthu.*' 
  and line_text not like '%vagg%'  
  and line_text not like '%peyyāla%'  
  
  union all
  
select line_id,line_text,file_name from sutta_pi      
  where line_id REGEXP '(thag|thig)[0-9].*:0.*'  
  and line_text REGEXP '.*gāthā.*' 
and line_text not Regexp '.*[0-9].*'

union all

SELECT line_id, TRIM(SUBSTR(line_text, INSTR(line_text, '.') + 1)) AS line_text,file_name
FROM sutta_pi
WHERE line_id REGEXP '(ud|ja|snp|iti)[0-9].*:0.*'
AND line_text REGEXP '.*(sutta|pucchā|jātaka).*'

union all

SELECT line_id, TRIM(SUBSTR(line_text, INSTR(line_text, '.') + 1)) AS line_text,file_name
FROM vinaya_pi
WHERE line_id REGEXP 'pli.*[0-9].*:0.*'
AND line_text REGEXP '.*(khandhaka|pada).*';

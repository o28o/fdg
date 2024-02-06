SELECT file_name, COUNT(*) as duplicate_count
FROM sutta_pi 
WHERE lower(line_text) REGEXP '.*(seyyathāpi|adhivacan|ūpama|opama|opamma).*'
AND lower(line_text) NOT REGEXP '(adhivacanasamphass|adhivacanapath|ekarūp|tathārūpa|āmarūpa|\brūpa|evarūpa|\banopam|\battūpa|\bnillopa|opamaññ)'
GROUP BY file_name
HAVING COUNT(*) > 0;

 /*saṅkhaṁ gacchat
 Evame
       4 an/an4/an4.112
      5 an/an4/an4.114
     10 an/an4/an4.139
      4 an/an4/an4.181
      4 an/an4/an4.259
      4 an/an4/an4.260
      4 an/an5/an5.138
      6 an/an5/an5.139
      3 an/an5/an5.140
      4 an/an5/an5.203
      4 an/an5/an5.45
      4 an/an6/an6.37
      4 an/an6/an6.5
      4 an/an6/an6.6
      4 an/an6/an6.7
      3 an/an8/an8.13
     12 dn/dn9
      2 kn/mil/mil5.1.4
      4 kn/mil/mil5.5.9
      1 kn/ne/ne15
      2 mn/mn125
      4 mn/mn28
      6 sn/sn35/sn35.97
      4 sn/sn42/sn42.1
      
       */
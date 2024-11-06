const records = [
"nom    sg      n      dukkha  -       dukkhaṃ",
"acc    sg      n      dukkha  -       dukkhaṃ",
"instr  sg      n      dukkha  -       dukkhena",
"dat    sg      n      dukkha  -       dukkhassa dukkhāya",
"abl    sg      n      dukkha  -       dukkhamhā dukkhasmā dukkhā",
"gen    sg      n      dukkha  -       dukkhassa",
"loc    sg      n      dukkha  -       dukkhamhi* dukkhasmiṃ dukkhe",
"voc    sg      n      dukkha  -       dukkha dukkhaṃ",
"in comps       n                dukkha  -       dukkha",

"nom    pl      n      dukkha  -       dukkhāni",
"acc    pl      n      dukkha  -       dukkhāni",
"instr  pl      n      dukkha  -      dukkhehi",
"dat    pl      n      dukkha  -       dukkhānaṃ",
"abl    pl      n      dukkha  -      dukkhehi",
"gen    pl      n      dukkha  -       dukkhānaṃ",
"loc    pl      n      dukkha  -       dukkhesu",
"voc    pl      n      dukkha  -       dukkhāni",  

"nom    sg      n       sacca   -       saccaṃ",
"acc    sg      n       sacca   -       saccaṃ",
"instr  sg      n       sacca   -       saccena",
"dat    sg      n       sacca   -       saccassa saccāya*",
"abl    sg      n       sacca   -       saccamhā* saccasmā* saccā",
"gen    sg      n       sacca   -       saccassa",
"loc    sg      n       sacca   -       saccamhi saccasmiṃ sacce",
"voc    sg      n       sacca   -       sacca saccaṃ",
"in comps      n                 sacca   -       sacca",
"nom    pl      n       sacca   -       saccāni",
"acc    pl      n       sacca   -       saccāni",
"instr  pl      n       sacca   -       saccehi",
"dat    pl      n       sacca   -       saccānaṃ",
"abl    pl      n       sacca   -       saccehi",
"gen    pl      n       sacca   -       saccānaṃ",
"loc    pl      n       sacca   -       saccesu",
"voc    pl      n       sacca   -       saccāni",

"nom    sg      f       bhūmi    -       bhūmi",
"acc    sg      f       bhūmi    -       bhūmiṃ",
"instr  sg      f       bhūmi    -       bhūmiyā",
"dat    sg      f       bhūmi    -       bhūmiyā",
"abl    sg      f       bhūmi    -       bhūmiyā",
"gen    sg      f       bhūmi    -       bhūmiyā",
"loc    sg      f       bhūmi    -       bhūmiyaṃ bhūmiyā",
"voc    sg      f       bhūmi    -       bhūmi",
"in comps       f                bhūmi    -       bhūmi",

"nom    pl      f       bhūmi    -       bhūmiyo bhūmī",
"acc    pl      f       bhūmi    -       bhūmiyo bhūmī",
"instr  pl      f       bhūmi    -       bhūmīhi",
"dat    pl      f       bhūmi    -       bhūmīnaṃ",
"abl    pl      f       bhūmi    -       bhūmīhi",
"gen    pl      f       bhūmi    -       bhūmīnaṃ",
"loc    pl      f       bhūmi    -       bhūmīsu",
"voc    pl      f       bhūmi    -       bhūmiyo bhūmī",

"nom    sg      f       jāti    -       jāti",
"acc    sg      f       jāti    -       jātiṃ",
"instr  sg      f       jāti    -       jaccā jātiyā",
"dat    sg      f       jāti    -       jaccā jātiyā",
"abl    sg      f       jāti    -       jaccā jātiyā",
"gen    sg      f       jāti    -       jaccā jātiyā",
"loc    sg      f       jāti    -       jaccaṃ jātiyaṃ jātiyā",
"voc    sg      f       jāti    -       jāti",
"in comps       f                jāti    -       jāti",

"nom    pl      f       jāti    -       jātiyo jātī",
"acc    pl      f       jāti    -       jātiyo jātī",
"instr  pl      f       jāti    -       jātīhi*",
"dat    pl      f       jāti    -       jātīnaṃ*",
"abl    pl      f       jāti    -       jātīhi*",
"gen    pl      f       jāti    -       jātīnaṃ*",
"loc    pl      f       jāti    -       jātisu jātīsu",
"voc    pl      f       jāti    -       jātiyo jātī",

"nom    sg      m       byādhi  -       byādhi",             
"acc    sg      m       byādhi  -       byādhiṃ",
"instr  sg      m       byādhi  -       byādhinā",
"dat    sg      m       byādhi  -       byādhino byādhissa",
"abl    sg      m       byādhi  -       byādhinā byādhimhā byādhismā",
"gen    sg      m       byādhi  -       byādhino",
"loc    sg      m       byādhi  -       byādhimhi byādhismiṃ*",
"voc    sg      m       byādhi  -       byādhi",
"in comps        m               byādhi  -       byādhi",
"nom    pl      m       byādhi  -       byādhayo byādhī",
"acc    pl      m       byādhi  -       byādhayo byādhī",
"instr  pl      m       byādhi  -       byādhibhi* byādhībhi* byādhīhi",
"dat    pl      m       byādhi  -       byādhinaṃ* byādhīnaṃ*",
"abl    pl      m       byādhi  -       byādhibhi* byādhībhi* byādhīhi",
"gen    pl      m       byādhi  -       byādhinaṃ* byādhīnaṃ*",
"loc    pl      m       byādhi  -       byādhisu* byādhīsu*",
"voc    pl      m       byādhi  -       byādhayo byādhī",

"nom    sg      m       yoga    -       yogo",
"acc    sg      m       yoga    -       yogaṃ",
"instr  sg      m       yoga    -       yogena",
"dat    sg      m       yoga    -       yogassa yogāya",
"abl    sg      m       yoga    -       yogamhā yogasmā* yogā",
"gen    sg      m       yoga    -       yogassa",
"loc    sg      m       yoga    -       yogamhi* yogasmiṃ yoge",
"voc    sg      m       yoga    -       yoga",
"in comps        m               yoga    -       yoga",      
"nom    pl      m       yoga    -       yogā",
"acc    pl      m       yoga    -       yoge",
"instr  pl      m       yoga    -       yogebhi* yogehi",
"dat    pl      m       yoga    -       yogānaṃ",
"abl    pl      m       yoga    -       yogebhi* yogehi",
"gen    pl      m       yoga    -       yogānaṃ",
"loc    pl      m       yoga    -       yogesu",             
"voc    pl      m       yoga    -       yogā",

"nom    sg      f       taṇhā   -       taṇhā",
"acc    sg      f       taṇhā   -       taṇhaṃ",
"instr  sg      f       taṇhā   -       taṇhā taṇhāya",
"dat    sg      f       taṇhā   -       taṇhāya",
"abl    sg      f       taṇhā   -       taṇhāya",
"gen    sg      f       taṇhā   -       taṇhāya",
"loc    sg      f       taṇhā   -       taṇhāya taṇhāyaṃ*",
"voc    sg      f       taṇhā   -       taṇhe",
"in comps       f                taṇhā   -       taṇhā",

"nom    pl      f       taṇhā   -       taṇhā taṇhāyo",
"acc    pl      f       taṇhā   -       taṇhā taṇhāyo",
"instr  pl      f       taṇhā   -       taṇhāhi",
"dat    pl      f       taṇhā   -       taṇhānaṃ",
"abl    pl      f       taṇhā   -       taṇhāhi",
"gen    pl      f       taṇhā   -       taṇhānaṃ",
"loc    pl      f       taṇhā   -       taṇhāsu",
"voc    pl      f       taṇhā   -       taṇhā taṇhāyo",

"nom    sg      n       cakkhu  -       cakkhu cakkhuṃ",
"acc    sg      n       cakkhu  -       cakkhu cakkhuṃ",
"instr  sg      n       cakkhu  -       cakkhunā",
"dat    sg      n       cakkhu  -       cakkhuno cakkhussa",
"abl    sg      n       cakkhu  -       cakkhunā",
"gen    sg      n       cakkhu  -       cakkhuno cakkhussa",
"loc    sg      n       cakkhu  -       cakkhumhi cakkhusmiṃ",
"voc    sg      n       cakkhu  -       cakkhu",
"in comps        n               cakkhu  -       cakkhu",

"nom    pl      n       cakkhu  -       cakkhū cakkhūni",
"acc    pl      n       cakkhu  -       cakkhū cakkhūni",
"instr  pl      n       cakkhu  -       cakkhūhi",
"dat    pl      n       cakkhu  -       cakkhūnaṃ",
"abl    pl      n       cakkhu  -       cakkhūhi",
"gen    pl      n       cakkhu  -       cakkhūnaṃ",
"loc    pl      n       cakkhu  -       cakkhūsu*",
"voc    pl      n       cakkhu  -       cakkhū cakkhūni",


"nom    sg      m       dhamma  -       dhammo",
"acc    sg      m       dhamma  -       dhammaṃ",
"instr  sg      m       dhamma  -       dhammena",
"dat    sg      m       dhamma  -       dhammassa dhammāya",
"abl    sg      m       dhamma  -       dhammamhā* dhammasmā* dhammā",
"gen    sg      m       dhamma  -       dhammassa",
"loc    sg      m       dhamma  -       dhammamhi* dhammasmiṃ dhamme",
"voc    sg      m       dhamma  -       dhamma",
"in comps       m                dhamma  -       dhamma",

"nom    pl      m       dhamma  -       dhammā",
"acc    pl      m       dhamma  -       dhamme",
"instr  pl      m       dhamma  -       dhammebhi* dhammehi",
"dat    pl      m       dhamma  -       dhammānaṃ",
"abl    pl      m       dhamma  -       dhammebhi* dhammehi",
"gen    pl      m       dhamma  -       dhammānaṃ",
"loc    pl      m       dhamma  -       dhammesu",
"voc    pl      m       dhamma  -       dhammā",

"nom    sg      f       dhātu   -       dhātu",
"acc    sg      f       dhātu   -       dhātuṃ",
"instr  sg      f       dhātu   -       dhātuyā",
"dat    sg      f       dhātu   -       dhātuyā",
"abl    sg      f       dhātu   -       dhātuyā",
"gen    sg      f       dhātu   -       dhātuyā",
"loc    sg      f       dhātu   -       dhātuyā dhātuyaṃ*",
"voc    sg      f       dhātu   -       dhātu",
"in comps       f                dhātu   -       dhātu",
"nom    pl      f       dhātu   -       dhātuyo dhātū",
"acc    pl      f       dhātu   -       dhātuyo dhātū",
"instr  pl      f       dhātu   -       dhātūhi",
"dat    pl      f       dhātu   -       dhātūnaṃ",
"abl    pl      f       dhātu   -       dhātūhi",
"gen    pl      f       dhātu   -       dhātūnaṃ",
"loc    pl      f       dhātu   -       dhātūsu",
"voc    pl      f       dhātu   -       dhātuyo dhātū",

"nom    sg      f       mātar   -       mātā",
"acc    sg      f       mātar   -       mātaraṃ",
"instr  sg      f       mātar   -       mātarā mātuyā",
"dat    sg      f       mātar   -       mātu mātuyā",
"abl    sg      f       mātar   -       mātarā mātuyā",
"gen    sg      f       mātar   -       mātu mātuyā",
"loc    sg      f       mātar   -       mātari mātuyaṃ* mātuyā",
"voc    sg      f       mātar   -       māta mātā",
"in comps               f       mātar   -       mātu",
"nom    pl      f       mātar   -       mātaro",
"acc    pl      f       mātar   -       mātaro",
"instr  pl      f       mātar   -       mātūhi*",
"dat    pl      f       mātar   -       mātūnaṃ*",
"abl    pl      f       mātar   -       mātūhi*",    
"gen    pl      f       mātar   -       mātūnaṃ*",
"loc    pl      f       mātar   -       mātūsu*",
"voc    pl      f       mātar   -       mātaro", 

"nom    sg      m       pitar   -       pitā",
"acc    sg      m       pitar   -       pitaraṃ",            
"instr  sg      m       pitar   -       pitarā pitunā",
"dat    sg      m       pitar   -       pitu pituno pitussa",
"abl    sg      m       pitar   -       pitarā",
"gen    sg      m       pitar   -       pitu pituno pitussa",
"loc    sg      m       pitar   -       pitari",
"voc    sg      m       pitar   -       pita pitā",
"in comps               m       pitar   -       pitu",
"nom    pl      m       pitar   -       pitaro",
"acc    pl      m       pitar   -       pitare* pitaro",
"instr  pl      m       pitar   -       pitūhi pitarehi",             
"dat    pl      m       pitar   -       pitunnaṃ pitūnaṃ",
"abl    pl      m       pitar   -       pitūhi pitarehi",
"gen    pl      m       pitar   -       pitunnaṃ pitūnaṃ",   
"loc    pl      m       pitar   -       pitaresu* pitūsu",
"voc    pl      m       pitar   -       pitaro",

"nom    sg      m       aggi    -       aggi",               
"acc    sg      m       aggi    -       aggiṃ",
"instr  sg      m       aggi    -       agginā",             
"dat    sg      m       aggi    -       aggino aggissa",
"abl    sg      m       aggi    -       agginā aggimhā* aggismā*",
"gen    sg      m       aggi    -       aggino aggissa",
"loc    sg      m       aggi    -       aggimhi aggismiṃ",
"voc    sg      m       aggi    -       aggi",
"in comps               m       aggi    -       aggi aggī",
"nom    pl      m       aggi    -       aggayo aggī",
"acc    pl      m       aggi    -       aggayo aggī",
"instr  pl      m       aggi    -       aggībhi* aggīhi",
"dat    pl      m       aggi    -       agginaṃ* aggīnaṃ",
"abl    pl      m       aggi    -       aggībhi* aggīhi",
"gen    pl      m       aggi    -       agginaṃ* aggīnaṃ",
"loc    pl      m       aggi    -       aggisu* aggīsu*",
"voc    pl      m       aggi    -       aggayo aggī",
                                                         
"nom    sg      m       attan   -       attā",
"acc    sg      m       attan   -       attānaṃ attaṃ",
"instr  sg      m       attan   -       attanā",      
"dat    sg      m       attan   -       attano",
"abl    sg      m       attan   -       attanā",
"gen    sg      m       attan   -       attano",
"loc    sg      m       attan   -       attani",
"voc    sg      m       attan   -       atta attā",
"in comps               m       attan   -       atta",
"nom    pl      m       attan   -       attāno",
"acc    pl      m       attan   -       attāno",
"instr  pl      m       attan   -       attanehi*",
"dat    pl      m       attan   -       attānaṃ",
"abl    pl      m       attan   -       attanehi*",
"gen    pl      m       attan   -       attānaṃ",
"loc    pl      m       attan   -       attanesu*",
"voc    pl      m       attan   -       attāno",

"nom    sg      m       brahman   -       brahmā",
"acc    sg      m       brahman   -       brahmānaṃ brahmaṃ",
"instr  sg      m       brahman   -       brahmanā brahmunā",      
"dat    sg      m       brahman   -       brahmuno",
"abl    sg      m       brahman   -       brahmanā brahmunā",
"gen    sg      m       brahman   -       brahmuno",
"loc    sg      m       brahman   -       brahmani",
"voc    sg      m       brahman   -       brahme",
"in comps               m       brahman   -       brahma",
"nom    pl      m       brahman   -       brahmāno",
"acc    pl      m       brahman   -       brahmāno",
"instr  pl      m       brahman   -       brahmehi*",
"dat    pl      m       brahman   -       brahmānaṃ brahmūnaṃ",
"abl    pl      m       brahman   -       brahmehi*",
"gen    pl      m       brahman   -       brahmānaṃ brahmūnaṃ",
"loc    pl      m       brahman   -       brahmesu*",
"voc    pl      m       brahman   -       brahmāno",

"nom    sg      m       rājan   -       rājā",
"acc    sg      m       rājan   -       rājānaṃ rājaṃ",
"instr  sg      m       rājan   -       raññā rājinā",      
"dat    sg      m       rājan   -       rañño rājino rājassa",
"abl    sg      m       rājan   -       raññā rājinā",
"gen    sg      m       rājan   -       rañño rājino rājassa",
"loc    sg      m       rājan   -       raññi",
"voc    sg      m       rājan   -       rāja rājā",
"in comps               m       rājan   -       rāja",
"nom    pl      m       rājan   -       rājāno",
"acc    pl      m       rājan   -       rājāno",
"instr  pl      m       rājan   -       rājūhi rājehi",
"dat    pl      m       rājan   -       raññaṃ rājūnaṃ",
"abl    pl      m       rājan   -       rājūhi rājehi",
"gen    pl      m       rājan   -       raññaṃ rājūnaṃ",
"loc    pl      m       rājan   -       rājūsu",
"voc    pl      m       rājan   -       rājāno",

"nom    sg      n       aṭṭhi   -       aṭṭhi aṭṭhiṃ",
"acc    sg      n       aṭṭhi   -       aṭṭhi aṭṭhiṃ",
"instr  sg      n       aṭṭhi   -       aṭṭhinā*",
"dat    sg      n       aṭṭhi   -       aṭṭhino* aṭṭhissa*",
"abl    sg      n       aṭṭhi   -       aṭṭhinā* aṭṭhimhā* aṭṭhismā*",
"gen    sg      n       aṭṭhi   -       aṭṭhino* aṭṭhissa*",    
"loc    sg      n       aṭṭhi   -       aṭṭhimhi aṭṭhismiṃ*",
"voc    sg      n       aṭṭhi   -       aṭṭhi",
"in comps               n       aṭṭhi   -       aṭṭhi",      
"nom    pl      n       aṭṭhi   -       aṭṭhī aṭṭhīni",
"acc    pl      n       aṭṭhi   -       aṭṭhī aṭṭhīni",      
"instr  pl      n       aṭṭhi   -       aṭṭhibhi* aṭṭhīhi",
"dat    pl      n       aṭṭhi   -       aṭṭhīnaṃ",           
"abl    pl      n       aṭṭhi   -       aṭṭhibhi* aṭṭhīhi",
"gen    pl      n       aṭṭhi   -       aṭṭhīnaṃ",           
"loc    pl      n       aṭṭhi   -       aṭṭhisu* aṭṭhīsu*",
"voc    pl      n       aṭṭhi   -       aṭṭhī aṭṭhīni",

"nom    sg      m       bhagavant       -       bhagavanto bhagavā",
"acc    sg      m       bhagavant       -       bhagavantaṃ",
"instr  sg      m       bhagavant       -       bhagavatā",
"dat    sg      m       bhagavant       -       bhagavato",
"abl    sg      m       bhagavant       -       bhagavatā bhagavato",
"gen    sg      m       bhagavant       -       bhagavato",
"loc    sg      m       bhagavant       -       bhagavati",
"voc    sg      m       bhagavant       -       bhagavā bhagava",
"in comps               m       bhagavant       -       bhagava(t) bhagavanta",
"nom    pl      m       bhagavant       -       bhagavanto",
"acc    pl      m       bhagavant       -       bhagavanto bhagavante*",
"instr  pl      m       bhagavant       -       bhagavantehi*",
"dat    pl      m       bhagavant       -       bhagavataṃ* bhagavantānaṃ",
"abl    pl      m       bhagavant       -       bhagavantehi*",
"gen    pl      m       bhagavant       -       bhagavataṃ* bhagavantānaṃ",
"loc    pl      m       bhagavant       -       bhagavantesu*",
"voc    pl      m       bhagavant       -       bhagavantā* bhagavanto",

"nom    sg      m       bhavant       -       bhavaṃ",
"acc    sg      m       bhavant       -       bhavantaṃ",
"instr  sg      m       bhavant       -       bhotā",
"dat    sg      m       bhavant       -       bhoto",
"abl    sg      m       bhavant       -      *",
"gen    sg      m       bhavant       -       bhoto",
"loc    sg      m       bhavant       -      *",
"voc    sg      m       bhavant       -       bhavaṃ bho",
"in comps               m       bhavant       -   bhava(t)",
"nom    pl      m       bhavant       -       bhavanto bhonto",
"acc    pl      m       bhavant       -       bhavante",
"instr  pl      m       bhavant       -       bhavantehi",
"dat    pl      m       bhavant       -       bhavataṃ bhavantānaṃ",
"abl    pl      m       bhavant       -      *",
"gen    pl      m       bhavant       -       bhagavataṃ* bhagavantānaṃ",
"loc    pl      m       bhavant       -      *",
"voc    pl      m       bhavant       -       bhonto",

"nom    sg      m       sukhin  -       sukhī",
"acc    sg      m       sukhin  -       sukhinaṃ* sukhiṃ",
"instr  sg      m       sukhin  -       sukhinā",
"dat    sg      m       sukhin  -       sukhino sukhissa*",   
"abl    sg      m       sukhin  -       sukhinā* sukhimhā* sukhismā",
"gen    sg      m       sukhin  -       sukhino sukhissa*",
"loc    sg      m       sukhin  -       sukhini* sukhimhi* sukhismiṃ*",
"voc    sg      m       sukhin  -       sukhi",
"in comps               m       sukhin  -       sukhi",
"nom    pl      m       sukhin  -       sukhino sukhī",
"acc    pl      m       sukhin  -       sukhino sukhī",
"instr  pl      m       sukhin  -       sukhīhi",
"dat    pl      m       sukhin  -       sukhīnaṃ*",
"abl    pl      m       sukhin  -       sukhibhi* sukhīhi",
"gen    pl      m       sukhin  -       sukhīnaṃ*",
"loc    pl      m       sukhin  -       sukhīsu*",
"voc    pl      m       sukhin  -       sukhino sukhī",

"nom    sg      m       satthar -       satthā",
"acc    sg      m       satthar -       satthāraṃ",
"instr  sg      m       satthar -       satthārā satthunā*",
"dat    sg      m       satthar -       satthu satthuno satthussa",
"abl    sg      m       satthar -       satthārā",
"gen    sg      m       satthar -       satthu satthuno satthussa",
"loc    sg      m       satthar -       satthari",
"voc    sg      m       satthar -       sattha satthā satthe",
"in comps               m       satthar -       sattha satthu",
"nom    pl      m       satthar -       satthāro",
"acc    pl      m       satthar -       satthāre satthāro",
"instr  pl      m       satthar -       satthārehi* satthūhi*",
"dat    pl      m       satthar -       satthānaṃ satthārānaṃ satthūnaṃ",
"abl    pl      m       satthar -       satthārehi* satthubhi*",
"gen    pl      m       satthar -       satthānaṃ satthārānaṃ satthūnaṃ",
"loc    pl      m       satthar -       satthāresu* satthūsu",
"voc    pl      m       satthar -       satthāro",

"nom    sg      m       gacchant        -       gacchanto gacchaṃ",
"acc    sg      m       gacchant        -       gacchantaṃ",
"instr  sg      m       gacchant        -       gacchatā gacchantena",
"dat    sg      m       gacchant        -       gacchato",
"abl    sg      m       gacchant        -       gacchatā",
"gen    sg      m       gacchant        -       gacchato gacchantassa",
"loc    sg      m       gacchant        -       gacchati gacchante",
"voc    sg      m       gacchant        -       gacchaṃ gacchanta",

"nom    pl      m       gacchant        -       gacchantā gacchanto",
"acc    pl      m       gacchant        -       gacchante gacchanto",
"instr  pl      m       gacchant        -       gacchantehi*",
"dat    pl      m       gacchant        -       gacchataṃ gacchantānaṃ",
"abl    pl      m       gacchant        -       gacchantehi*",
"gen    pl      m       gacchant        -       gacchataṃ gacchantānaṃ",
"loc    pl      m       gacchant        -       gacchantesu",
"voc    pl      m       gacchant        -       gacchantā gacchanto",

"nom    sg      mn       manas   -       mano manaṃ",
"acc    sg      mn       manas   -       mano manaṃ",
"instr  sg      mn       manas   -       manasā manena",
"dat    sg      mn       manas   -       manaso manassa",
"abl    sg      mn       manas   -       manasā manamhā*  manasmā",
"gen    sg      mn       manas   -       manaso manassa",
"loc    sg      mn       manas   -       manasi manamhi manasmiṃ mane",
"voc    sg      mn       manas   -       mano manaṃ",
"in comps               m       manas   -       mana mano",
"nom    pl      mn       manas   -       manā manāni",
"acc    pl      mn       manas   -       mane manāni",
"instr  pl      mn       manas   -       manehi",
"dat    pl      mn       manas   -       manānaṃ*",
"abl    pl      mn       manas   -       manehi",
"gen    pl      mn       manas   -       manānaṃ*",
"loc    pl      mn       manas   -       manesu",
"voc    pl      mn       manas   -       manāni",

"nom    sg      m       viññū   -       viññū",
"acc    sg      m       viññū   -       viññuṃ",
"instr  sg      m       viññū   -       viññunā",
"dat    sg      m       viññū   -       viññuno*",
"abl    sg      m       viññū   -       viññunā",
"gen    sg      m       viññū   -       viññuno* viññussa",
"loc    sg      m       viññū   -       viññumhi* viññusmiṃ*",
"voc    sg      m       viññū   -       viññū",
"in comps               m       viññū   -       viññu viññū",
"nom    pl      m       viññū   -       viññuno* viññū viññūno*",
"acc    pl      m       viññū   -       viññuno* viññū viññūno*",
"instr  pl      m       viññū   -       viññūhi",
"dat    pl      m       viññū   -       viññūnaṃ",
"abl    pl      m       viññū   -       viññūhi",
"gen    pl      m       viññū   -       viññūnaṃ",
"loc    pl      m       viññū   -       viññūsu",
"voc    pl      m       viññū   -       viññuno* viññū",

"nom    sg   m   sīlavant        -       sīlavanto sīlavā",
"acc    sg   m   sīlavant        -       sīlavantaṃ sīlavaṃ",
"instr  sg   m   sīlavant        -       sīlavatā sīlavantena",
"dat    sg   m   sīlavant        -       sīlavato sīlavantassa",
"abl    sg   m   sīlavant        -       sīlavatā sīlavantasmā sīlavantamhā",
"gen    sg   m   sīlavant        -       sīlavato sīlavantassa",
"loc    sg   m   sīlavant        -       sīlavati sīlavante sīlavantamhi sīlavantasmiṃ",
"voc    sg   m   sīlavant        -       sīlava sīlavā sīlavanta",
"in comps m sīlavant        -       sīlava sīlavanta",
"nom    pl  m    sīlavant        -       sīlavanto sīlavantā",
"acc    pl  m    sīlavant        -       sīlavanto sīlavante",
"instr  pl  m    sīlavant        -       sīlavantehi",
"dat    pl  m    sīlavant        -       sīlavataṃ sīlavantānaṃ",
"abl    pl  m   sīlavant        -       sīlavantehi",
"gen    pl  m    sīlavant        -       sīlavataṃ sīlavantānaṃ",
"loc    pl  m    sīlavant        -       sīlavantesu",
"voc    pl  m    sīlavant        -        sīlavanto sīlavantā",

"nom    sg   m   āyasmant        -       āyasmanto āyasmā",
"acc    sg   m   āyasmant        -       āyasmantaṃ",
"instr  sg   m   āyasmant        -       āyasmatā",
"dat    sg   m   āyasmant        -       āyasmato",
"abl    sg   m   āyasmant        -       āyasmatā āyasmantā",
"gen    sg   m   āyasmant        -       āyasmato",
"loc    sg   m   āyasmant        -       āyasmante",
"voc    sg   m   āyasmant        -       āyasma āyasmā",
"in comps m āyasmant        -       āyasma āyasmanta",
"nom    pl  m    āyasmant        -       āyasmantā āyasmanto āyasmā",
"acc    pl  m    āyasmant        -       āyasmanto āyasmante",
"instr  pl  m    āyasmant        -       āyasmantehi",
"dat    pl  m    āyasmant        -       āyasmantānaṃ",
"abl    pl  m   āyasmant        -       āyasmantehi",
"gen    pl  m    āyasmant        -       āyasmantānaṃ",
"loc    pl  m    āyasmant        -       āyasmantesu",
"voc    pl  m    āyasmant        -       āyasmantā āyasmanto",

"nom    sg   m   bhikkhu -       bhikkhu",
"acc    sg   m   bhikkhu -       bhikkhuṃ",
"instr  sg   m   bhikkhu -       bhikkhunā",
"dat    sg   m   bhikkhu -       bhikkhuno bhikkhussa",
"abl    sg   m   bhikkhu -       bhikkhunā bhikkhumhā* bhikkhusmā*",
"gen    sg   m   bhikkhu -       bhikkhuno bhikkhussa",
"loc    sg   m   bhikkhu -       bhikkhumhi bhikkhusmiṃ",
"voc    sg   m   bhikkhu -       bhikkhu",
"in comps   m            bhikkhu -       bhikkhu",
"nom    pl   m   bhikkhu        -       bhikkhavo bhikkhū",
"acc    pl   m   bhikkhu        -       bhikkhavo bhikkhū",
"instr  pl   m   bhikkhu        -       bhikkhūhi",
"dat    pl   m   bhikkhu        -       bhikkhunaṃ bhikkhūnaṃ",
"abl    pl   m   bhikkhu        -       bhikkhūhi",
"gen    pl   m   bhikkhu        -       bhikkhunaṃ bhikkhūnaṃ",
"loc    pl   m   bhikkhu        -       bhikkhusu bhikkhūsu",
"voc    pl   m   bhikkhu        -       bhikkhave (only in case of bhikkhu) bhikkhavo bhikkhū",

"nom    sg   f   bhikkhunī       -       bhikkhunī",
"acc    sg   f   bhikkhunī       -       bhikkhuniṃ",
"instr  sg   f   bhikkhunī       -       bhikkhuniyā",
"dat    sg   f   bhikkhunī       -       bhikkhuniyā",
"abl    sg   f   bhikkhunī       -      bhikkhuniyā",
"gen    sg   f   bhikkhunī       -       bhikkhuniyā",
"loc    sg   f   bhikkhunī       -       bhikkhuniyā bhikkhuniyaṃ*",
"voc    sg   f   bhikkhunī       -       bhikkhuni bhikkhunī",
"in comps   f            bhikkhunī       -       bhikkhuni bhikkhunī",

"nom    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",
"acc    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",
"instr  pl  f    bhikkhunī      -         bhikkhunīhi bhikkhunībhi*",
"dat    pl  f    bhikkhunī      -         bhikkhunīnaṃ",
"abl    pl  f    bhikkhunī      -         bhikkhunīhi bhikkhunībhi*",
"gen    pl  f    bhikkhunī      -         bhikkhunīnaṃ",
"loc    pl  f    bhikkhunī      -         bhikkhunīsu",
"voc    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",

"nom    sg  f   ayyā    -       ayyā",
"acc    sg  f   ayyā    -       ayyaṃ",
"instr  sg  f   ayyā    -       ayyāya",
"dat    sg  f   ayyā    -       ayyāya",
"abl    sg  f   ayyā    -       ayyāya",
"gen    sg  f   ayyā    -       ayyāya",
"loc    sg  f   ayyā    -       ayyāya ayyāyaṃ",
"voc    sg  f   ayyā    -       ayye",
"in comps   f    ayyā    -       ayya ayyā",

"nom    pl  f    ayyā     -       ayyā ayyāyo",
"acc    pl  f    ayyā     -       ayyā ayyāyo",
"instr  pl  f    ayyā     -       ayyāhi",
"dat    pl  f    ayyā     -       ayyānaṃ",
"abl    pl  f    ayyā     -       ayyāhi",
"gen    pl  f    ayyā     -       ayyānaṃ",
"loc    pl  f    ayyā     -       ayyāsu*",
"voc    pl  f    ayyā     -       ayyā ayyāyo"
];
    document.getElementById("numberOnlyCheckbox").checked = true;
            
let modifiedRecords = [...records]; // Изначально копируем записи
let currentIndex; // Индекс текущей записи

const uniqueWords = new Set();

// Извлечение уникальных слов перед символом '-'
const displaySet = new Set();

records.forEach(record => {
    // Проверяем, содержит ли строка 'comps' и пропускаем её, если содержит
    if (record.includes('comps')) return;

    const words = record.split('-')[0].trim().split(/\s+/); // Разбиваем до '-'
    
    if (words.length >= 2) {
        const name = words[words.length - 1]; // Последнее слово перед '-'
        const category = words[words.length - 2]; // Предпоследнее слово перед '-'
        
        // Добавляем в displaySet для отображения
        displaySet.add(`${name} (${category})`);
        
        // Оригинальное значение добавляем в исходный Set
        uniqueWords.add(name);
    } else {
        console.warn("Не удалось извлечь слова перед '-':", record);
    }
});

// Выводим только displaySet для пользователя
console.log([...displaySet]); // Выводим преобразованные строки без 'comps'

const checkboxContainer = document.getElementById('checkboxContainer');

const displayMap = {}; // Объект для сопоставления оригинальных значений и отображаемых названий

// Создаем `displayMap` на основе `displaySet` и `uniqueWords`
const uniqueArray = Array.from(uniqueWords);
const displayArray = Array.from(displaySet);

uniqueArray.forEach((word, index) => {
    displayMap[word] = displayArray[index]; // Сопоставляем оригинальное значение с форматированным
});

// Создание контейнера для ссылок
const actionsDiv = document.createElement('div');
actionsDiv.className = 'checkbox-actions mb-2';

// Создание ссылки "Очистить все"
const clearAllLink = document.createElement('a');
clearAllLink.href = '#';
clearAllLink.className = 'btn-sm btn-secondary text-decoration-none';
clearAllLink.innerText = 'Очистить все';
clearAllLink.addEventListener('click', (event) => {
    event.preventDefault();
    document.querySelectorAll('.wordCheckbox').forEach(checkbox => {
        checkbox.checked = false;
        localStorage.setItem(checkbox.id, false); // Обновление localStorage
    });
    updateRecords(); // Обновление записей
});

// Создание ссылки "Выбрать все"
const selectAllLink = document.createElement('a');
selectAllLink.href = '#';
selectAllLink.innerText = 'Выбрать все';
selectAllLink.className = 'btn-sm btn-primary text-decoration-none ms-1';
//selectAllLink.style.marginLeft = '10px';
selectAllLink.addEventListener('click', (event) => {
    event.preventDefault();
    document.querySelectorAll('.wordCheckbox').forEach(checkbox => {
        checkbox.checked = true;
        localStorage.setItem(checkbox.id, true); // Обновление localStorage
    });
    updateRecords(); // Обновление записей
});

// Добавление ссылок в контейнер
actionsDiv.appendChild(clearAllLink);
actionsDiv.appendChild(selectAllLink);
checkboxContainer.appendChild(actionsDiv); // Добавление контейнера с ссылками в `checkboxContainer`

// Генерация чекбоксов
uniqueWords.forEach(word => {
    const checkboxDiv = document.createElement('div');
    checkboxDiv.className = 'form-check';

    const checkbox = document.createElement('input');
    checkbox.className = 'form-check-input wordCheckbox';
    checkbox.type = 'checkbox';
    checkbox.id = word;

    // Установка состояния чекбокса из localStorage
    const savedState = localStorage.getItem(word);
    checkbox.checked = savedState !== null ? JSON.parse(savedState) : true; // По умолчанию включен

    const label = document.createElement('label');
    label.className = 'form-check-label';
    label.htmlFor = word;

    // Используем отображаемое название из `displayMap`
    label.innerText = displayMap[word] || word;

    checkboxDiv.appendChild(checkbox);
    checkboxDiv.appendChild(label);
    checkboxContainer.appendChild(checkboxDiv);

    // Добавление обработчика события на чекбокс
    checkbox.addEventListener('change', () => {
        localStorage.setItem(word, checkbox.checked); // Сохранение состояния чекбокса
        updateRecords(); // Обновляем записи при изменении состояния чекбоксов
    });
});

// Функция для обновления modifiedRecords в зависимости от состояния чекбоксов
function updateRecords() {
    const selectedWords = Array.from(uniqueWords).filter(word => {
        const checkbox = document.getElementById(word);
        return checkbox.checked; // Проверяем, активен ли чекбокс
    });

    // Фильтруем records по выбранным словам
    modifiedRecords = records.filter(record => {
        const word = record.split('-')[0].trim().split(' ').pop();
        return selectedWords.includes(word);
    });

    // Обновляем отображение записей
    if (modifiedRecords.length === 0) {
        document.getElementById("randomRecord").textContent = "Не выбрано ни одного слова";
    } else {
        currentIndex = getRandomIndex(modifiedRecords.length); // Генерируем индекс из отфильтрованных записей
        showRecord(currentIndex); // Отображаем новую запись
    }
}

// Функция для генерации случайного числа
function getRandomIndex(max) {
    return Math.floor(Math.random() * max);
}

// Функция для отображения записи
function showRecord(index) {
    const randomRecord = modifiedRecords[index];
    document.getElementById("randomRecord").textContent = randomRecord.replace(/\*/g, '') || "Не выбрано ни одного слова";
}

// Обработчик нажатия кнопки для отображения случайной записи
document.getElementById("randomButton").addEventListener("click", () => {
    if (modifiedRecords.length > 0) {
        currentIndex = getRandomIndex(modifiedRecords.length);
        document.getElementById('numberOnlyCheckbox').checked = true; // Установить в checked
        showRecord(currentIndex);
    }
});

// Инициализация отображения
updateRecords(); // Начинаем с фильтрации и отображения записей

document.getElementById("showAnswerButton").addEventListener("click", () => {
        document.getElementById('numberOnlyCheckbox').checked = false; // Установить в unchecked
        updateDisplay();
});

function showAllDeclensions() {
    const currentRecord = document.getElementById("randomRecord").textContent;

    console.log("Текущая запись:", currentRecord);

    if (currentRecord && currentRecord !== "Не выбрано ни одного слова") {
        const parts = currentRecord.split(/\s+/);
        console.log("Части записи:", parts);

        const partOfSpeech = parts[2]; // Часть речи
        const word = parts[3]; // Слово после пробела
        console.log("Часть речи:", partOfSpeech);
        console.log("Слово:", word);

        // Ищем общее слово (до знака '-') из записей records
        const matchingRecords = records.filter(record => {
            const recordParts = record.split(/\s+/);
            const recordKeyWord = recordParts[3]; // Слово до знака '-'

            // Ищем только если запись содержит '-' и если слово до него совпадает
            return recordKeyWord === word && partOfSpeech === recordParts[2];
        });

        console.log("Совпадающие записи:", matchingRecords);

        // Создаем заголовок и таблицу
        const declensionsOutput = document.getElementById("declensionsOutput");
        declensionsOutput.innerHTML = ''; // Очищаем предыдущее содержимое

        if (matchingRecords.length > 0) {
            // Заголовок
            const button = document.createElement("a");
            button.href = "#";
            button.className = "highlightMatches text-decoration-none btn-sm btn-primary mb-3";
            button.textContent = "Выделить";
            button.onclick = function() {
                declensionsOutput.classList.toggle("highlighted");
                highlightDeclensions(); // Перезапуск функции с переключением подсветки
            };
            declensionsOutput.insertBefore(button, declensionsOutput.firstChild);

            const header = document.createElement("h4");
            header.className = "mt-3";
            header.textContent = `${word} (${partOfSpeech})`;
            declensionsOutput.appendChild(header);
            
            // Создаем объект для хранения склонений по падежам
            const declensionsByCase = {};

            matchingRecords.forEach(record => {
                const recordParts = record.split(/\s+/);
                const caseName = recordParts[0]; // Падеж
                const number = recordParts[1]; // Число
                const declensionForms = recordParts.slice(5).join(" "); // Слово начиная с 6 позиции

                // Если встречаем "in comps", помещаем его как отдельный падеж
                if (caseName === "in" && number === "comps") {
                    if (!declensionsByCase["in comps"]) {
                        declensionsByCase["in comps"] = { sg: "", pl: "" };
                    }
                    declensionsByCase["in comps"].sg += declensionForms + " ";
                } else {
                    // Инициализируем объект для падежа, если его нет
                    if (!declensionsByCase[caseName]) {
                        declensionsByCase[caseName] = { sg: "", pl: "" };
                    }

                    // Добавляем форму склонения для соответствующего числа (sg или pl)
                    if (number === "sg") {
                        declensionsByCase[caseName].sg += declensionForms + " ";
                    } else if (number === "pl") {
                        declensionsByCase[caseName].pl += declensionForms + " ";
                    }
                }
            });

            // Создаем таблицу
            const table = document.createElement("table");
//table.classList.add("table", "table-bordered"); // Добавляем классы Bootstrap            
            const tbody = document.createElement("tbody");



            // Заголовок таблицы (падежи)
            const headerRow = document.createElement("tr");
            const caseHeader = document.createElement("th");
            caseHeader.textContent = "";
            headerRow.appendChild(caseHeader);

            const sgHeader = document.createElement("th");
            sgHeader.textContent = "sg";
            headerRow.appendChild(sgHeader);

            const plHeader = document.createElement("th");
            plHeader.textContent = "pl";
            headerRow.appendChild(plHeader);

            tbody.appendChild(headerRow);

            // Добавляем строки для каждого падежа
            Object.keys(declensionsByCase).forEach(caseName => {
                const row = document.createElement("tr");

                // Падеж
                const caseCell = document.createElement("td");
                caseCell.textContent = caseName;
                row.appendChild(caseCell);

                // Число sg
                const sgCell = document.createElement("td");
                sgCell.textContent = declensionsByCase[caseName].sg.trim();
                row.appendChild(sgCell);

                // Число pl
                const plCell = document.createElement("td");
                plCell.textContent = declensionsByCase[caseName].pl.trim();
                row.appendChild(plCell);

                tbody.appendChild(row);
            });

            table.appendChild(tbody);
            declensionsOutput.appendChild(table);

            // Обрабатываем ячейки таблицы
            const cells = table.getElementsByTagName("td");
            for (const cell of cells) {
                // Проверяем, содержит ли ячейка символ "*"
                if (cell.textContent.includes("*")) {
                    // Заменяем "*" на обернутый вариант с классом "text-muted"
                    cell.innerHTML = cell.innerHTML.replace(/\*/g, '<span class="text-muted">*</span>');
                }
            }

            // Примечание
            let noteNm = document.createElement("p");
            noteNm.textContent = `\n* - интересно знать: такая форма именно этого слова\nне встречается в рангих коренных текстах главных редакций канона.`;
            noteNm.className = 'text-muted';
            declensionsOutput.appendChild(noteNm);

        } else {
            declensionsOutput.textContent = "Склонения не найдены.";
        }

        // Переключаем видимость контейнера
        const declensionsContainer = document.getElementById("declensionsContainer");
        declensionsContainer.style.display = (declensionsContainer.style.display === "none") ? "block" : "none";
    }
    updateDisplay();
}

let isHighlighted = false; // Переменная для отслеживания состояния подсветки

function highlightDeclensions() {
    const table = document.getElementById("declensionsOutput").getElementsByTagName("table")[0];
    const rows = table.getElementsByTagName("tr");

    const wordCount = {}; // Объект для хранения количества повторений каждого слова

    // Собираем количество повторений слов
    for (const row of rows) {
        const cells = row.getElementsByTagName("td");

        if (cells.length > 2) {
            // Сначала обрабатываем вторую колонку (индекс 1)
            const wordsInSecondColumn = cells[1].textContent.split(/\s+/);
            wordsInSecondColumn.forEach(word => {
                if (word) {
                    const cleanedWord = word.replace(/\*/g, '').trim();

                    if (cleanedWord) {
                        wordCount[cleanedWord] = (wordCount[cleanedWord] || 0) + 1;
                    }
                }
            });

            // Обрабатываем третью колонку (индекс 2)
            const wordsInThirdColumn = cells[2].textContent.split(/\s+/);
            wordsInThirdColumn.forEach(word => {
                if (word) {
                    const cleanedWord = word.replace(/\*/g, '').trim();

                    if (cleanedWord) {
                        wordCount[cleanedWord] = (wordCount[cleanedWord] || 0) + 1;
                    }
                }
            });
        }
    }

    // Фильтруем слова, оставляем только те, которые повторяются больше одного раза
    const filteredWords = Object.entries(wordCount).filter(([word, count]) => count > 1);

    // Сортируем по количеству повторений
    const sortedWords = filteredWords.sort((a, b) => b[1] - a[1]);

    // Массив цветов для подсветки
const colors = [
    '#007bff', '#ffc107', '#dc3545', '#fd7e14', '#28a745', 
    '#17a2b8', '#6610f2', '#e83e8c', '#f7b1ab', '#d1ecf1',
    '#c3e6cb', '#f1e7e1', '#343a40','#f8d7da','#6c757d'
];

    // Контейнер для результатов
    const resultContainer = document.getElementById("declensionsOutput");
    const resultList = document.createElement("ul");
    resultList.className = 'list-unstyled';

    sortedWords.forEach(([word, count], index) => {
        const listItem = document.createElement("li");
        listItem.textContent = `${word} - ${count} раз(а)`;
        listItem.style.color = colors[index % colors.length]; // Назначаем цвет по кругу
        resultList.appendChild(listItem);
    });

    // Добавляем или удаляем список из контейнера
    if (!isHighlighted) {
        resultContainer.appendChild(resultList);
    } else {
        const existingList = resultContainer.querySelector('ul');
        if (existingList) {
            resultContainer.removeChild(existingList);
        }
    }

    // Обновление подсветки в таблице
    const tableCells = table.getElementsByTagName("td");
    Array.from(tableCells).forEach(cell => {
        let cellText = cell.textContent;
        const wordsInCell = cellText.split(/\s+/);

        wordsInCell.forEach((word) => {
            const cleanedWord = word.replace(/\*/g, '').trim();
            const matchingWord = sortedWords.find(([w]) => w === cleanedWord);

            if (matchingWord && !isHighlighted) {
                const span = document.createElement("span");
                span.textContent = word;
                span.style.color = colors[sortedWords.indexOf(matchingWord) % colors.length];

                // Заменяем слово в ячейке на окрашенное
                cellText = cellText.replace(word, span.outerHTML);
            } else if (matchingWord && isHighlighted) {
                // Убираем цвет (удаляем только цвет, а не другие стили)
                const span = document.createElement("span");
                span.textContent = word;

                // Убираем стиль цвета, но сохраняем другие стили
                span.style.color = ''; // Убираем цвет из инлайн-стиля

                // Заменяем слово в ячейке на стандартное
                cellText = cellText.replace(word, span.outerHTML);
            }
        });

        // Обновляем содержимое ячейки
        cell.innerHTML = cellText;
    });

    // Переключаем состояние подсветки
    isHighlighted = !isHighlighted;
}  

        function updateDisplay() {
            if (document.getElementById("numberOnlyCheckbox").checked) {
                showNumberOnly(currentIndex);
            } else {
                const record = modifiedRecords[currentIndex];
                if (document.getElementById("hideRuleNameCheckbox").checked) {
                    const hiddenRecord = hideRuleName(record);
                    document.getElementById("randomRecord").textContent = hiddenRecord;
                } else {
                    showRecord(currentIndex);
                }
            }
            // Сохраняем состояния чекбоксов в localStorage
            localStorage.setItem('rdtick', document.getElementById("numberOnlyCheckbox").checked);
            localStorage.setItem('rdtick2', document.getElementById("hideRuleNameCheckbox").checked);
        }            
            
        // Обработчик нажатия кнопки
        document.getElementById("randomButton").addEventListener("click", () => {
            currentIndex = getRandomIndex(modifiedRecords.length);
            updateDisplay();
        });
            
        // Обработчик изменения состояния чекбоксов
        document.getElementById("numberOnlyCheckbox").addEventListener("change", updateDisplay);
        document.getElementById("hideRuleNameCheckbox").addEventListener("change", updateDisplay);

        // Проверяем состояния чекбоксов в localStorage и применяем их при загрузке страницы
        const savedCheckboxState = localStorage.getItem('rdtick');
        if (savedCheckboxState === 'true') {
            document.getElementById("numberOnlyCheckbox").checked = true;
        }
        const savedCheckboxState2 = localStorage.getItem('rdtick2');
        if (savedCheckboxState2 === 'true') {
            document.getElementById("hideRuleNameCheckbox").checked = true;
        }
        currentIndex = getRandomIndex(modifiedRecords.length);
        updateDisplay();            
const records = [
"nom    sg      n      dukkha  -       dukkhaṃ dukkhe",
"acc    sg      n      dukkha  -       dukkhaṃ",
"instr  sg      n      dukkha  -       dukkhena",
"dat    sg      n      dukkha  -       dukkhassa dukkhāya",
"abl    sg      n      dukkha  -       dukkhato dukkhamhā dukkhasmā dukkhā",
"gen    sg      n      dukkha  -       dukkhassa",
"loc    sg      n      dukkha  -       dukkhamhi (nm) dukkhasmiṃ dukkhe",
"voc    sg      n      dukkha  -       dukkha dukkhaṃ dukkhā dukkhe",
"in comps       n                dukkha  -       dukkha",

"nom    pl      n      dukkha  -       dukkhā dukkhāni",
"acc    pl      n      dukkha  -       dukkhāni dukkhe",
"instr  pl      n      dukkha  -      dukkhehi",
"dat    pl      n      dukkha  -       dukkhānaṃ",
"abl    pl      n      dukkha  -      dukkhehi",
"gen    pl      n      dukkha  -       dukkhānaṃ",
"loc    pl      n      dukkha  -       dukkhesu",
"voc    pl      n      dukkha  -       dukkhā dukkhāni",  

"nom    sg      n       sacca   -       saccaṃ",
"acc    sg      n       sacca   -       saccaṃ",
"instr  sg      n       sacca   -       saccā saccena",
"dat    sg      n       sacca   -       saccassa saccāya",
"abl    sg      n       sacca   -       saccato saccamhā saccasmā saccā",
"gen    sg      n       sacca   -       saccassa",
"loc    sg      n       sacca   -       saccamhi saccasmiṃ sacce",
"voc    sg      n       sacca   -       sacca saccaṃ saccā",
"in comps      n                 sacca   -       sacca",
"nom    pl      n       sacca   -       saccā saccāni",
"acc    pl      n       sacca   -       saccāni sacce",
"instr  pl      n       sacca   -       saccebhi saccehi",
"dat    pl      n       sacca   -       saccānaṃ",
"abl    pl      n       sacca   -       saccebhi saccehi",
"gen    pl      n       sacca   -       saccāna saccānaṃ",
"loc    pl      n       sacca   -       saccesu",
"voc    pl      n       sacca   -       saccā saccāni",

"nom    sg      f       jāti    -       jāti",
"acc    sg      f       jāti    -       jātiṃ",
"instr  sg      f       jāti    -       jaccā jātiyā",
"dat    sg      f       jāti    -       jaccā jātiyā",
"abl    sg      f       jāti    -       jaccā jātito jātiyā",
"gen    sg      f       jāti    -       jaccā jātiyā",
"loc    sg      f       jāti    -       jātiyaṃ jātiyā",
"voc    sg      f       jāti    -       jāti",
"in comps       f                jāti    -       jāti",

"nom    pl      f       jāti    -       jātiyo",
"acc    pl      f       jāti    -       jātiyo",
"instr  pl      f       jāti    -       jātīhi",
"dat    pl      f       jāti    -       jātīnaṃ",
"abl    pl      f       jāti    -       jātīhi",
"gen    pl      f       jāti    -       jātīnaṃ",
"loc    pl      f       jāti    -       jātisu jātīsu",
"voc    pl      f       jāti    -       jātiyo jātī",

"nom    sg      m       byādhi  -       byādhi",             "acc    sg      m       byādhi  -       byādhiṃ",
"instr  sg      m       byādhi  -       byādhinā",
"dat    sg      m       byādhi  -       byādhino byādhissa",
"abl    sg      m       byādhi  -       byādhito byādhinā byādhimhā byādhismā",
"gen    sg      m       byādhi  -       byādhino byādhissa",
"loc    sg      m       byādhi  -       byādhimhi byādhismiṃ",
"voc    sg      m       byādhi  -       byādhi",
"in comps        m               byādhi  -       byādhi byādhī",
"nom    pl      m       byādhi  -       byādhayo byādhī",
"acc    pl      m       byādhi  -       byādhayo byādhī",
"instr  pl      m       byādhi  -       byādhibhi byādhībhi byādhīhi",
"dat    pl      m       byādhi  -       byādhinaṃ byādhīnaṃ",
"abl    pl      m       byādhi  -       byādhibhi byādhībhi byādhīhi",
"gen    pl      m       byādhi  -       byādhinaṃ byādhīnaṃ",
"loc    pl      m       byādhi  -       byādhisu byādhīsu",
"voc    pl      m       byādhi  -       byādhayo byādhī",

"nom    sg      m       yogo    -       yogo",
"acc    sg      m       yogo    -       yogaṃ",
"instr  sg      m       yogo    -       yogā yogena",
"dat    sg      m       yogo    -       yogassa yogāya",
"abl    sg      m       yogo    -       yogato yogamhā yogasmā yogā",
"gen    sg      m       yogo    -       yogassa",
"loc    sg      m       yogo    -       yogamhi yogasmiṃ yoge",
"voc    sg      m       yogo    -       yoga yogā",
"in comps        m               yogo    -       yoga",      
"nom    pl      m       yogo    -       yogā yogāse",
"acc    pl      m       yogo    -       yoge",
"instr  pl      m       yogo    -       yogebhi yogehi",
"dat    pl      m       yogo    -       yogānaṃ",
"abl    pl      m       yogo    -       yogato yogebhi yogehi",
"gen    pl      m       yogo    -       yogāna yogānaṃ",
"loc    pl      m       yogo    -       yogesu",             
"voc    pl      m       yogo    -       yogā",

"nom    sg      f       taṇhā   -       taṇhā",
"acc    sg      f       taṇhā   -       taṇhaṃ",
"instr  sg      f       taṇhā   -       taṇhā taṇhāya",
"dat    sg      f       taṇhā   -       taṇhāya",
"abl    sg      f       taṇhā   -       taṇhato taṇhāto taṇhāya",
"gen    sg      f       taṇhā   -       taṇhāya",
"loc    sg      f       taṇhā   -       taṇhāya taṇhāyaṃ",
"voc    sg      f       taṇhā   -       taṇha taṇhe",
"in comps       f                taṇhā   -       taṇha taṇhā",

"nom    pl      f       taṇhā   -       taṇhā taṇhāyo",
"acc    pl      f       taṇhā   -       taṇhā taṇhāyo",
"instr  pl      f       taṇhā   -       taṇhābhi taṇhāhi",
"dat    pl      f       taṇhā   -       taṇhānaṃ",
"abl    pl      f       taṇhā   -       taṇhābhi taṇhāhi",
"gen    pl      f       taṇhā   -       taṇhānaṃ",
"loc    pl      f       taṇhā   -       taṇhāsu",
"voc    pl      f       taṇhā   -       taṇhā taṇhāyo",

"nom    sg      n       cakkhu  -       cakkhu cakkhuṃ",
"acc    sg      n       cakkhu  -       cakkhuṃ",
"instr  sg      n       cakkhu  -       cakkhunā cakkhusā",
"dat    sg      n       cakkhu  -       cakkhuno cakkhussa",
"abl    sg      n       cakkhu  -       cakkhuto cakkhunā cakkhumhā cakkhusmā",
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
"loc    pl      n       cakkhu  -       cakkhūsu",
"voc    pl      n       cakkhu  -       cakkhū cakkhūni",


"nom    sg      m       dhamma  -       dhammo",
"acc    sg      m       dhamma  -       dhammaṃ",
"instr  sg      m       dhamma  -       dhammā dhammena",
"dat    sg      m       dhamma  -       dhammassa dhammāya",
"abl    sg      m       dhamma  -       dhammato dhammamhā dhammasmā dhammā",
"gen    sg      m       dhamma  -       dhammassa",
"loc    sg      m       dhamma  -       dhammamhi dhammasmiṃ dhamme",
"voc    sg      m       dhamma  -       dhamma dhammā",
"in comps       m                dhamma  -       dhamma",

"nom    pl      m       dhamma  -       dhammā dhammāse",
"acc    pl      m       dhamma  -       dhamme",
"instr  pl      m       dhamma  -       dhammebhi dhammehi",
"dat    pl      m       dhamma  -       dhammānaṃ",
"abl    pl      m       dhamma  -       dhammato dhammebhi dhammehi",
"gen    pl      m       dhamma  -       dhammāna dhammānaṃ",
"loc    pl      m       dhamma  -       dhammesu",
"voc    pl      m       dhamma  -       dhammā",

"nom    sg      f       dhātu   -       dhātu",
"acc    sg      f       dhātu   -       dhātuṃ",
"instr  sg      f       dhātu   -       dhātuyā",
"dat    sg      f       dhātu   -       dhātuyā",
"abl    sg      f       dhātu   -       dhātuto dhātuyā",
"gen    sg      f       dhātu   -       dhātuyā",
"loc    sg      f       dhātu   -       dhātuyaṃdhātuyā",
"voc    sg      f       dhātu   -       dhātu",
"in comps       f                dhātu   -       dhātu",
"nom    pl      f       dhātu   -       dhātuyo dhātū",
"acc    pl      f       dhātu   -       dhātuyo dhātū",
"instr  pl      f       dhātu   -       dhātūhi",
"dat    pl      f       dhātu   -       dhātūnaṃ",
"abl    pl      f       dhātu   -       dhātūhi",
"gen    pl      f       dhātu   -       dhātūnaṃ",
"loc    pl      f       dhātu   -       dhātusu dhātūsu",
"voc    pl      f       dhātu   -       dhātuyo dhātū",

"nom    sg      f       mātar   -       mātā",
"acc    sg      f       mātar   -       mātaraṃ",
"instr  sg      f       mātar   -       matyā mātarā mātu mātuyā",
"dat    sg      f       mātar   -       matyā mātu mātuyā",
"abl    sg      f       mātar   -       matyā mātarā mātuyā",
"gen    sg      f       mātar   -       matyā mātāya mātu mātuyā",
"loc    sg      f       mātar   -       matyaṃ matyā mātari mātuyaṃ mātuyā",
"voc    sg      f       mātar   -       māta mātā māte",
"in comps               f       mātar   -       mātā mātu",
"nom    pl      f       mātar   -       mātaro",
"acc    pl      f       mātar   -       mātare mātaro",
"instr  pl      f       mātar   -       mātarehi mātūhi",
"dat    pl      f       mātar   -       mātarānaṃ mātānaṃ mātūnaṃ",
"abl    pl      f       mātar   -       mātarehi mātūhi",    "gen    pl      f       mātar   -       mātarānaṃ mātānaṃ mātūnaṃ",
"loc    pl      f       mātar   -       mātaresu mātusu mātūsu",
"voc    pl      f       mātar   -       mātaro mātā", 

"nom    sg      m       pitar   -       pitā",
"acc    sg      m       pitar   -       pitaraṃ",            "instr  sg      m       pitar   -       pitarā pitunā",
"dat    sg      m       pitar   -       pitu pituno pitussa",
"abl    sg      m       pitar   -       pitarā",
"gen    sg      m       pitar   -       pitu pituno pitussa",
"loc    sg      m       pitar   -       pitari",
"voc    sg      m       pitar   -       pita pitā",
"in comps               m       pitar   -       pitā pitu",
"nom    pl      m       pitar   -       pitaro",
"acc    pl      m       pitar   -       pitare pitaro",
"instr  pl      m       pitar   -       pitūhi",             "dat    pl      m       pitar   -       pitunnaṃ pitūnaṃ",
"abl    pl      m       pitar   -       pitūhi",
"gen    pl      m       pitar   -       pitunnaṃ pitūnaṃ",   "loc    pl      m       pitar   -       pitaresu pitusu pitū pitūsu",
"voc    pl      m       pitar   -       pitaro",

"nom    sg      m       aggi    -       aggi",               
"acc    sg      m       aggi    -       aggiṃ",
"instr  sg      m       aggi    -       agginā",             
"dat    sg      m       aggi    -       aggino aggissa",
"abl    sg      m       aggi    -       aggito agginā aggimhā aggismā",
"gen    sg      m       aggi    -       aggino aggissa",
"loc    sg      m       aggi    -       aggimhi aggismiṃ",
"voc    sg      m       aggi    -       aggi",
"in comps               m       aggi    -       aggi aggī",
"nom    pl      m       aggi    -       aggayo aggī",
"acc    pl      m       aggi    -       aggayo aggī",
"instr  pl      m       aggi    -       aggibhi aggībhi aggīhi",
"dat    pl      m       aggi    -       agginaṃ aggīnaṃ",
"abl    pl      m       aggi    -       aggibhi aggībhi aggīhi",
"gen    pl      m       aggi    -       agginaṃ aggīnaṃ",
"loc    pl      m       aggi    -       aggisu aggīsu",
"voc    pl      m       aggi    -       aggayo aggī",
                                                         
"nom    sg      m       attan   -       attā",
"acc    sg      m       attan   -       attanaṃ attaṃ attānaṃ",
"instr  sg      m       attan   -       attanā attena",      
"dat    sg      m       attan   -       attano",
"abl    sg      m       attan   -       attanā",
"gen    sg      m       attan   -       attano",
"loc    sg      m       attan   -       attani",
"voc    sg      m       attan   -       atta attā",
"in comps               m       attan   -       atta",
"nom    pl      m       attan   -       attāno",
"acc    pl      m       attan   -       attāno",
"instr  pl      m       attan   -       attanehi",
"dat    pl      m       attan   -       attānaṃ",
"abl    pl      m       attan   -       attanehi",
"gen    pl      m       attan   -       attānaṃ",
"loc    pl      m       attan   -       attanesu",
"voc    pl      m       attan   -       attāno",

"nom    sg      n       aṭṭhi   -       aṭṭhi",
"acc    sg      n       aṭṭhi   -       aṭṭhiṃ",
"instr  sg      n       aṭṭhi   -       aṭṭhinā",
"dat    sg      n       aṭṭhi   -       aṭṭhino aṭṭhissa",
"abl    sg      n       aṭṭhi   -       aṭṭhito aṭṭhinā aṭṭhimhā aṭṭhismā",
"gen    sg      n       aṭṭhi   -       aṭṭhinoaṭṭhissa",    
"loc    sg      n       aṭṭhi   -       aṭṭhini aṭṭhimhi aṭṭhismiṃ",
"voc    sg      n       aṭṭhi   -       aṭṭhi",
"in comps               n       aṭṭhi   -       aṭṭhi",      
"nom    pl      n       aṭṭhi   -       aṭṭhī aṭṭhīni",
"acc    pl      n       aṭṭhi   -       aṭṭhī aṭṭhīni",      
"instr  pl      n       aṭṭhi   -       aṭṭhibhi aṭṭhīhi",
"dat    pl      n       aṭṭhi   -       aṭṭhīnaṃ",           
"abl    pl      n       aṭṭhi   -       aṭṭhibhi aṭṭhīhi",
"gen    pl      n       aṭṭhi   -       aṭṭhīnaṃ",           
"loc    pl      n       aṭṭhi   -       aṭṭhisu aṭṭhīsu",
"voc    pl      n       aṭṭhi   -       aṭṭhī aṭṭhīni",

"nom    sg      m       bhagavant       -       bhagavanto bhagavā",
"acc    sg      m       bhagavant       -       bhagavantaṃ",
"instr  sg      m       bhagavant       -       bhagavatā",
"dat    sg      m       bhagavant       -       bhagavato",
"abl    sg      m       bhagavant       -       bhagavatā bhagavato",
"gen    sg      m       bhagavant       -       bhagavato",
"loc    sg      m       bhagavant       -       bhagavati",
"voc    sg      m       bhagavant       -       bhagavā",
"in comps               m       bhagavant       -       bhagava bhagavanta bhagavam bhagavaṃ",
"nom    pl      m       bhagavant       -       bhagavanto bhagavā",
"acc    pl      m       bhagavant       -       bhagavante (nm)",
"instr  pl      m       bhagavant       -       bhagavantehi (nm)",
"dat    pl      m       bhagavant       -       bhagavataṃ (nm) bhagavantānaṃ",
"abl    pl      m       bhagavant       -       bhagavantehi (nm)",
"gen    pl      m       bhagavant       -       bhagavataṃ (nm) bhagavantānaṃ",
"loc    pl      m       bhagavant       -       bhagavantesu (nm)",
"voc    pl      m       bhagavant       -       bhagavantā (nm) bhagavanto",

"nom    sg      m       sukhin  -       sukhī",
"acc    sg      m       sukhin  -       sukhinaṃ sukhiṃ",
"instr  sg      m       sukhin  -       sukhinā",
"dat    sg      m       sukhin  -       sukhino sukhissa",   "abl    sg      m       sukhin  -       sukhinā sukhimhā",
"gen    sg      m       sukhin  -       sukhino sukhissa",
"loc    sg      m       sukhin  -       sukhini sukhimhi sukhismiṃ",
"voc    sg      m       sukhin  -       sukhi sukhī",
"in comps               m       sukhin  -       sukhi",
"nom    pl      m       sukhin  -       sukhino sukhī",
"acc    pl      m       sukhin  -       sukhino sukhī",
"instr  pl      m       sukhin  -       sukhibhi sukhīhi",
"dat    pl      m       sukhin  -       sukhinaṃ sukhīnaṃ",
"abl    pl      m       sukhin  -       sukhibhi sukhīhi",
"gen    pl      m       sukhin  -       sukhīnaṃ",
"loc    pl      m       sukhin  -       sukhisu sukhīsu",
"voc    pl      m       sukhin  -       sukhino sukhī",

"nom    sg      m       satthar -       satthā",
"acc    sg      m       satthar -       sattharaṃ satthāraṃ",
"instr  sg      m       satthar -       satthārā satthunā",
"dat    sg      m       satthar -       satthu satthuno satthussa",
"abl    sg      m       satthar -       satthārā",
"gen    sg      m       satthar -       satthu satthuno satthussa",
"loc    sg      m       satthar -       satthari",
"voc    sg      m       satthar -       sattha satthā satthe",
"in comps               m       satthar -       sattha satthu",
"nom    pl      m       satthar -       satthāro",
"acc    pl      m       satthar -       satthāre satthāro",
"instr  pl      m       satthar -       satthārehi satthubhi",
"dat    pl      m       satthar -       satthānaṃ satthārānaṃ",
"abl    pl      m       satthar -       satthārehi satthubhi",
"gen    pl      m       satthar -       satthānaṃ satthārānaṃ",
"loc    pl      m       satthar -       satthāresu",
"voc    pl      m       satthar -       satthāro",

"nom    sg      m       gacchant        -       gacchanto gacchaṃ",
"acc    sg      m       gacchant        -       gacchantaṃ",
"instr  sg      m       gacchant        -       gacchatā gacchantena",
"dat    sg      m       gacchant        -       gacchato gacchantassa",
"abl    sg      m       gacchant        -       gacchatā gacchantamhā gacchantasmā",
"gen    sg      m       gacchant        -       gacchato gacchantassa",
"loc    sg      m       gacchant        -       gacchantamhi gacchantasmiṃ gacchante",
"voc    sg      m       gacchant        -       gaccha gacchaṃ gacchā",

"nom    pl      m       gacchant        -       gacchantā gacchanto",
"acc    pl      m       gacchant        -       gacchante",
"instr  pl      m       gacchant        -       gacchantehi",
"dat    pl      m       gacchant        -       gacchataṃ gacchantānaṃ",
"abl    pl      m       gacchant        -       gacchantehi",
"gen    pl      m       gacchant        -       gacchataṃ gacchantānaṃ",
"loc    pl      m       gacchant        -       gacchantesu",
"voc    pl      m       gacchant        -       gacchantā gacchanto",

"nom    sg      m       manas   -       mano",
"acc    sg      m       manas   -       manaṃ mano",
"instr  sg      m       manas   -       manasā manena",
"dat    sg      m       manas   -       manaso manassa",
"abl    sg      m       manas   -       manato manamhā manasā manasmā manā",
"gen    sg      m       manas   -       manaso manassa",
"loc    sg      m       manas   -       manamhi manasi manasmiṃ mane",
"voc    sg      m       manas   -       mana manā",
"in comps               m       manas   -       mana mano",
"nom    pl      m       manas   -       manā manāni",
"acc    pl      m       manas   -       mane",
"instr  pl      m       manas   -       manehi",
"dat    pl      m       manas   -       manānaṃ",
"abl    pl      m       manas   -       manehi",
"gen    pl      m       manas   -       manānaṃ",
"loc    pl      m       manas   -       manesu",
"voc    pl      m       manas   -       manā",

"nom    sg      m       viññū   -       viññū",
"acc    sg      m       viññū   -       viññunaṃ viññuṃ",
"instr  sg      m       viññū   -       viññunā",
"dat    sg      m       viññū   -       viññuno",
"abl    sg      m       viññū   -       viññunā",
"gen    sg      m       viññū   -       viññuno viññussa",
"loc    sg      m       viññū   -       viññumhi viññusmiṃ",
"voc    sg      m       viññū   -       viññū",
"in comps               m       viññū   -       viññu viññū",
"nom    pl      m       viññū   -       viññuno viññū viññūno",
"acc    pl      m       viññū   -       viññuno viññū viññūno",
"instr  pl      m       viññū   -       viññūhi",
"dat    pl      m       viññū   -       viññūna viññūnaṃ",
"abl    pl      m       viññū   -       viññūhi",
"gen    pl      m       viññū   -       viññunnaṃ viññūna viññūnaṃ",
"loc    pl      m       viññū   -       viññūsu",
"voc    pl      m       viññū   -       viññuno viññū",

"nom    sg   m   āyasmant        -       āyasmanto āyasmā",
"acc    sg   m   āyasmant        -       āyasmantaṃ",
"instr  sg   m   āyasmant        -       āyasmatā",
"dat    sg   m   āyasmant        -       āyasmato",
"abl    sg   m   āyasmant        -       āyasmatā āyasmantā",
"gen    sg   m   āyasmant        -       āyasmato",
"loc    sg   m   āyasmant        -       āyasmati (nm) āyasmante",
"voc    sg   m   āyasmant        -       āyasma āyasmā",
"in comps m āyasmant        -       āyasma āyasmanta",
"nom    pl  m    āyasmant        -       āyasmantā āyasmanto āyasmā",
"acc    pl  m    āyasmant        -       āyasmanto āyasmante",
"instr  pl  m    āyasmant        -       āyasmantehi",
"dat    pl  m    āyasmant        -       āyasmataṃ (nm) āyasmantānaṃ",
"abl    pl  m   āyasmant        -       āyasmantehi",
"gen    pl  m    āyasmant        -       āyasmataṃ (nm) āyasmantānaṃ",
"loc    pl  m    āyasmant        -       āyasmantesu",
"voc    pl  m    āyasmant        -       āyasmantā āyasmanto",

"nom    sg   m   bhikkhu -       bhikkhu",
"acc    sg   m   bhikkhu -       bhikkhuṃ",
"instr  sg   m   bhikkhu -       bhikkhunā",
"dat    sg   m   bhikkhu -       bhikkhuno bhikkhussa",
"abl    sg   m   bhikkhu -       bhikkhunā bhikkhumhā (nm) bhikkhusmā (nm)",
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
"voc    pl   m   bhikkhu        -       bhikkhave bhikkhavo bhikkhū",

"nom    sg   f   bhikkhunī       -       bhikkhunī",
"acc    sg   f   bhikkhunī       -       bhikkhuniṃ",
"instr  sg   f   bhikkhunī       -       bhikkhuniyā",
"dat    sg   f   bhikkhunī       -       bhikkhuniyā",
"abl    sg   f   bhikkhunī       -      bhikkhuniyā",
"gen    sg   f   bhikkhunī       -       bhikkhuniyā",
"loc    sg   f   bhikkhunī       -       bhikkhuniyā",
"voc    sg   f   bhikkhunī       -       bhikkhuni bhikkhunī",
"in comps   f            bhikkhunī       -       bhikkhuni bhikkhunī",

"nom    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",
"acc    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",
"instr  pl  f    bhikkhunī      -         bhikkhunībhi bhikkhunīhi",
"dat    pl  f    bhikkhunī      -         bhikkhunīnaṃ",
"abl    pl  f    bhikkhunī      -         bhikkhunībhi bhikkhunīhi",
"gen    pl  f    bhikkhunī      -         bhikkhunīnaṃ",
"loc    pl  f    bhikkhunī      -         bhikkhunīsu",
"voc    pl  f    bhikkhunī      -         bhikkhuniyo bhikkhunī",

"nom    sg  f   ayyā    -       ayyā",
"acc    sg  f   ayyā    -       ayyaṃ",
"instr  sg  f   ayyā    -       ayyā ayyāya",
"dat    sg  f   ayyā    -       ayyāya",
"abl    sg  f   ayyā    -       ayyāya",
"gen    sg  f   ayyā    -       ayyāya",
"loc    sg  f   ayyā    -       ayyāya",
"voc    sg  f   ayyā    -       ayya ayye",
"in comps   f    ayyā    -       ayya ayyā",

"nom    pl  f    ayyā     -       ayyā ayyāyo",
"acc    pl  f    ayyā     -       ayyā ayyāyo",
"instr  pl  f    ayyā     -       ayyāhi",
"dat    pl  f    ayyā     -       ayyānaṃ",
"abl    pl  f    ayyā     -       ayyāhi",
"gen    pl  f    ayyā     -       ayyānaṃ",
"loc    pl  f    ayyā     -       ayyāsu (nm)",
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
        document.getElementById("randomRecord").textContent = "Не выбрано ни одного слова.";
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
    document.getElementById("randomRecord").textContent = randomRecord || "Не выбрано ни одного слова.";
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

    if (currentRecord && currentRecord !== "Не выбрано ни одного слова.") {
        const parts = currentRecord.split(/\s+/);
        console.log("Части записи:", parts);

        const partOfSpeech = parts[2]; // Часть речи
        const word = parts[3]; // Слово после пробелов
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
            const header = document.createElement("h4");
            header.textContent = `${word} (${partOfSpeech})`;
            declensionsOutput.appendChild(header);
            
            // Таблица
            const table = document.createElement("table");
            const tbody = document.createElement("tbody");

            matchingRecords.forEach(record => {
                const recordParts = record.split(/\s+/);
                const row = document.createElement("tr");

                // Добавляем падеж и число
                const caseCell = document.createElement("td");
                caseCell.textContent = recordParts[0]; // Падеж
                row.appendChild(caseCell);

                const numberCell = document.createElement("td");
                numberCell.textContent = recordParts[1]; // Число
                row.appendChild(numberCell);

                // Добавляем слово (начиная с 6 позиции, т.е. index 5)
                const wordCell = document.createElement("td");
                wordCell.textContent = recordParts.slice(5).join(" "); // Слово начиная с 6 позиции
                row.appendChild(wordCell);

                tbody.appendChild(row);
            });

            table.appendChild(tbody);
            declensionsOutput.appendChild(table);

    //описание 
    const noteNm = document.createElement("p");
            noteNm.textContent = `\n(nm) - после слова означает, что такой формы нет\nв коренных текстах главных редакций канона.`;
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
            
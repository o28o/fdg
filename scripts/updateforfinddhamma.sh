
pattern="Mudita (seyyathāpi|adhivacan|ūpama|opama)"
savevertpattern=`echo $pattern | sed 's#|#@#g'`
echo $savevertpattern
if [[ $pattern == *"^("* ]] && [[ $pattern == *")$"* ]] 
 then
 pattern=`echo $pattern | sed 's@ @|@g' `
 else
 pattern=`echo $pattern | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' `
 fi
 echo $pattern
 patternforfind=`echo $savevertpattern | sed 's@|@ @g' |sed 's@^(@@' | sed 's#@#|#g' `
if [[ "$patternforfind" == *")" ]]; then
    patternforfind="${patternforfind::-1}"
fi
echo $patternforfind



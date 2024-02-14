
patternforexclude=$(echo "$@" | awk -F'-exc' '{ print $2}'  | sed 's@ @|@g' |sed 's@^@(@g' | sed 's@$@)@g' )

grep -ril dukkh * | xargs grep -vl "$patternforexclude" | xargs  grep -ci dukkh | sort -t':' -k2n | tail -n10


and top 10
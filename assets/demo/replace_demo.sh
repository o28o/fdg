#!/bin/bash

#replace for demo data
for i in `ls` 
do
sed -i 's@/assets/demo/@/assets/demo/@g' $i
done


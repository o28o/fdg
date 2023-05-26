#!/bin/bash

string1="Samudayañca atthaṅgamañca assādañca ādīnavañca nissaraṇañca yathābhūtaṁ pajānanti"
string2="Samudayañca atthaṅgamañca assādañca ādīnavañca nissaraṇañca yathābhūtaṁ pajānāti"

for ((i=0; i<${#string1}; i++)); do
  char1="${string1:i:1}"
  char2="${string2:i:1}"
  
  if [ "$char1" = "$char2" ]; then
    echo "$char1 and $char2 - equal"
  else
    echo "$char1 and $char2 - not equal"
  fi
done
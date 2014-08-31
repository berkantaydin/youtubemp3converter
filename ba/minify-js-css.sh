#!/bin/bash

clear

rm -f ../all_min.js
rm -f ./all.js

./read_library.sh ./js.list ./all.js

java -jar yuicompressor-2.4.7.jar -v -o '../all_min.js' ./all.js

rm -f ./all.js

echo " --- Done JS ---"
echo " "
echo " "

rm -f ../all_min.css
rm -f ./all.css

./read_library.sh ./css.list ./all.css

java -jar yuicompressor-2.4.7.jar -v -o '../all_min.css' ./all.css

rm -f ./all.css

echo " --- Done CSS ---"
echo " "
echo " "

echo " --- Done ALL ---"
echo " "
echo " "
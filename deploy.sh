#!/bin/bash
#
#
# https://unix.stackexchange.com/a/153863
shopt -s extglob

rm -rf ./build
mkdir ./build

cp ./web/style.css ./build/style.css
cp ./web/why.png ./build/why.png

php build-pages.php

git add .
git commit -m "created build `date '+%Y-%m-%d %H:%M:%S'`"
git checkout master
rm -rf . -- !(.idea|.git)
git checkout Php -- build
mv build/* .
rmdir build
git add .
git commit -m "added build `date '+%Y-%m-%d %H:%M:%S'`"

git checkout Php


#!/bin/bash
#
#
# https://unix.stackexchange.com/a/153863
# https://askubuntu.com/a/259386
shopt -s extglob
shopt -s dotglob

rm -rf ./build
mkdir ./build

cp ./.gitignore ./build/.gitignore
cp ./web/style.css ./build/style.css
cp ./web/why.png ./build/why.png
cp ./web/tools ./build

php build-pages.php

git add .
git commit -m "created build `date '+%Y-%m-%d %H:%M:%S'`"
git checkout master
rm -rf . -- !(.idea|.git)
git checkout php -- build
mv build/* .
rmdir build
git add .
git commit -m "added build `date '+%Y-%m-%d %H:%M:%S'`"

git checkout php

git push origin php
git push origin master

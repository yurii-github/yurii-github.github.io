#!/bin/bash
#
#
# https://unix.stackexchange.com/a/153863
# https://askubuntu.com/a/259386
shopt -s extglob
shopt -s dotglob

/usr/bin/php8.3 web/index.php

git add .
git commit -m "created build `date '+%Y-%m-%d %H:%M:%S'`"
git checkout master
rm -rf . -- !(.idea|.git|.composer.lock|vendor)
git checkout php -- build
mv build/* .
rmdir build
git add .
git commit -m "added build `date '+%Y-%m-%d %H:%M:%S'`"

git checkout php

git push origin php
git push origin master

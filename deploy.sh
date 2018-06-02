#!/bin/bash
#
#

php build-pages.php
git add .
git commit -m "created build `date '+%Y-%m-%d %H:%M:%S'`"
exit;
git co master
rm -rf . -- !(.idea)
git co Php -- build
mv build/* .
rmdir build
git add .
git commit -m "added build `date '+%Y-%m-%d %H:%M:%S'`"


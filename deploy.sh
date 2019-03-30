#!/bin/bash
#
#


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

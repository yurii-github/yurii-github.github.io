#!/bin/bash
npm run build

dir="$(pwd)"
parentDir="$(dirname "$dir")"

buildDir="$dir/build"
deployDir="$parentDir/yurii-github.github.io-build"

echo "$dir | $parentDir"
echo "$buildDir | $deployDir";


# clear after last deploy
rm -fr "$deployDir/static/"

cp -a "$buildDir/."  $deployDir


# commit
cd $deployDir
git add . --all
git commit -m "deployed"
git push
cd $dir
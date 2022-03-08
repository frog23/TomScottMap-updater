#!/bin/bash
cd ~/TomScottMap-updater/git
git pull
cd ..
cp -f git/data.json data.json

NEWVIDEOS=`php api.php channel=0`
sed '/^{"data":\[/q' data.json > data_new.json
if [[ ! -z "$NEWVIDEOS" ]]
then
	echo "$NEWVIDEOS" >> data_new.json
	echo "$NEWVIDEOS"
else
	echo "Tom Scott: no new videos"
fi
tail -n +2 data.json >> data_new.json

NEWVIDEOS=`php api.php channel=1`
sed '/^{"comment":"\/\/Videos from Matt and Toms Channel"},/q' data_new.json > data_new2.json
if [[ ! -z "$NEWVIDEOS" ]]
then
	echo "$NEWVIDEOS" >> data_new2.json
	echo "$NEWVIDEOS"
else
	echo "Matt & Tom: no new videos"
fi
sed -e '1,/^{"comment":"\/\/Videos from Matt and Toms Channel"},/d' data_new.json >> data_new2.json

NEWVIDEOS=`php api.php channel=2`
sed "/^{\"comment\":\"\/\/Videos from Tom's second channel: Tom Scott plus\"},/q" data_new2.json > data_new3.json
if [[ ! -z "$NEWVIDEOS" ]]
then
	echo "$NEWVIDEOS" >> data_new3.json
	echo "$NEWVIDEOS"
else
	echo "Tom Scott Plus: no new videos"
fi
sed -e "1,/^{\"comment\":\"\/\/Videos from Tom's second channel: Tom Scott plus\"},/d" data_new2.json >> data_new3.json

cp -f data_new3.json data.json
cp data.json git/data.json
cd git/
git add data.json
git commit -m "new videos added automatically (not categorized or referenced yet)"
git push

#TODO: add section for: {"comment":"//Videos from the Technical Difficulties channel"},


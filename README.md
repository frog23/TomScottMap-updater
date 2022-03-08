# TomScottMap-updater
This script adds the newest videos from Tom Scott various channels and adds them to the data.json file of the [TomScottMap](https://github.com/frog23/TomScottMap) github project. It provies the templating for the new entry and inserts them in the right position, so the human reviewers just need to focus on the coordinates, the categories and optional description.

The script is written in bash and uses a bit of php code as well (strange combination, based on code recycling).

For this to work this repo needs to be cloned into the users home directory and the regular TomScottMap repo needs to be cloned into the git directory: 

```git clone https://github.com/frog23/TomScottMap.git git```

then the script 

```insert_new_videos.sh```

can be called (manually or via crontab).

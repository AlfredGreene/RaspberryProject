#!/bin/bash
# Stop Process "raspivid"
#sudo pkill raspivid

pid=`pidof raspivid`
if [[ -n $pid ]]; then
    sudo kill $pid
    echo "Stopped videostream"
else
    echo "Videostream is not running"
fi

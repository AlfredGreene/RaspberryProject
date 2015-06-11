#!/bin/bash

#command for killing motion process
#ps -ef | grep motion-mmal | awk '{print $2}' | xargs kill

pid=`pidof motion`
if [[ -n $pid ]]; then
    sudo kill $pid
    echo "Stopped motion-detection"
else
    echo "Motion detection is not running"
fi

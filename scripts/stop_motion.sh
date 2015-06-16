#!/bin/bash

#command for killing motion process
pid=`pidof motion`
if [[ -n $pid ]]; then
    sudo kill $pid
    echo "Motion stopped"
else
    echo "Motion detection is not running"
fi

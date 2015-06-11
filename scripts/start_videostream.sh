#!/bin/bash

#Command for starting videostream
#raspivid -o - -t 0 -w 800 -h 600 -fps 30 |cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264

#nohup raspivid -o - -t 9999999 -w 800 -h 600 --hflip | cvlc -vvv stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264 &> /dev/null 2>&l &

nohup raspivid -o - -t 0 -n -w 600 -h 400 -fps 12 | cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264 1>/dev/null 2>&1

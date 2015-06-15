#!/bin/bash
#Command for starting videostream
nohup raspivid -o - -t 0 -n -w 640 -h 480 -fps 24 | cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264 > /dev/null 2>&1 &


#nohup raspivid -o - -t 0 -n -w 640 -h 480 -fps 24 \
      | cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8445}' :demux=h264 \
      > /dev/null 2>&1  &


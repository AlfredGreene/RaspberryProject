#!/bin/sh

raspivid -o - -t 0 -w 640 -h 460 -fps 30 |cvlc -v stream:///dev/stdin --sout '#standard{access=http,mux=ts,dst=:8554}' :demux=h264

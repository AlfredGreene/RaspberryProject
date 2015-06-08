#!/bin/bash

#command for killing motion process
ps -ef | grep motion-mmal | awk '{print $2}' | xargs kill

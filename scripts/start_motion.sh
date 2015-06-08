#!/bin/bash

#command for starting motion
# variant 1
nohup ~/mmal/motion-mmal -n -c motion-mmalcam.conf 1>/dev/null 2>&1 </dev/null &

# variant 2
 motion -n -c /etc/motion.conf
 
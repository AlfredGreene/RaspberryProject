#!/bin/bash

#command for starting motion
# variant 1
#nohup ~/mmal/motion-mmal -n -c motion-mmalcam.conf 1>/dev/null 2>&1 </dev/null &

# variant 2
#sudo motion -n -c /etc/motion/motion.conf &> /dev/null 
 sudo ./motion -c motion-mmalcam.conf
 
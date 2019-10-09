#!/bin/bash

tar -czf yimby.tar.gz ./* .??*
scp yimby.tar.gz root@66.42.73.132:/var/www/html/wp-content/themes
rm yimby.tar.gz

ssh -tt root@66.42.73.132 << 'ENDSSH'
cd /var/www/html/wp-content/themes
rm -rf yimby
mkdir yimby
tar xf yimby.tar.gz -C yimby
rm yimby.tar.gz
exit
ENDSSH

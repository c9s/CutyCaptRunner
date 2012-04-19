#!/bin/bash
cat <<END >> /etc/yum.repos.d/CentOS-Base.repo
#ATrpms
[atrpms]
name= CentOS-\$releasever - ATrpms
baseurl=http://dl.atrpms.net/el\$releasever-\$basearch/atrpms/testing
gpgcheck=1
gpgkey=http://ATrpms.net/RPM-GPG-KEY.atrpms
enabled=1
END

rpm --import http://packages.atrpms.net/RPM-GPG-KEY.atrpms
yum install subversion qt47-devel qt47-webkit gcc-c++ qt47-webkit-devel
yum install xorg-x11-server-Xvfb
yum install gcc-c++ compat-gcc-32 compat-gcc-32-c++
yum install Xorg

svn co https://cutycapt.svn.sourceforge.net/svnroot/cutycapt
cd cutycapt/CutyCapt
/usr/bin/qmake-qt47
make 

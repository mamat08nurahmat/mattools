sudo apt-get update

sudo apt-get install automake autotools-dev fuse g++ git libcurl4-gnutls-dev libfuse-dev libssl-dev libxml2-dev make pkg-config

git clone https://github.com/s3fs-fuse/s3fs-fuse.git

cd s3fsfuse
./autogen.sh
./configure --prefix=/usr with-openssl
make
sudo make install


vim /etc/passwd-s3fs

-->>>> Acces Key:Secret Key
-->>>> AKIAJQORWWY2TEJQ6LVQ:wSx6lr/X7NKQRCvTmatQU76exhsiuR/PMyylJJ/Y

sudo chmod 640 /etc/passwd-s3fs




mkdir /s3devopscilsy


sudo s3fs s3mamat -o allow_other -o uid=1000 /s3devopscilsy


---------------------------------------
sudo s3fs s3mamat -o passwd_file=/etc/passwd-s3fs -o allow_other -o uid=1000 /s3devopscilsy
---------------------------------------








echo AKIAJQORWWY2TEJQ6LVQ:wSx6lr/X7NKQRCvTmatQU76exhsiuR/PMyylJJ/Y > ${HOME}/.passwd-s3fs
chmod 600 ${HOME}/.passwd-s3fs

cd s3fsfuse/src
mv s3fs /local/bin

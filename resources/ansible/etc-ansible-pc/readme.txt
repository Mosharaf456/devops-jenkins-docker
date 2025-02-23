root@mosharaf-desktop:/etc# tar -zcvf /home/btl-671/Downloads/extra/ansible/ansible-pc.tar.gz  ansible/


root@mosharaf-desktop:/etc# tar -zxvf /home/btl-671/Downloads/extra/ansible/ansible-pc.tar.gz  

tar -zxvf ~/Downloads/extra/ansible/ansible-pc.tar.gz -C /desired/directory/

Explanation of the command:
-z: Tells tar to decompress the .gz file.
-x: Extracts the contents of the archive.
-v: Verbose mode, which shows you the files being extracted.
-f: Specifies the archive file (in this case, ansible-pc.tar.gz).
-C /desired/directory/: Optional, specifies the directory where you want to extract the files. If omitted, it will extract to the current directory.
If you want to extract it to the current directory, simply omit the -C part:


tar -zxvf ~/Downloads/extra/ansible/ansible-pc.tar.gz




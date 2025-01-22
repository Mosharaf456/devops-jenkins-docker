# >  ansible --list-hosts dev
# > ansible -m command -a "uptime" dev
# inside container test
# cd /var/jenkins_home/ansible
# > ansible -i hosts -m ping test1 
#  ansible dev -m ping
# ansible -i hosts -m ping client1
# ansible -i hosts -m ping dev

why not work ? == where client root access available then this root cmd works for that client
> ansible -i hosts -m command -a "ping" dev --become -k 

*****
only root user not grouped at all that are not root which will not work 
1.101 client1 
useradd mosharaf1
groupadd admin
usermod -aG admin mosharaf1
ls -al /tmp/test.log

>> ansible -m file -a "dest=/tmp/test.log mode=777 owner=mosharaf1 \
group=admin" client1 --become --become-method=sudo --become-user=root -k 





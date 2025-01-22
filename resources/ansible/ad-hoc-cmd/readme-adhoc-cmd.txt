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
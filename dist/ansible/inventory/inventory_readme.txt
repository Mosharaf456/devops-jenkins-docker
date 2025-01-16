[all:vars]
ansible_connection = ssh

[test]
test1 ansible_host=remote-host-ssh ansible_user=remote_user ansible_private_key_file=/var/jenkins_home/ansible/remote-key ansible_python_interpreter=/usr/bin/python3   

# inside container test
# cd /var/jenkins_home/ansible
# > ansible -i hosts -m ping test1 
#  ansible dev -m ping
# ansible -i hosts -m ping client1
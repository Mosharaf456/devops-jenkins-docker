# >  ansible --list-hosts dev
# > ansible -m command -a "uptime" dev
# inside container test
# cd /var/jenkins_home/ansible
# > ansible -i hosts -m ping test1 
#  ansible dev -m ping
# ansible -i hosts -m ping client1
# ansible -i hosts -m ping dev


***Privilege Escalation** ansible.cfg
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


*******ansible.cfg**********
[privilege_escalation]
# (boolean) Display an agnostic become prompt instead of displaying a prompt containing the command line supplied become method.
;agnostic_become_prompt=True

# (boolean) When ``False``(default), Ansible will skip using become if the remote user is the same as the become user, as this is normally a redundant operation. In other words root sudo to root.
# If ``True``, this forces Ansible to use the become plugin anyways as there are cases in which this is needed.
;become_allow_same_user=False

# (boolean) Toggles the use of privilege escalation, allowing you to 'become' another user after login.
become=true

# (boolean) Toggle to prompt for privilege escalation password.
become_ask_pass=true

# (string) executable to use for privilege escalation, otherwise Ansible will depend on PATH.
;become_exe=

# (string) Flags to pass to the privilege escalation executable.
;become_flags=

# (string) Privilege escalation method to use when `become` is enabled.
become_method=sudo

# (string) The user your login/remote user 'becomes' when using privilege escalation, most systems will use 'root' when no user is specified.
become_user=root



after changes ansible.cfg default conf file then it will shortend works
> >> ansible -m file -a "dest=/tmp/test.log mode=777 owner=mosharaf1 \
group=admin" client1

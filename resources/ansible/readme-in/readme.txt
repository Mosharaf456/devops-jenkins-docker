

  ansible.builtin.set_fact:
  ansible.builtin.debug:
  ansible.builtin.fail:

  ansible.builtin.find:
  ansible.builtin.file:

  ansible.builtin.command: "{{ git_build_package_script }}"
  ansible.builtin.shell: "./install_pbx.sh"


  ansible.builtin.copy: (Not recommended)
  ansible.builtin.synchronize: (optimal way)

  user:

  stat:
  apt:
  ansible.builtin.unarchive:

https://docs.ansible.com/ansible/latest/playbook_guide/playbooks_templating.html



https://oms.brotecs.com:3000/Brotecs/cloud-computing-kb/src/branch/ippbx_automation/IPPBXPlaybook/IPPBX_Automation/roles/build/tasks/build_deb_package_git.yml



https://oms.brotecs.com:3000/Brotecs/cloud-computing-kb/src/branch/ippbx_automation/IPPBXPlaybook/IPPBX_Automation/roles/build/tasks/cleanup_environment_local.yml

https://oms.brotecs.com:3000/Brotecs/cloud-computing-kb/src/branch/ippbx_automation/IPPBXPlaybook/IPPBX_Automation/roles/build/tasks/sync_package_building_dev.yml


Jinja:
 Template: Module

https://oms.brotecs.com:3000/Brotecs/cloud-computing-kb/src/branch/ippbx_automation/IPPBXPlaybook/IPPBX_VoIP_Calls/roles/sip/templates/record_dial_template.j2

Usage:
https://oms.brotecs.com:3000/Brotecs/cloud-computing-kb/src/branch/ippbx_automation/IPPBXPlaybook/IPPBX_VoIP_Calls/roles/sip/tasks/dial_call.yml









  docker_host_info:
  docker_container:
  wait_for:



ref: https://docs.ansible.com/ansible/latest/collections/ansible/builtin/set_fact_module.html
ansible.builtin.set_fact module – Set host variable(s) and fact(s).
---
- name: Configure Web and Database Servers
  hosts: dev, db
  vars:
    ansible_python_interpreter: /usr/bin/python3 
  become: true
  tasks:
    - name: Set Python interpreter to the virtual environment
      ansible.builtin.set_fact:
        ansible_python_interpreter: /opt/venv/bin/python
      when: "'db' in group_names"

  
# recommended that booleans be set using the complex argument style:
- name: Setting booleans using complex argument style
  ansible.builtin.set_fact:
    one_fact: yes
    other_fact: no

- name: Creating list and dictionary variables using 'shorthand' YAML
  ansible.builtin.set_fact:
    two_dict: {'something': here2, 'other': somewhere}
    two_list: [1,2,3]


- name: Setting facts so that they will be persisted in the fact cache
  ansible.builtin.set_fact:
    one_fact: something
    other_fact: "{{ local_var * 2 }}"
    cacheable: yes

- name: Setting host facts using key=value pairs, this format can only create strings or booleans
  ansible.builtin.set_fact: one_fact="something" other_fact="{{ local_var }}"

- name: Setting host facts using complex arguments
  ansible.builtin.set_fact:
    one_fact: something
    other_fact: "{{ local_var * 2 }}"
    another_fact: "{{ some_registered_var.results | map(attribute='ansible_facts.some_fact') | list }}"


       

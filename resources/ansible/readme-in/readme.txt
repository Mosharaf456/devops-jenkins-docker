

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





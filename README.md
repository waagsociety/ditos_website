# ditos_website

## Dev environment:
- Ansible
- Vagrant
- VirtualBox

## Build tools
NodeJS
- NPM >= 5

## Getting started
```$ ./download-content.sh```
```$ npm start```

Ask Nathan or Taco for the server password

## For reusing the playbook to provision a server use:
ansible-playbook playbook.yml -i hosts --ask-pass --ask-sudo-pass

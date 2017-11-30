# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  
  # Ubuntu 16.04 LTS
  config.vm.box = "ubuntu/xenial64"

  config.vm.network "forwarded_port", guest: 80, host: 4040

  config.vm.synced_folder ".", "/var/www/html", owner: "www-data", group: "www-data"

  config.vm.provision "ansible" do |ansible|
    # ansible.verbose = "v"
    ansible.playbook = "playbook.yml"
  end

end

# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/trusty64"

  # Use VirtualBox as VM provider
  config.vm.provider "virtualbox"

  # Forward Apache2 port 80 to host's 8080
  config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  config.vm.network "private_network", ip: "192.168.33.10"

  # Share an additional folder to the guest VM.
  config.vm.synced_folder "./Code", "/var/www/code"

  # Enable provisioning with chef solo
  config.vm.provision :chef_solo do |chef|
    chef.cookbooks_path = ["cookbooks"]

    # vendor recipes
    chef.add_recipe "apache2"

    # inline configs
    chef.json = {
      apache: {
        default_site_enabled: true
      }
    }
  end
end

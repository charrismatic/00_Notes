```
# -*- mode: ruby -*-
# vi: set ft=ruby :

# REFERENCE: vagrantup.com
# Vagrantfile API/syntax version
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

# SET VAGRANT BOX
config.vm.box = "boxname"

# SET VM CONFIG URL
config.vm.box_url = "http://box_host/box_name.box"

# SET FORWARDED PORT
config.vm.network :forwarded_port, guest: 80, host: 8080

# SET VM PRIVATE NETWORK / IP
# config.vm.network :private_network, ip: "192.168.33.10"

# SET PUBLIC NETWORK BRIDGE
# config.vm.network :public_network

# SET SSH ENABLE AGENT FORWARDING
# Default value: false
# config.ssh.forward_agent = true

# MOUNT FOLDERS (1) LOCAL, (2) MOUNTED, (3) options    #
#########################################################
# 1. DEFAULT
config.vm.synced_folder "./public_html", "/home/developer/public_html"

# 2. LARAVEL
#  config.vm.synced_folder "./app", "/home/developer/app"
#  config.vm.synced_folder "./vendor", "/home/developer/vendor"
#  config.vm.synced_folder "./bootstrap", "/home/developer/bootstrap"

end
```

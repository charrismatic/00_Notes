# PROBLEM WITH SSH IN VAGRANT
#https://github.com/mitchellh/vagrant/issues/7610

config.ssh.insert_key = false


# FIX PROBLEM WITH FILES NOT SENDING
$bashlaunch = <<SCRIPT
sed -e "s/#EnableSendfile off/EnableSendfile off/" /etc/httpd/conf/httpd.conf > /tmp/httptmp
	cat /tmp/httptmp > /etc/httpd/conf/httpd.conf
	/etc/init.d/httpd restart
SCRIPT
	config.vm.provision "shell", 
	inline: $bashlaunch

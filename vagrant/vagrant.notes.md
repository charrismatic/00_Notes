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

  VAGRANT

    DEBUGGING
  https://www.vagrantup.com/docs/other/debugging.html
  On Linux and Mac systems, this can be done by prepending the vagrant command with an environmental variable declaration:

  $ VAGRANT_LOG=info vagrant up
  On Windows, multiple steps are required:

  $ set VAGRANT_LOG=info
  $ vagrant up
  You can also get the debug level output using the --debug command line option. For example:

  $ vagrant up --debug
  On Linux and Mac, if you are saving the output to a file, you may need to redirect stderr and stdout using &>:

  $ vagrant up --debug &> vagrant.log
  On Windows: $ vagrant up --debug > vagrant.log 2>&1

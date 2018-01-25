

# VAGRANT BOX NOTES


### How to create a base box

https://gordonlesti.com/create-debian-8-jessie-vagrant-box/

<div class="blog-post">

# Create Debian 8 Jessie Vagrant Box

TAGS: #Debian #Linux #Vagrant #VirtualBox

This is the third and last post of this series.

[Create Debian 8 Jessie VirtualBox](/create-debian-8-jessie-virtualbox/ "Create Debian 8 Jessie VirtualBox") [Install Debian 8 Jessie Virtual Machine](/install-debian-8-jessie-virtual-machine/ "Install Debian 8 Jessie Virtual Machine")*   Create Debian 8 Jessie Vagrant Box

## Install and prepare

Login as _root_ user into the VirtualBox.

### Update and upgrade

Next we will update aptitude package information and upgrade our packages with the two following comamnds

    apt-get update
    apt-get upgrade

### Install

We will install _build-essential_, _module-assistant_, _zerofree_ and _openssh-server_ with the following three commands.

    apt-get install -y build-essential module-assistant
    module-assistant prepare
    apt-get install -y sudo zerofree openssh-server

## Permissions of vagrant user

We need to give the _vagrant_ user some permissions. Please run _visudo_.

    visudo

And add the following line, maybe after the _root_ user and close the editor after saving the file.

    vagrant ALL=(ALL) NOPASSWD: ALL

Please restart the machine with the two following commands.

    shutdown -r now

## Configure ssh

We want to configure ssh for the vagrant user. Please login as _vagrant_ user and type the following commands.

    mkdir -p /home/vagrant/.ssh

We now have to create the public key for the _vagrant_ user. Please create the file _/home/vagrant/.ssh/authorized_keys_ with the following content on your machine.

    ssh-rsa AAAAB3NzaC1yc2EAAAABIwAAAQEA6NF8iallvQVp22WDkTkyrtvp9eWW6A8YVr+kz4TjGYe7gHzIw+niNltGEFHzD8+v1I2YJ6oXevct1YeS0o9HZyN1Q9qgCgzUFtdOKLv6IedplqoPkcmF0aYet2PkEDo3MlTBckFXPITAMzF8dJSIFo9D8HfdOV0IAdx4O7PtixWKn5y2hMNG0zQPyUecp4pzC6kivAIhyfHilFR61RGL+GPXQ2MWZWFYbAGjyiYJnAmCP3NOTd0jMZEnDkbUvxhMmBYSdETk1rRgm+R4LOzFUGaHqHDLKLX+FIPKcF96hrucXzcWyLbIbEgE98OHlnVYCzRdK8jlqm8tehUc9c9WhQ== vagrant insecure public key

This is an insecure public key for the vagrant user. After that we edit the file _/etc/ssh/sshd_config_ with any editor, for example _nano_.

    sudo nano /etc/ssh/sshd_config

And uncomment the line.

    AuthorizedKeysFile %h/.ssh/authorized_keys

Now we can restart _ssh_.

    sudo service ssh restart

## VBoxLinuxAdditions

<div class="row">

<div class="col-sm-4">

Please click in the menu of the machine on _Device_ and in the submenu on _Insert Guest Additions CD image ..._.

</div>

<div class="col-sm-8">![Insert Guest Additions CD image](/media/post/create-debian-8-jessie-vagrant-box/insert_guest_additions_disk.png)</div>

</div>

After that we will mount and run the guest additions with the following three commands.

    sudo mount /dev/cdrom /mnt
    cd /mnt
    sudo ./VBoxLinuxAdditions.run

## Cleanup

Let's remove some unused stuff.

    sudo rm -rf /usr/share/doc
    sudo rm -rf /usr/src/linux-headers*
    sudo rm -rf /usr/src/linux
    sudo find /var/cache -type f -exec rm -rf {
    } \;
    sudo find /usr/share/locale/* -maxdepth 1 -type d ! -name "de*" ! -name "en*" -exec rm -rf {
    } \;
    sudo rm -rf /usr/src/vboxguest*
    sudo rm -rf /usr/src/virtualbox-guest*

### Zerofree

> Zerofree finds the unallocated blocks with non-zero value content in an ext2, ext3 or ext4 file-system and fills them with zeroes.
> 
> <footer>[packages.debian.org](https://packages.debian.org/en/jessie/zerofree "Debian -- Details of package zerofree in jessie")</footer>

Run the following comamnd to get _root_.

    sudo init 1

Let's run _zerofree_.

    mount -o remount,ro /dev/sda1
    zerofree /dev/sda1

## Finish

We will now finish the box by shuting down.

    shutdown -h now

And after that we can create the box with the following command from our host system.

    vagrant package --base debian\ jessie

</div>

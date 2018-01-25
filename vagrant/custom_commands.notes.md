https://stackoverflow.com/questions/28283099/custom-vagrant-command-with-a-plugin


 did some digging and discovered this thread. I really like agoebel's solution, but hijacking the Vagrantfile seems a little hacky and still doesn't introduce custom commands. I see this approach is being appropriate for checking plugin dependences, or some additional check before standard commands are run:

REQUIRED_PLUGINS = %w(vagrant-ohai vagrant-vbguest)
restart_required = REQUIRED_PLUGINS.any? do |plugin|
  system "vagrant plugin install #{plugin}" unless Vagrant.has_plugin?(plugin)
end
But you can also create a file in the same directory as your Vargrantfile called .vagrantplugins which a plugin definition like so:

class MyCommand < Vagrant.plugin(2, :command)
  def self.synopsis
    "Says Hello"
  end

  def execute
    puts "Hello"
    0
  end
end

class MyPlugin < Vagrant.plugin(2)
  name "My Plugin"

  command "mycommand" do
    MyCommand
  end
end
Effectively allowing you to write custom commands. Vagrant removed the functionality that allowed definition of custom commands inline in new 2.x.x version of the API.

This is a great compromise. If you vargrant list-commands, you should see:

mycommand       Says Hello



Plugin Development: Commands
https://www.vagrantup.com/docs/plugins/commands.html


Using the .vagrantplugins file

https://github.com/wikimedia/mediawiki-vagrant/blob/master/.vagrantplugins
#### FILE:> .vagrantplugins
# vim:ft=ruby:
$: << File.join(File.expand_path('..', __FILE__), 'lib')
require 'mediawiki-vagrant'
require 'mediawiki-vagrant/settings/definitions'

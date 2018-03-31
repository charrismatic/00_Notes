
# magento list

* Description: Lists commands
* Usage:

  * `list [--xml] [--raw] [--format FORMAT] [--] [<namespace>]`

The <info>list</info> command lists all commands:

  <info>php bin/magento list</info>

You can also display the commands for a specific namespace:

  <info>php bin/magento list test</info>

You can also output the information in other formats by using the <comment>--format</comment> option:

  <info>php bin/magento list --format=xml</info>

It's also possible to get raw list of commands (useful for embedding command runner):

  <info>php bin/magento list --raw</info>

### Arguments:

**namespace:**

* Name: namespace
* Is required: no
* Is array: no
* Description: The namespace name
* Default: `NULL`

### Options:

**xml:**

* Name: `--xml`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: To output list as XML
* Default: `false`

**raw:**

* Name: `--raw`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: To output raw command list
* Default: `false`

**format:**

* Name: `--format`
* Shortcut: <none>
* Accept value: yes
* Is value required: yes
* Is multiple: no
* Description: The output format (txt, xml, json, or md)
* Default: `'txt'`

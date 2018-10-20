``#net-tools`

# ifconfig


    
    irq addr         Set the interrupt line used by this device.  Not all devices can dynamically change their IRQ setting.

    io_addr addr
              Set the start address in I/O space for this device.
    
     mem_start addr
              Set the start address for shared memory used by this device.  Only a few devices need this.
    
       media type
              Set the physical port or medium type to be used by the device.  Not all devices can change this setting, and those that can vary in what values they support.  Typical values for type are 10base2 (thin Ethernet), 10baseT (twisted-pair  10Mbps  Ethernet),
              AUI (external transceiver) and so on.  The special medium type of auto can be used to tell the driver to auto-sense the media.  Again, not all drivers can do this.
    
       [-]broadcast [addr]
              If the address argument is given, set the protocol broadcast address for this interface.  Otherwise, set (or clear) the IFF_BROADCAST flag for the interface.
    
       [-]pointopoint [addr]
              This keyword enables the point-to-point mode of an interface, meaning that it is a direct link between two machines with nobody else listening on it.
              If the address argument is also given, set the protocol address of the other side of the link, just like the obsolete dstaddr keyword does.  Otherwise, set or clear the IFF_POINTOPOINT flag for the interface.
    
       hw class address
              Set  the  hardware address of this interface, if the device driver supports this operation.  The keyword must be followed by the name of the hardware class and the printable ASCII equivalent of the hardware address.  Hardware classes currently supported
              include ether (Ethernet), ax25 (AMPR AX.25), ARCnet and netrom (AMPR NET/ROM).
    
       multicast
              Set the multicast flag on the interface. This should not normally be needed as the drivers set the flag correctly themselves.
    
       address
              The IP address to be assigned to this interface.
    
       txqueuelen length
              Set the length of the transmit queue of the device. It is useful to set this to small values for slower devices with a high latency (modem links, ISDN) to prevent fast bulk transfers from disturbing interactive traffic like telnet too much.









NOTES
       Since kernel release 2.2 there are no explicit interface statistics for alias interfaces anymore. The statistics printed for the original address are shared with all alias addresses on the same device. If you want per-address statistics you should add explicit
       accounting rules for the address using the iptables(8) command.

       Interrupt problems with Ethernet device drivers fail with EAGAIN (SIOCSIIFLAGS: Resource temporarily unavailable) it is most likely a interrupt conflict. See http://www.scyld.com/expert/irq-conflict.html for more information.

FILES
       /proc/net/dev
       /proc/net/if_inet6

BUGS
       Ifconfig  uses the ioctl access method to get the full address information, which limits hardware addresses to 8 bytes.  Because Infiniband hardware address has 20 bytes, only the first 8 bytes are displayed correctly.  Please use ip link command from iproute2
       package to display link layer informations including the hardware address.

       While appletalk DDP and IPX addresses will be displayed they cannot be altered by this command.

SEE ALSO
       route(8), netstat(8), arp(8), rarp(8), iptables(8), ifup(8), interfaces(5).
       http://physics.nist.gov/cuu/Units/binary.html - Prefixes for binary multiples

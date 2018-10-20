The 802.1Q Tag
The IEEE 802.1Q standard defines the format of a 4 byte â€œtagâ€ field. The presence of a tag is indicated by the Ethertype value of 0x8100. The remainder of the tag has 3 parts: a fixed tag protocol identifier (0x8100 in hex), a user priority value ranging from 0 to 7 (called an 802.1p value) a format identified and the Virtual LAN information (VLAN id).

Note: if the VLAN id is 0, the tag contains only user priority information (this allows the 802.1Q tag to be used when VLANs are not being used).

The tag is followed by the actual EtherType value for the frame payload (e.g x0800 for an IP packet). i.e. the 4-byte tag field defined by the IEEE 802.1Q standard is inserted between the MAC source address and the Ethetrype field in an Ethernet frame. That is, the type of the frame becomes 0x8100, and the Tag itself is followed by the type of the frame payload.

Note: The Tag adds to the total frame size, and the Ethernet NICs that suppport the use of Tags therefore need to be able to send/receive slightly larger Frames. Trunk mode therefore requires IEEE 802.3ac, where the maximum frame size is extended to 1522 bytes.

The format of the header is:

  - TPID : TPID has a defined value of 0x8100. This indicates the frame carries a one-byte IEEE 802.1Q / 802.1P header.
  - Priority : The first three bits of the TCI define user priority, giving eight (2^3 ) priority levels. The deafult value os 0, indicating normal treatment. IEEE 802.1P defines the operation for these 3 user priority bits (defined in the IEEE 802.1D standard).

    Tag Value      Priority  Aconym  Traffic Type
# p-----------------------------------------------

    0 (default)  5 (default)  BE      Best Effort
    1            7 (lowest)   BK      Background
    2            6 (low)      -       Spare
    3            4 (better)   EE      Excellent Effort
    4            3            CL      Controlled Load
    5            2            VI      Video <100ms latency
    6            1            VO      Voice <10ms latency
    7            0 (highest)  NC      Network Control


  - CFI : Canonical Format Indicator is a single-bit flag, always set to zero for Ethernet switches. CFI coule be used for compatibility between Ethernet type network and Token Ring networks., but is seldom used for this purpose in practice.
  - VID : VLAN ID is the identification of the VLAN, which is basically used by the standard 802.1Q. It has 12 bits allowing identification of 4096 (2^12) VLANs. Of the 4096 possible VIDs, a VID of 0 is used to identify priority frames and value 4095 (FFF) is reserved, so the maximum possible number of supported VLANs is 4,094.





http://h17007.www1.hpe.com/device_help/ProCurveJ9562A/conf/qualityofservice/qosdiffserve.htm

# Differential Services

---------------------------
<!\-\- if (window.gbWhTopic) { if (window.addTocInfo) { addTocInfo("Configuration\\nQuality of Service\\nDifferential Services"); } if (window.writeBtnStyle) writeBtnStyle(); if (window.writeIntopicBar) writeIntopicBar(0); if(1) { } if (window.setRelStartPage) { setRelStartPage("../../SHelp.htm"); autoSync(1); sendSyncInfo(); sendAveInfoOut(); } } else if (window.gbIE4) document.location.reload(); //-->

Configuration > Quality of Service

# Differential Services

IP packets coming from an upstream device or application include a [Type of Service (ToS) byte](javascript:void(0);) containing a [DSCP](javascript:void(0);) (codepoint) that can be used for QoS prioritization. Differential services uses the DSCP in the IP packet to assign an 802.1p priority to the packet. You can also assign a new DSCP to the packet, which can be carried (along with the 802.1p priority) in the packet to downstream devices.

You can use this option to read the DSCP of an incoming IPv4 packet and, without changing this codepoint, assign the 802.1p priority to the packet. This means that a priority value of 0-7 must be configured for a DSCP before the switch will attempt to perform a QoS match on the packet’s DSCP bits.

## To enable Differential Services:

1.  Identify the DSCP in packets received from an upstream or edge switch.
    
2.  Assign the DSCPs identified in step 1 to a different DSCP policy or No-override, as explained [below](#Assign).
    
  - If QoS is using a DSCP policy, you must delete or change this assignment before you can change
    the priority setting on the codepoint. Otherwise, the switch blocks the change.
    

3.  Assign the priority you want to use for the DSCP policy.
    

  - Select __Quality of Service__ from the *Configuration* tab, and then select __DSCP Policy Table__ from the left pane.
    
  - Select the codepoint for the DSCP policy. This codepoint will be written to the header of every packet containing the codepoint to which the DSCP policy is assigned.
    
  - Use the *Priority* drop-down menu to select the priority you want to assign to the DSCP policy. 
    ossible values are 0-7 and No Override.
    

4.  By default, the priority is No-override for all codepoints except [101110](javascript:void(0);), 
    which means that a priority has not been assigned. When the assignment is No-override, 
    QoS does not affect the packet queuing priority or VLAN tagging, and the packets are handled as follows:
    

  

## 802.1Q Status 

- Received and forwarded on a tagged VLAN 
- Received on untagged VLAN and forwarded on tagged VLAN
- Forwarded on untagged VLAN


## Outbound 802.1p Priority 

- Unchanged 
- 0 (normal)
- none




4.  Assign the DSCP policy to the codepoint in inbound packets.
    
5.  Assigning DSCP policies requires knowledge of the codepoints set in IP packets by the upstream devices and applications.
        

   - Select __Quality of Service__ from the *Configuration* tab, and then select __DiffServe TOS__ from the left pane. 
     
   - Select the codepoint (in inbound packets) that will use the DSCP policy.
     
   - Use the *DSCP Policy* drop-down menu to select the DSCP policy you want to use to prioritize inbound packets with the selected codepoint.


5.  Enable differential services.
    

  - Select __Quality of Service__ from the *Configuration* tab, and then select __Type of Service__ from the left pane.
    
  - Click the *Type of Service* drop-down arrow and select __Differential Services__.
    

6.  Click __Apply Changes__.
    


NOTE: Enabling Differential Services automatically disables IP Precedence.
    

## Differential Services Operating Notes

Different applications may use the same DSCP in their IP packets. 
Also, the same application may use multiple DSCPs if the application originates on different 
clients, servers, or other devices. Using an edge switch enables you to select the packets 
you want and mark them with predictable DSCPs that can be used by downstream switches 
to honor policies set in the edge switch.

Differential Services associates a DSCP policy with a specific DSCP (codepoint) in an incoming IPv4 packet. 
(A DSCP policy consists of the codepoint to be added to the outbound packet and an associated 802.1p priority.) 
This allows the new priority and, optionally, a new DSCP to be sent to downstream devices.

For additional information, refer to the *Advanced Traffic Management Guide* for your switch.

<!\-\- highlightSearch(); if (window.writeIntopicBar) writeIntopicBar(0); if(0) { } //-->



---


VLANs
Understanding IEEE 802.1p Priority
Priority tagging is a function defined by the IEEE 802.1p standard designed to provide a means of managing traffic on a network
where many different types of data may be transmitted simultaneously. It is intended to alleviate problems associated with the
delivery of time critical data over congested networks. The quality of applications that are dependent on such time critical data,
such as video conferencing, can be severely and adversely affected by even very small delays in transmission.

Network devices that are in compliance with the IEEE 802.1p standard have the ability to recognize the priority level of data
packets. These devices can also assign a priority label or tag to packets. Compliant devices can also strip priority tags from
packets. This priority tag determines the packet's degree of expeditiousness and determines the queue to which it will be assigned.
Priority tags are given values from 0 to 7 with 0 being assigned to the lowest priority data and 7 assigned to the highest. The
highest priority tag 7 is generally only used for data associated with video or audio applications, which are sensitive to even slight
delays, or for data from specified end users, whose data transmissions warrant special consideration.

The Switch allows you to further tailor how priority tagged data packets are handled on your network. Using queues to manage
priority tagged data allows you to specify its relative priority to suit the needs of your network. There may be circumstances
where it would be advantageous to group two or more differently tagged packets into the same queue. Generally, however, it is
recommended that the highest priority queue, Queue 1, be reserved for data packets with a priority value of 7. Packets that have
not been given any priority value are placed in Queue 0 and thus given the lowest priority for delivery.

A weighted round robin system is employed on the Switch to determine the rate at which the queues are emptied of packets. The
ratio used for clearing the queues is 4:1. This means that the highest priority queue, Queue 1, will clear 4 packets for every 1
packet cleared from Queue 0.

Remember, the priority queue settings on the Switch are for all ports, and all devices connected to the Switch will be affected.
This priority queuing system will be especially beneficial if your network employs Switches with the capability of assigning
priority tags.


## VLAN Description

A Virtual Local Area Network (VLAN) is a network topology configured according to a logical scheme rather than the physical
layout. VLANs can be used to combine any collection of LAN segments into an autonomous user group that appears as a single
LAN. VLANs also logically segment the network into different broadcast domains so that packets are forwarded only between
ports within the VLAN. Typically, a VLAN corresponds to a particular subnet, although not necessarily.

VLANs can enhance performance by conserving bandwidth, and improve security by limiting traffic to specific domains.

A VLAN is a collection of end nodes grouped by logic instead of physical location. End nodes that frequently communicate with
each other are assigned to the same VLAN, regardless of where they are physically on the network. Logically, a VLAN can be
equated to a broadcast domain, because broadcast packets are forwarded to only members of the VLAN on which the broadcast
was initiated.


IEEE 802.1Q VLANs

 Some relevant terms:

- Tagging – The act of putting 802.1Q VLAN information into the header of a packet.
- Untagging – The act of stripping 802.1Q VLAN information out of the packet header.
- Ingress port – A port on a Switch where packets are flowing into the Switch and VLAN decisions must be made.
- Egress port – A port on a Switch where packets are flowing out of the Switch, either to another Switch or to an end station, and tagging decisions must be made.

 IEEE 802.1Q (tagged) VLANs are implemented on the Switch. 802.1Q VLANs require tagging, 
which enables them to span the entire network (assuming all Switches on the network are IEEE 802.1Q-compliant).

VLANs allow a network to be segmented in order to reduce the size of broadcast domains. All packets entering a VLAN will only
be forwarded to the stations (over IEEE 802.1Q enabled Switches) that are members of that VLAN, and this includes broadcast,
multicast and unicast packets from unknown sources.

VLANs can also provide a level of security to your network. IEEE 802.1Q VLANs will only deliver packets between stations that
are members of the VLAN.

Any port can be configured as either tagging or untagging. The untagging feature of IEEE 802.1Q VLANs allows VLANs to
work with legacy Switches that don't recognize VLAN tags in packet headers. The tagging feature allows VLANs to span
multiple 802.1Q-compliant Switches through a single physical connection and allows Spanning Tree to be enabled on all ports
and work normally.

The IEEE 802.1Q standard restricts the forwarding of untagged packets to the VLAN the receiving port is a member of.
The main characteristics of IEEE 802.1Q are as follows:
• Assigns packets to VLANs by filtering.

• Assumes the presence of a single global spanning tree.
• Uses an explicit tagging scheme with one-level tagging.
• 802.1Q VLAN Packet Forwarding

Packet forwarding decisions are made based upon the following
three types of rules:

• Ingress rules - rules relevant to the classification of
received frames belonging to a VLAN.

• Forwarding rules between ports - decides whether to
filter or forward the packet.

• Egress rules - determines if the packet must be sent
tagged or untagged.




## 802.1Q VLAN Tags

The figure below shows the 802.1Q VLAN tag. 

There are four additional octets inserted after the source MAC address. 
Their presence is indicated by a value of 0x8100 in the EtherType field. 

When a packet's EtherType field is equal to 0x8100, the packet carries the IEEE 802.1Q/802.1p tag. 
The tag is contained in the following two octets and consists of 3 bits of user priority, 1 bit of
Canonical Format Identifier (CFI - used for encapsulating Token Ring packets so they can be carried across Ethernet backbones),
and 12 bits of VLAN ID (VID). 

The 3 bits of user priority are used by 802.1p. 

The VID is the VLAN identifier and is used by the 802.1Q standard.

Because the VID is 12 bits long, 4094 unique VLANs can be identified.

The tag is inserted into the packet header making the entire packet longer by 4 octets. All of the information originally contained
in the packet is retained. 



## Port VLAN ID

Packets that are tagged (are carrying the 802.1Q VID information) can be transmitted from one 802.1Q compliant network device
to another with the VLAN information intact. This allows 802.1Q VLANs to span network devices (and indeed, the entire
network, if all network devices are 802.1Q compliant).

Unfortunately, not all network devices are 802.1Q compliant. These devices are referred to as tag-unaware. 802.1Q devices are
referred to as tag-aware.


Prior to the adoption of 802.1Q VLANs, port-based and MAC-based VLANs were in common use. These VLANs relied upon a
Port VLAN ID (PVID) to forward packets. A packet received on a given port would be assigned that port's PVID and then be
forwarded to the port that corresponded to the packet's destination address (found in the Switch's forwarding table). If the PVID
of the port that received the packet is different from the PVID of the port that is to transmit the packet, the Switch will drop the
packet.


Within the Switch, different PVIDs mean different VLANs (remember that two VLANs cannot communicate without an external
router). Therefore, VLAN identification based upon the PVIDs cannot create VLANs that extend outside a given Switch (or
Switch stack).


Every physical port on a Switch has a PVID. 802.1Q ports are also assigned a PVID, for use within the Switch. 

If no VLANs are defined on the Switch, all ports are then assigned to a default VLAN with a PVID equal to 1.

Untagged packets are assigned the PVID of the port on which they were received. 

Forwarding decisions are based upon this PVID, in so far as VLANs are concerned. 

Tagged packets are forwarded according to the VID contained within the tag. Tagged packets are also assigned a PVID,
but the PVID is not used to make packet forwarding decisions, the VID is.


Tag-aware Switches must keep a table to relate PVIDs within the Switch to VIDs on the network. 

The Switch will compare the VID of a packet to be transmitted to the VID of the port that is to transmit the packet. 

If the two VIDs are different, the Switch will drop the packet. 

Because of the existence of the PVID for untagged packets and the VID for tagged packets, tag-aware and tag-unaware network devices can coexist on the same network.

### Figure 7- 37. 802.1Q Static VLANs window (Modify)

The following fields can then be set in either the Add or Modify 802.1Q Static VLANs windows:

### Parameter Description

- VID (VLAN ID) Allows the entry of a VLAN ID in the Add window, or displays the VLAN ID of an existing VLAN
in the Modify window.

VLANs can be identified by either the VID or the VLAN name.

VLAN Name Allows the entry of a name for the new VLAN in the 

Add window, or for editing the VLAN name in the Modify window.

Advertisement Enabling this function will allow the Switch to send out GVRP packets to outside sources,
notifying that they may join the existing VLAN.
Port Settings - Allows an individual port to be specified as member of a VLAN.
Tag Specifies the port as either 802.1Q tagging or 802.1Q untagged. Checking the box will designate
the port as Tagged.

None Allows an individual port to be specified as a non-VLAN member. Egress Select this to specify the port as a static member of the VLAN. Egress member ports are ports
that will be transmitting traffic for the VLAN. These ports can be either tagged or untagged. 

Forbidden Select this to specify the port as not being a member of the VLAN and that the port is forbidden
from becoming a member of the VLAN dynamically.

Click Apply to implement changes made

A Switch port can have only one PVID, but can have as many VIDs as the Switch has memory in its VLAN table to store them.
Because some devices on a network may be tag-unaware, a decision must be made at each port on a tag-aware device before
packets are transmitted - should the packet to be transmitted have a tag or not? If the transmitting port is connected to a tagunaware
device, the packet should be untagged. If the transmitting port is connected to a tag-aware device, the packet should be tagged.

## Tagging and Untagging

Every port on an 802.1Q compliant Switch can be configured as tagging or untagging.
Ports with tagging enabled will put the VID number, priority and other VLAN information into the header of all packets that flow
into and out of it. If a packet has previously been tagged, the port will not alter the packet, thus keeping the VLAN information
intact. 

The VLAN information in the tag can then be used by other 802.1Q compliant devices on the network to make packet-forwarding
decisions.

Ports with untagging enabled will strip the 802.1Q tag from all packets that flow into and out of those ports. If the packet doesn't
have an 802.1Q VLAN tag, the port will not alter the packet. Thus, all packets received by and forwarded by an untagging port
will have no 802.1Q VLAN information. (Remember that the PVID is only used internally within the Switch). Untagging is used
to send packets from an 802.1Q-compliant network device to a non-compliant network device.


## Ingress Filtering

A port on a Switch where packets are flowing into the Switch and VLAN decisions must be made is referred to as an ingress port.
If ingress filtering is enabled for a port, the Switch will examine the VLAN information in the packet header (if present) and
decide whether or not to forward the packet.

If the packet is tagged with VLAN information, the ingress port will first determine if the ingress port itself is a member of the
tagged VLAN. If it is not, the packet will be dropped. If the ingress port is a member of the 802.1Q VLAN, the Switch then
determines if the destination port is a member of the 802.1Q 

VLAN. If it is not, the packet is dropped. 

If the destination port is a member of the 802.1Q VLAN, the packet is forwarded and the destination port transmits it to its attached network segment.
If the packet is not tagged with VLAN information, the ingress port will tag the packet with its own PVID as a VID (if the port is
a tagging port). 

The Switch then determines if the destination port is a member of the same VLAN (has the same VID) as the ingress port. 

If it does not, the packet is dropped. If it has the same VID, the packet is forwarded and the destination port transmit it on its attached network segment.

This process is referred to as ingress filtering and is used to conserve bandwidth within the Switch by dropping packets that are
not on the same VLAN as the ingress port at the point of reception. This eliminates the subsequent processing of packets that will
just be dropped by the destination port.


## Default VLANs


The Switch initially configures one VLAN,**VID = 1**, called "**default**." 


The factory default setting assigns all ports on the Switch to the "**default**"

Packets cannot cross VLANs. If a member of one VLAN wants to connect to another VLAN, the link must be through an external router.


NOTE: If no VLANs are configured on the Switch, then all packets will be forwarded to any destination port. 

Packets with unknown source addresses will be flooded to all ports.
roadcast and multicast packets will also be flooded to all ports.

An example is presented below: 

VLAN Name VID Switch Ports 

- System (default) 1 5, 6, 7, 8, 21, 22, 23, 24
- Engineering 2 9, 10, 11, 12
- Marketing   3 13, 14, 15, 16
- Finance     4 17, 18, 19, 20
- Sales       5 1, 2, 3, 4
- Table       7- 2. 

VLAN Example - Assigned Ports
VLAN and Trunk Groups

The members of a trunk group have the same VLAN setting.
Any VLAN setting on the members of a trunk group will apply to the other member ports.

NOTE: In order to use VLAN segmentation in conjunction with port trunk groups, 

first set the port trunk group(s), and then configure VLAN settings. 

To change the port trunk grouping with VLANs already in place, users will not need to reconfigure the

VLAN settings after changing the port trunk group settings. 

VLAN settings will automatically change in conjunction with the change of the port trunk group settings




NOTE: In order to use VLAN segmentation in conjunction with port trunk groups, first set the port trunk group(s), and then configure VLAN settings. 

To change the port trunk grouping with VLANs already in place, users will not need to reconfigure the 

VLAN settings after changing the port trunk group settings. 

VLAN settings will automatically change in conjunction with the change of the port trunk group settings. 



## Figure 7- 37. 802.1Q Static VLANs window (Modify)

The following fields can then be set in either the Add or Modify 802.1Q Static VLANs windows: 

### Parameter Description


VID (VLAN ID) Allows the entry of a VLAN ID in the Add window, or displays the VLAN ID of an existing VLAN

in the Modify window. VLANs can be identified by either the VID or the VLAN name.
VLAN Name Allows the entry of a name for the new VLAN in the Add window, or for editing the VLAN name
in the Modify window.

Advertisement Enabling this function will allow the Switch to send out GVRP packets to outside sources,
notifying that they may join the existing VLAN.

Port Settings 

 - Allows an individual port to be specified as member of a VLAN.

Tag Specifies the port as either 802.1Q tagging or 802.1Q untagged. 
Checking the box will designate the port as Tagged.

None Allows an individual port to be specified as a non-VLAN member.

Egress Select this to specify the port as a static member of the VLAN. Egress member ports are ports
that will be transmitting traffic for the VLAN. These ports can be either tagged or untagged.

Forbidden Select this to specify the port as not being a member of the VLAN and that the port is forbidden
from becoming a member of the VLAN dynamically.

Click Apply to implement changes made 




???

General — The interface can be a tagged or untagged member of one or more VLANs.
Access — The interface is an untagged member of a single VLAN. If this option is chosen, skip to Step 14.
Trunk — The interface is an untagged member of at most one VLAN and is a tagged member of one or more VLANs. If this option is chosen, skip to Step 14.
Customer — The interface is in Q-in-Q mode. This enables the link partner to use their own VLAN arrangements across the provider network. If this option is chosen, skip to Step 14.
Private VLAN – Host — This option sets the interface as either isolated or community. You can then choose either an isolated or community VLAN in the Secondary VLAN - Host area.
Private VLAN – Promiscuous — This option sets the interface as promiscuous.


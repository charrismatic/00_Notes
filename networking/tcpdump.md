https://www.tecmint.com/12-tcpdump-commands-a-network-sniffer-tool/



https://en.wikipedia.org/wiki/Netsniff-ng

The toolkit currently consists of a [network analyzer](https://en.wikipedia.org/wiki/Packet_analyzer), [packet capturer](https://en.wikipedia.org/wiki/Packet_capture) and replayer, a wire-rate [traffic generator](https://en.wikipedia.org/wiki/Traffic_generator), an encrypted multiuser [IP](https://en.wikipedia.org/wiki/Internet_Protocol)[tunnel](https://en.wikipedia.org/wiki/Virtual_private_network), a [Berkeley Packet Filter](https://en.wikipedia.org/wiki/Berkeley_Packet_Filter) compiler, networking statistic tools, an [autonomous system](https://en.wikipedia.org/wiki/Autonomous_system_(Internet)) trace route and more:[[6\]](https://en.wikipedia.org/wiki/Netsniff-ng#cite_note-6)

- **netsniff-ng**, a zero-copy analyzer, packet capturer and replayer, itself supporting the [pcap](https://en.wikipedia.org/wiki/Pcap) file format
- **trafgen**, a zero-copy wire-rate [traffic generator](https://en.wikipedia.org/wiki/Traffic_generator)
- **mausezahn**, a packet generator and analyzer for HW/SW appliances with a Cisco-CLI
- **bpfc**, a [Berkeley Packet Filter](https://en.wikipedia.org/wiki/Berkeley_Packet_Filter) compiler
- **ifpps**, a top-like kernel networking statistics tool
- **flowtop**, a top-like [netfilter](https://en.wikipedia.org/wiki/Netfilter) connection tracking tool with Geo-IP information
- **curvetun**, a lightweight multiuser [IP tunnel](https://en.wikipedia.org/wiki/IP_tunnel) based on [elliptic curve cryptography](https://en.wikipedia.org/wiki/Elliptic_curve_cryptography)
- **astraceroute**, an [autonomous system](https://en.wikipedia.org/wiki/Autonomous_system_(Internet)) trace route utility with Geo-IP information



Basic commands working in netsniff-ng
In these examples, it is assumed that eth0 is the used network interface. Programs in the netsniff-ng suite accept long options, e.g., --in ( -i ), --out ( -o ), --dev ( -d ).

For geographical AS TCP SYN probe trace route to a website:
astraceroute -d eth0 -N -S -H <host e.g., netsniff-ng.org>

For kernel networking statistics within promiscuous mode:
ifpps -d eth0 -p

For high-speed network packet traffic generation, trafgen.txf is the packet configuration:
trafgen -d eth0 -c trafgen.txf

For compiling a Berkeley Packet Filter fubar.bpf:
bpfc fubar.bpf

For live-tracking of current TCP connections (including protocol, application name, city and country of source and destination):
flowtop

For efficiently dumping network traffic in a pcap file:
netsniff-ng -i eth0 -o dump.pcap -s -b 0
**nslookup** is a command-line administrative tool for testing and troubleshooting **DNS** servers (**Domain Name Server**). It is used to query specific **DNS** resource records (**RR**) as well. Most operating systems comes with built-in nslookup feature

#### 1. Find out “A” record (IP address) of Domain

```
# nslookup yahoo.com
Server:         4.2.2.2
Address:        4.2.2.2#53
Non-authoritative answer:
Name:   yahoo.com
Address: 72.30.38.140
Name:   yahoo.com
Address: 98.139.183.24
Name:   yahoo.com
Address: 209.191.122.70
```

Above command query domain **www.yahoo.com** with **4.2.2.2** public DNS server and below section shows **Non-authoritative answer**: displays **A** record of **www.yahoo.com**





#### 2. Find out Reverse Domain Lookup

```
# nslookup 209.191.122.70
Server:         4.2.2.2
Address:        4.2.2.2#53
Non-authoritative answer:
70.122.191.209.in-addr.arpa     name = ir1.fp.vip.mud.yahoo.com.
Authoritative answers can be found from:
```

#### 3. Find out specific Domain Lookup.

```
# nslookup ir1.fp.vip.mud.yahoo.com.
Server:         4.2.2.2
Address:        4.2.2.2#53
Non-authoritative answer:
Name:   ir1.fp.vip.mud.yahoo.com
Address: 209.191.122.70
```

#### 4. To Query MX (Mail Exchange) record.

```
# nslookup -query=mx www.yahoo.com
Server:         4.2.2.2
Address:        4.2.2.2#53
Non-authoritative answer:
www.yahoo.com   canonical name = fd-fp3.wg1.b.yahoo.com.
fd-fp3.wg1.b.yahoo.com  canonical name = ds-fp3.wg1.b.yahoo.com.
ds-fp3.wg1.b.yahoo.com  canonical name = ds-any-fp3-lfb.wa1.b.yahoo.com.
ds-any-fp3-lfb.wa1.b.yahoo.com  canonical name = ds-any-fp3-real.wa1.b.yahoo.com.
Authoritative answers can be found from:
wa1.b.yahoo.com
origin = yf1.yahoo.com
mail addr = hostmaster.yahoo-inc.com
serial = 1344827307
refresh = 30
retry = 30
expire = 86400
minimum = 1800
```



**MX** record is being used to map a domain name to a list of mail exchange servers for that domain. So that it tells that whatever mail received / sent to **@yahoo.com** will be routed to mail server.

#### 5. To query NS(Name Server) record.

```
# nslookup -query=ns www.yahoo.com
Server:         4.2.2.2
Address:        4.2.2.2#53
Non-authoritative answer:
www.yahoo.com   canonical name = fd-fp3.wg1.b.yahoo.com.
fd-fp3.wg1.b.yahoo.com  canonical name = ds-fp3.wg1.b.yahoo.com.
ds-fp3.wg1.b.yahoo.com  canonical name = ds-any-fp3-lfb.wa1.b.yahoo.com.
ds-any-fp3-lfb.wa1.b.yahoo.com  canonical name = ds-any-fp3-real.wa1.b.yahoo.com.
Authoritative answers can be found from:
wa1.b.yahoo.com
origin = yf1.yahoo.com
mail addr = hostmaster.yahoo-inc.com
serial = 1344827782
refresh = 30
retry = 30
expire = 86400
minimum = 1800
```

#### 6. To query SOA (Start of Authority) record.

```
# nslookup -type=soa www.yahoo.com
Server:         4.2.2.2
Address:        4.2.2.2#53
Non-authoritative answer:
www.yahoo.com   canonical name = fd-fp3.wg1.b.yahoo.com.
fd-fp3.wg1.b.yahoo.com  canonical name = ds-fp3.wg1.b.yahoo.com.
ds-fp3.wg1.b.yahoo.com  canonical name = ds-any-fp3-lfb.wa1.b.yahoo.com.
ds-any-fp3-lfb.wa1.b.yahoo.com  canonical name = ds-any-fp3-real.wa1.b.yahoo.com.
Authoritative answers can be found from:
wa1.b.yahoo.com
origin = yf1.yahoo.com
mail addr = hostmaster.yahoo-inc.com
serial = 1344827965
refresh = 30
retry = 30
expire = 86400
minimum = 1800
```

#### 7. To query all Available DNS records.

```
# nslookup -query=any yahoo.com
Server:         4.2.2.2
Address:        4.2.2.2#53
Non-authoritative answer:
yahoo.com
origin = ns1.yahoo.com
mail addr = hostmaster.yahoo-inc.com
serial = 2012081016
refresh = 3600
retry = 300
expire = 1814400
minimum = 600
Name:   yahoo.com
Address: 98.139.183.24
Name:   yahoo.com
Address: 209.191.122.70
Name:   yahoo.com
Address: 72.30.38.140
yahoo.com       mail exchanger = 1 mta7.am0.yahoodns.net.
yahoo.com       mail exchanger = 1 mta5.am0.yahoodns.net.
yahoo.com       mail exchanger = 1 mta6.am0.yahoodns.net.
yahoo.com       nameserver = ns3.yahoo.com.
yahoo.com       nameserver = ns4.yahoo.com.
yahoo.com       nameserver = ns2.yahoo.com.
yahoo.com       nameserver = ns8.yahoo.com.
yahoo.com       nameserver = ns1.yahoo.com.
yahoo.com       nameserver = ns6.yahoo.com.
yahoo.com       nameserver = ns5.yahoo.com.
Authoritative answers can be found from:
```

#### 8. Enable Debug mode

To enable **Debug Mode** ‘set debug’ will return you verbose information like **TTL**, here’s the output.

```
# nslookup -debug yahoo.com
> set debug
> yahoo.com
Server:         4.2.2.2
Address:        4.2.2.2#53
------------
QUESTIONS:
yahoo.com, type = A, class = IN
ANSWERS:
->  yahoo.com
internet address = 72.30.38.140
ttl = 1523
->  yahoo.com
internet address = 98.139.183.24
ttl = 1523
->  yahoo.com
internet address = 209.191.122.70
ttl = 1523
AUTHORITY RECORDS:
ADDITIONAL RECORDS:
------------
Non-authoritative answer:
Name:   yahoo.com
Address: 72.30.38.140
Name:   yahoo.com
Address: 98.139.183.24
Name:   yahoo.com
Address: 209.191.122.70
```

In this article, we have tried to cover nslookup commands which may help you to search (**DNS**) Domain Name Service related information. Next article will be on Linux [Dig command](https://www.tecmint.com/10-linux-dig-domain-information-groper-commands-to-query-dns/) which is Similar to nslookup. If you liked the article please share with your friends and don’t forget to give your valuable feedback’s through comment box.
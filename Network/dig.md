**Dig** stands for (**Domain Information Groper**) is a network administration command-line tool for querying **Domain Name System** (**DNS**) name servers. It is useful for verifying and troubleshooting **DNS** problems and also to perform **DNS** lookups and displays the answers that are returned from the name server that were queried. dig is part of the BIND domain name server software suite. dig command replaces older tool such as **nslookup** and the host. dig tool is available in major Linux distributions.



## QUERY ALL RECORDS TYPE 

```sh
dig <domain.com> ANY +noall +answer
```







1. Query Domain “A” Record

```
# dig yahoo.com; <<>> DiG 9.8.2rc1-RedHat-9.8.2-0.10.rc1.el6_3.2 <<>> yahoo.com
;; global options: +cmd
;; Got answer:
;; ->>HEADER<
```

Above command causes dig to look up the **“A”** record for the domain name **yahoo.com**. Dig command reads the **/etc/resolv.conf** file and querying the **DNS** servers listed there. The response from the **DNS** server is what dig displays.

##### Let us understand the output of the commands:

1. Lines beginning with **;** are comments not part of the information.
2. The first line tell us the version of dig (**9.8.2**) command.
3. Next, dig shows the header of the response it received from the **DNS** server
4. Next comes the question section, which simply tells us the query, which in this case is a query for the **“A”**record of **yahoo.com**. The **IN** means this is an Internet lookup (in the Internet class).
5. The answer section tells us that **yahoo.com** has the **IP** address **72.30.38.140**
6. Lastly there are some stats about the query. You can turn off these stats using the **+nostats** option.

#### 2. Query Domain “A” Record with +short

By default dig is quite verbose. One way to cut down the output is to use the **+short** option. which will drastically cut the output as shown below.

```shell
# dig yahoo.com +short
98.139.183.24
72.30.38.140
98.138.253.109
```







 **Note:** By default dig looks for the **“A”** record of the domain specified, but you can specify other records also. The **MX** or **Mail eXchange** record tells mail servers how to route the email for the domain. Likewise **TTL**, **SOA** etc.

#### 3. Querying MX Record for Domain

Querying different types of DNS resource records only.

```
# dig yahoo.com MX
; <> DiG 9.8.2rc1-RedHat-9.8.2-0.10.rc1.el6_3.2 <> yahoo.com MX
;; global options: +cmd
;; Got answer:
;; ->>HEADER<<- opcode: QUERY, status: NOERROR, id: 31450
;; flags: qr rd ra; QUERY: 1, ANSWER: 3, AUTHORITY: 0, ADDITIONAL: 24
;; QUESTION SECTION:
;yahoo.com.                     IN      MX
;; ANSWER SECTION:
yahoo.com.              33      IN      MX      1 mta6.am0.yahoodns.net.
yahoo.com.              33      IN      MX      1 mta7.am0.yahoodns.net.
yahoo.com.              33      IN      MX      1 mta5.am0.yahoodns.net.
```

#### 4. Querying SOA Record for Domain

```
# dig yahoo.com SOA
; <> DiG 9.8.2rc1-RedHat-9.8.2-0.10.rc1.el6_3.2 <> yahoo.com SOA
;; global options: +cmd
;; Got answer:
;; ->>HEADER<<- opcode: QUERY, status: NOERROR, id: 2197
;; flags: qr rd ra; QUERY: 1, ANSWER: 1, AUTHORITY: 7, ADDITIONAL: 7
;; QUESTION SECTION:
;yahoo.com.                     IN      SOA
;; ANSWER SECTION:
yahoo.com.              1800    IN      SOA     ns1.yahoo.com. hostmaster.yahoo-inc.com. 2012081409 3600 300 1814400 600
```

#### 5. Querying TTL Record for Domain

```
# dig yahoo.com TTL
; <> DiG 9.8.2rc1-RedHat-9.8.2-0.10.rc1.el6_3.2 <> yahoo.com TTL
;; global options: +cmd
;; Got answer:
;; ->>HEADER<<- opcode: QUERY, status: NOERROR, id: 56156
;; flags: qr rd ra; QUERY: 1, ANSWER: 3, AUTHORITY: 0, ADDITIONAL: 0
;; QUESTION SECTION:
;yahoo.com.                     IN      A
;; ANSWER SECTION:
yahoo.com.              3589    IN      A       98.138.253.109
yahoo.com.              3589    IN      A       98.139.183.24
yahoo.com.              3589    IN      A       72.30.38.140
```

#### 6. Querying only answer section

```
# dig yahoo.com +nocomments +noquestion +noauthority +noadditional +nostats
; <<>> DiG 9.8.2rc1-RedHat-9.8.2-0.10.rc1.el6 <<>> yahoo.com +nocomments +noquestion +noauthority +noadditional +nostats
;; global options: +cmd
yahoo.com.              3442    IN      A       72.30.38.140
yahoo.com.              3442    IN      A       98.138.253.109
yahoo.com.              3442    IN      A       98.139.183.24
```

#### 7. Querying ALL DNS Records Types

```
# dig yahoo.com ANY +noall +answer
; <<>> DiG 9.8.2rc1-RedHat-9.8.2-0.10.rc1.el6 <<>> yahoo.com ANY +noall +answer
;; global options: +cmd
yahoo.com.              3509    IN      A       72.30.38.140
yahoo.com.              3509    IN      A       98.138.253.109
yahoo.com.              3509    IN      A       98.139.183.24
yahoo.com.              1709    IN      MX      1 mta5.am0.yahoodns.net.
yahoo.com.              1709    IN      MX      1 mta6.am0.yahoodns.net.
yahoo.com.              1709    IN      MX      1 mta7.am0.yahoodns.net.
yahoo.com.              43109   IN      NS      ns2.yahoo.com.
yahoo.com.              43109   IN      NS      ns8.yahoo.com.
yahoo.com.              43109   IN      NS      ns3.yahoo.com.
yahoo.com.              43109   IN      NS      ns1.yahoo.com.
yahoo.com.              43109   IN      NS      ns4.yahoo.com.
yahoo.com.              43109   IN      NS      ns5.yahoo.com.
yahoo.com.              43109   IN      NS      ns6.yahoo.com.
```

#### 8. DNS Reverse Look-up

Querying **DNS** Reverse Look-up. Only display answer section with using **+short**.

```
# dig -x 72.30.38.140 +short
ir1.fp.vip.sp2.yahoo.com.
```

#### 9. Querying Multiple DNS Records

Query multiple website’s DNS specific query viz. **MX**, **NS** etc. records.

```
# dig yahoo.com mx +noall +answer redhat.com ns +noall +answer
; <<>> DiG 9.8.2rc1-RedHat-9.8.2-0.10.rc1.el6 <<>> yahoo.com mx +noall +answer redhat.com ns +noall +answer
;; global options: +cmd
yahoo.com.              1740    IN      MX      1 mta6.am0.yahoodns.net.
yahoo.com.              1740    IN      MX      1 mta7.am0.yahoodns.net.
yahoo.com.              1740    IN      MX      1 mta5.am0.yahoodns.net.
redhat.com.             132     IN      NS      ns1.redhat.com.
redhat.com.             132     IN      NS      ns4.redhat.com.
redhat.com.             132     IN      NS      ns3.redhat.com.
redhat.com.             132     IN      NS      ns2.redhat.com.
```

#### 10. Create .digrc file

Create **.digrc** file under **$HOME/.digrc** to store default dig options.

```
# dig yahoo.com
yahoo.com.              3427    IN      A       72.30.38.140
yahoo.com.              3427    IN      A       98.138.253.109
yahoo.com.              3427    IN      A       98.139.183.24
```

We have store **+noall** **+answer** options permanently in **.digrc** file under user’s home directory. Now, whenever dig command execute it will show only answer section of dig output. No Need to type every-time options like **+noall****+answer**.

In this article, we tried to find out dig command which may help you to search (DNS) Domain Name Service related information. Share your thoughts through comment box.
# OpenSSL

Start

https://support.asperasoft.com/hc/en-us/articles/216128468-OpenSSL-commands-to-check-and-verify-your-SSL-certificate-key-and-CSR


OpenSSL commands to check and verify your SSL certificate, key and CSR
Avatar	Jeremy Harrington
January 16, 2018 18:01

It can be useful to check a certificate and key before applying them to your server. The following commands help verify the certificate, key, and CSR (Certificate Signing Request).

Check a certificate

Check a certificate and return information about it (signing authority, expiration date, etc.):

```
openssl x509 -in server.crt -text -noout
```

Check a key

Check the SSL key and verify the consistency:
```
openssl rsa -in server.key -check
```

Check a CSR

Verify the CSR and print CSR data filled in when generating the CSR:

```
openssl req -text -noout -verify -in server.csr
```

Verify a certificate and key matches

These two commands print out md5 checksums of the certificate and key; the checksums can be compared to verify that the certificate and key match.

```
openssl x509 -noout -modulus -in server.crt| openssl md5
openssl rsa -noout -modulus -in server.key| openssl md5
```



### OPTIONS 

 -inform arg     - input format - default PEM (one of DER, NET or PEM)
 -outform arg    - output format - default PEM (one of DER, NET or PEM)
 -keyform arg    - private key format - default PEM
 -CAform arg     - CA format - default PEM
 -CAkeyform arg  - CA key format - default PEM
 -in arg         - input file - default stdin
 -out arg        - output file - default stdout
 -passin arg     - private key password source
 -serial         - print serial number value
 -subject_hash   - print subject hash value
 -subject_hash_old   - print old-style (MD5) subject hash value
 -issuer_hash    - print issuer hash value
 -issuer_hash_old    - print old-style (MD5) issuer hash value
 -hash           - synonym for -subject_hash
 -subject        - print subject DN
 -issuer         - print issuer DN
 -email          - print email address(es)
 -startdate      - notBefore field
 -enddate        - notAfter field
 -purpose        - print out certificate purposes
 -dates          - both Before and After dates
 -modulus        - print the RSA key modulus
 -pubkey         - output the public key
 -fingerprint    - print the certificate fingerprint
 -alias          - output certificate alias
 -noout          - no certificate output
 -ocspid         - print OCSP hash values for the subject name and public key
 -ocsp_uri       - print OCSP Responder URL(s)
 -trustout       - output a "trusted" certificate
 -clrtrust       - clear all trusted purposes
 -clrreject      - clear all rejected purposes
 -addtrust arg   - trust certificate for a given purpose
 -addreject arg  - reject certificate for a given purpose
 -setalias arg   - set certificate alias
 -days arg       - How long till expiry of a signed certificate - def 30 days
 -checkend arg   - check whether the cert expires in the next arg seconds
                   exit 1 if so, 0 if not
 -signkey arg    - self sign cert with arg
 -x509toreq      - output a certification request object
 -req            - input is a certificate request, sign and output.
 -CA arg         - set the CA certificate, must be PEM format.
 -CAkey arg      - set the CA key, must be PEM format
                   missing, it is assumed to be in the CA file.
 -CAcreateserial - create serial number file if it does not exist
 -CAserial arg   - serial file
 -set_serial     - serial number to use
 -text           - print the certificate in text form
 -C              - print out C code forms
 -<dgst>         - digest to use, see openssl dgst -h output for list
 -extfile        - configuration file with X509V3 extensions to add
 -extensions     - section from config file with X509V3 extensions to add
 -clrext         - delete extensions before signing and input certificate
 -nameopt arg    - various certificate name options
 -engine e         - use engine e, possibly a hardware device.
 -certopt arg      - various certificate text options
 -checkhost host   - check certificate matches "host"
 -checkemail email - check certificate matches "email"
 -checkip ipaddr   - check certificate matches "ipaddr"


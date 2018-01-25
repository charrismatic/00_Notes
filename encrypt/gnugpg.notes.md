## GNUPGP COMMANDS

### NEW KEY

`gpg --gen-key`

### LIST KEYS IN KEYRING

`gpg -list-keys and --list-secret-keys`

### IMPORT KEY

`gpg --import KEYFILE`

### ENCRYPT WITH PUBLIC KEY

`gpg -e -r admin@linuxaria.com mysecretdocument.txt`

---

## REFERENCES

- [What is a good solution to encrypt some files in unix? | Server Fault](https://serverfault.com/questions/489140/what-is-a-good-solution-to-encrypt-some-files-in-unix)
- https://www.howtoforge.com/tutorial/linux-commandline-encryption-tools/ | Getting started with commandline encryption tools on Linux
- http://openpgp.org/software/developer/ | Developer Tools - OpenPGP
- http://irtfweb.ifa.hawaii.edu/~lockhart/gpg/gpg-cs.html | GPG Cheat Sheet
- https://www.gnupg.org/gph/en/manual/x110.html | Encrypting and decrypting documents
-  https://linuxaria.com/howto/how-to-easily-encrypt-a-file-with-gpg-on-linux | How to easily encrypt a file with GPG on Linux | Linuxaria
- http://www.dewinter.com/gnupg_howto/english/GPGMiniHowto.html | Gnu Privacy Guard (GnuPG) Mini Howto (English)
How to extract text from a PSD file?



# OPTION 1

VIM comes with a flag that lets you edit a binary file.

I tried editing a PSD file with:

`vim -b file.psd`

NOTE: OK, now that I'm on my 10 PSD file, you have to regex two chars to make this work (at least with CS3 PSD format): `"^0"` to `""` (empty) and `^M` to `"\r"` makes it easier to see the text


# OPITION 2 - STRINGS
`strings FILENAME > temp.txt`

`strings -d -e S FILENAME > temp.txt`


# OPTION 3 - NODE.JS PACKAGE

Just released this feature in the NPM package psd-cli. Makes it simple to extract text content without the headache of manually running through the file...

One-line command install (needs NodeJS/NPM installed)

`npm install -g psd-cli`

You can then use it by typing in your terminal

`psd myfile.psd -t`d myfile.psd -t

This will create myfile.txt, containing all text extracted from each PSD

This will create `myfile.txt`, containing all text extracted from each PSD layer with the layer structure attached.

https://www.npmjs.com/package/psd-cli







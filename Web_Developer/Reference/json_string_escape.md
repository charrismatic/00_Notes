# JSON String Escape / Unescape

Escapes or unescapes a JSON string removing traces of offending characters that could prevent parsing.

The following characters are reserved in JSON and must be properly escaped to be used in strings:

- **Backspace** is replaced with **\b**
- **Form feed** is replaced with **\f**
- **Newline** is replaced with **\n**
- **Carriage return** is replaced with **\r**
- **Tab** is replaced with **\t**
- **Double quote** is replaced with **\"**
- **Backslash** is replaced with **\\**
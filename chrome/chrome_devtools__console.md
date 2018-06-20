## String substitution and formatting

The first parameter passed to any of the logging methods may contain one or more format specifiers. A format specifier consists of a `%` symbol followed by a letter that indicates the formatting that applies to the value. The parameters following the string apply to the placeholders in order.

The following example uses the string and digit formatters to insert values into the output string. You will see "Sam has 100 points" in the console.

```
console.log("%s has %d points", "Sam", 100);
```

The full list of format specifiers is:

| Specifier | Output                                                       |
| --------- | ------------------------------------------------------------ |
| %s        | Formats the value as a string                                |
| %i or %d  | Formats the value as an integer                              |
| %f        | Formats the value as a floating point value                  |
| %o        | Formats the value as an expandable DOM element. As seen in the Elements panel |
| %O        | Formats the value as an expandable JavaScript object         |
| %c        | Applies CSS style rules to the output string as specified by the second parameter |

This example uses the digit specifier to format the value of `document.childNodes.length`. It also uses the floating point specifier to format the value of `Date.now()`.

The code:

```
console.log("Node count: %d, and the time is %f.", document.childNodes.length, Date.now());
```

### Styling console output with CSS

The CSS format specifier allows you to customize the display in the console. Start the string with the specifier and give the style you wish to apply as the second parameter.

Try this code:

```
console.log("%cThis will be formatted with large, blue text", "color: blue; font-size: x-large");
```

.
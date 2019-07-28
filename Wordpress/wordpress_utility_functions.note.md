

### UTILITIES

https://developer.wordpress.org/reference/files/wp-includes/formatting.php/page/5/

__clean_url__

Filters a string cleaned and escaped for output as a URL.
`apply_filters( 'clean_url', string $good_protocol_url, string $original_url, string $_context )`


__$good_protocol_url__
- (string)
 - The cleaned URL to be returned.

__$original_url__
- (string)
 - The URL prior to cleaning.

__$_context__
- (string)
 - If 'display', replace ampersands and single quotes only.

---



wp_spaces_regexp()

Returns the regexp for common whitespace characters.


apply_filters( 'wp_spaces_regexp', string $spaces )

Filters the regexp for common whitespace characters.

This string is substituted for the \s sequence as needed in regular expressions. For websites not written in English, different characters may represent whitespace. For websites not encoded in UTF-8, the 0xC2 0xA0 sequence may not be in use.

$spaces

(string) Regexp pattern for matching common whitespace characters.

---


wp_replace_in_html_tags( string $haystack, array $replace_pairs )

Replace characters or phrases within HTML elements only.


$haystack

    (string) (Required) The text which has to be formatted.
$replace_pairs

    (array) (Required) In the form array('from' => 'to', ...).

---
---


### wpautop

A group of regex replaces used to identify text formatted with newlines and replace double line-breaks with HTML paragraph tags. The remaining line-breaks after conversion become \< \> tags, unless $br is set to ‘0’ or ‘false’.

wpautop( string $pee, bool $br = true )

Replaces double line-breaks with paragraph elements.

returns (string) Text which has been converted into correct paragraph tags.

$pee

    (string) (Required) The text which has to be formatted.
$br

    (bool) (Optional) If set, this will convert all remaining line-breaks after paragraphing.
    
    Default value: true

---
---

## wp_html_split()

wp_html_split( string $input )

Separate HTML elements and comments from the text.

Return (array) The formatted text.

$inputhtml_spli

    (string) (Required) The text which has to be formatted.

---
---


get_html_split_regex()

Retrieve the regular expression for an HTML element.

```
function get_html_split_regex() {
    static $regex;

    if ( ! isset( $regex ) ) {
        $comments =
              '!'           // Start of comment, after the <.
            . '(?:'         // Unroll the loop: Consume everything until --> is found.
            .     '-(?!->)' // Dash not followed by end of comment.
            .     '[^\-]*+' // Consume non-dashes.
            . ')*+'         // Loop possessively.
            . '(?:-->)?';   // End of comment. If not found, match all input.

        $cdata =
              '!\[CDATA\['  // Start of comment, after the <.
            . '[^\]]*+'     // Consume non-].
            . '(?:'         // Unroll the loop: Consume everything until ]]> is found.
            .     '](?!]>)' // One ] not followed by end of comment.
            .     '[^\]]*+' // Consume non-].
            . ')*+'         // Loop possessively.
            . '(?:]]>)?';   // End of comment. If not found, match all input.

        $escaped =
              '(?='           // Is the element escaped?
            .    '!--'
            . '|'
            .    '!\[CDATA\['
            . ')'
            . '(?(?=!-)'      // If yes, which type?
            .     $comments
            . '|'
            .     $cdata
            . ')';

        $regex =
              '/('              // Capture the entire match.
            .     '<'           // Find start of element.
            .     '(?'          // Conditional expression follows.
            .         $escaped  // Find end of escaped element.
            .     '|'           // ... else ...
            .         '[^>]*>?' // Find end of normal element.
            .     ')'
            . ')/';
    }

    return $regex;
}
```

---

wp_trim_excerpt( string $text = '' )

Generates an excerpt from the content, if needed.

The excerpt word amount will be 55 words and if the amount is greater than that, then the string ‘ […]’ will be appended to the excerpt. If the string is less than 55 words, then the content will be returned as is.


The 55 word limit can be modified by plugins/themes using the ‘excerpt_length’ filter The ‘ […]’ string can be modified by plugins/themes using the ‘excerpt_more’ filter


$text

    (string) (Optional) The excerpt. If set to empty, an excerpt is generated.
    
    Default value: ''

apply_filters( 'wp_trim_excerpt', string $text, string $raw_excerpt )
apply_filters( 'wp_trim_excerpt', string $text, string $raw_excerpt )

Filters the trimmed excerpt string.


$text

    (string) The trimmed text.
$raw_excerpt

    (string) The text prior to trimming.

----
----



balanceTags( string $text, bool $force = false )

Balances tags if forced to, or if the ‘use_balanceTags’ option is set to true.


$text

    (string) (Required) Text to be balanced
$force

    (bool) (Optional) If true, forces balancing, ignoring the value of the option.
    
    Default value: false
    
    

force_balance_tags( string $text )
force_balance_tags( string $text )

Balances tags of string using a modified stack.



Basic Usage

<?php force_balance_tags( $text ) ?>

This function is used in the short post excerpt list, to prevent unmatched elements. For example, it makes


<div><b>This is an excerpt. <!--more--> and this is more text... </b></div>

not break, when the html after the more tag is cut off.


<div><b>This is an excerpt.

should be changed to:

<div><b>This is an excerpt. </b></div>

by the force_balance_tags function.

---

human_time_diff( int $from, int $to = '' )

Determines the difference between two timestamps.

The difference is returned in a human readable format such as "1 hour", "5 mins", "2 days".

Parameters

$from

    (int) (Required) Unix timestamp from which the difference begins.
$to

    (int) (Optional) Unix timestamp to end the time difference. Default becomes time() if not set.
    
    Default value: ''
    
    

---
---

url_shorten( string $url, int $length = 35 )

Shorten a URL, to be used as link text.


$url

    (string) (Required) URL to shorten.
$length

    (int) (Optional) Maximum length of the shortened URL. Default 35 characters.
    
    Default value: 35
    

---
---


sanitize_hex_color( string $color )

Sanitizes a hex color.


Returns either ”, a 3 or 6 digit hex color (with #), or nothing. For sanitizing values without a #, see sanitize_hex_color_no_hash().


$color

    (string) (Required)
    
    

sanitize_hex_color_no_hash( string $color )
sanitize_hex_color_no_hash( string $color )

Sanitizes a hex color without a hash. Use sanitize_hex_color() when possible.

Saving hex colors without a hash puts the burden of adding the hash on the UI, which makes it difficult to use or upgrade to other color types such as rgba, hsl, rgb, and html color names.

Returns either ”, a 3 or 6 digit hex color (without a #), or null.



$color

    (string) (Required)
    

maybe_hash_hex_color( string $color )
maybe_hash_hex_color( string $color )

Ensures that any hex color is properly hashed.


Otherwise, returns value untouched.

This method should only be necessary if using sanitize_hex_color_no_hash().


$color

    (string) (Required)
    

---
---

sanitize_trackback_urls( string $to_ping )

Sanitize space or carriage return separated URLs that are used to send trackbacks.


$to_ping

    (string) (Required) Space or carriage return separated URLs
    
    

---
---

links_add_target( string $content, string $target = '\_blank', array $tags = array('a') )

Adds a Target attribute to all links in passed content.


This function by default only applies to <a> tags, however this can be modified by the 3rd param.

_NOTE:_ Any current target attributed will be stripped and replaced.



$content

    (string) (Required) String to search for links in.
$target

    (string) (Optional) The Target to add to the links.
    
    Default value: '\_blank'
$tags

    (array) (Optional) An array of tags to apply to.
    
    Default value: array('a')
    

---
---


wp_slash( string|array $value )

Add slashes to a string or array of strings.

This should be used when preparing data for core API that expects slashed data. This should not be used to escape data going directly into an SQL query.

$value

    (string|array) (Required) String or array of strings to slash.
    

---
---


normalize_whitespace( string $str )

Normalize EOL characters and strip duplicate whitespace.


$str

    (string) (Required) The string to normalize.

---


wp_text_diff( string $left_string, string $right_string, string|array $args = null )

Displays a human readable HTML representation of the difference between two strings.

The Diff is available for getting the changes between versions. The output is HTML, so the primary use is for displaying the changes. If the two strings are equivalent, then an empty string will be returned.

The arguments supported and can be changed are listed below.

‘title’ : Default is an empty string. Titles the diff in a manner compatible with the output.
‘title_left’ : Default is an empty string. Change the HTML to the left of the title.
‘title_right’ : Default is an empty string. Change the HTML to the right of the title.


$left_string

    (string) (Required) "old" (left) version of string
$right_string

    (string) (Required) "new" (right) version of string
$args

    (string|array) (Optional) Change 'title', 'title_left', and 'title_right' defaults.
    
    Default value: null

see also: wp_parse_args(): Used to change defaults to user defined settings.
see also: wp_parse_args(): Used to change defaults to user defined settings.

---


wp_strip_all_tags( string $string, bool $remove_breaks = false )

Properly strip all HTML tags including script and style

This differs from strip_tags() because it removes the contents of the <script> and <style> tags.
E.g. strip_tags( '<script>something</script>' ) will return ‘something’.
 wp_strip_all_tags will return ”"



$string

    (string) (Required) String containing HTML tags
$remove_breaks

    (bool) (Optional) Whether to remove left over line breaks and white space chars
    
    Default value: false

---
---

get_url_in_content( string $content )

Extract and return the first URL from passed content.



$content

    (string) (Required) A string which might contain a URL.
    

---
---

sanitize_text_field( string $str )

Sanitizes a string from user input or from the database.


- Checks for invalid UTF-8,
- Converts single < characters to entities
- Strips all tags
- Removes line breaks, tabs, and extra whitespace
- Strips octets


See also #See also

    sanitize_textarea_field()
    wp_check_invalid_utf8()
    wp_strip_all_tags()
    
    
    
    $str
    
        (string) (Required) String to sanitize.

---

---
wp_basename( string $path, string $suffix = '' )

i18n friendly version of basename()


Parameters #Parameters

$path

    (string) (Required) A path.
$suffix

    (string) (Optional) If the filename ends in suffix this will also be cut off.
    
    Default value: ''
    
    

---
---

links_add_base_url( string $content, string $base, array $attrs = array('src', 'href') )

Add a Base url to relative links in passed content.

By default it supports the ‘src’ and ‘href’ attributes. However this can be changed via the 3rd param.  


$content

    (string) (Required) String to search for links in.
$base

    (string) (Required) The base URL to prefix to links.
$attrs

    (array) (Optional) The attributes which should be processed.
    
    Default value: array('src', 'href')
    

---
---


wp_parse_str( string $string, array $array )

Parses a string into variables to be stored in an array.


Uses parse_str() and stripslashes if magic_quotes_gpc is on.
Parameters #Parameters

$string

    (string) (Required) The string to be parsed.
$array

    (array) (Required) Variables will be stored in this array.
    

----
----

esc_textarea( string $text )

Escaping for textarea values.


$text

  (string) (Required)

---

wp_sprintf( string $pattern )

WordPress implementation of PHP sprintf() with filters.



$pattern

    (string) (Required) The string which formatted args are inserted.
$args

    (mixed) (Required) ,... Arguments to be formatted into the $pattern string.

---


tag_escape( string $tag_name )

Escape an HTML tag name.



$tag_name

    (string) (Required)
    
    

---
---


wp_make_link_relative( string $link )

Convert full URL paths to absolute paths.

Returns (string) Absolute path.

Removes the http or https protocols and the domain. Keeps the path ‘/’ at the beginning, so it isn’t a true relative link, but from the web root base.


$link

    (string) (Required) Full URL path.
    

----
----


esc_html( string $text )

Escaping for HTML blocks.


$text

    (string) (Required)

---

---

esc_url_raw( string $url, array $protocols = null )

Performs esc_url() for database usage.

$url

    (string) (Required) The URL to be cleaned.
$protocols

    (array) (Optional) An array of acceptable protocols.
    
    Default value: null
    

---
---
htmlentities2( string $myHTML )

Convert entities, while preserving already-encoded entities.


$myHTML

    (string) (Required) The text to be converted.
    

---
---

esc_js( string $text )

Escape single quotes, htmlspecialchar ” &, and fix line endings.


Escapes text strings for echoing in JS. It is intended to be used for inline JS (in a tag attribute, for example onclick="…"). Note that the strings have to be in single quotes. The ‘js_escape’ filter is also applied here.  


  (string) (Required) The text to be escaped.



apply_filters( 'js_escape', string $safe_text, string $text )

Filters a string cleaned and escaped for output in JavaScript.

Text passed to esc_js() is stripped of invalid or special characters, and properly slashed for output.



$safe_text

    (string) The text after it has been escaped.
$text

    (string) The text prior to being escaped.
    

---
---


ent2ncr( string $text )

Converts named entities into numbered entities.



$text

    (string) (Required) The text within which entities will be converted.
    
    

---
---


iso8601_to_datetime( string $date_string, string $timezone = 'user' )

Converts an iso8601 date to MySQL DateTime format used by post_date[\_gmt].

Returns (string) The date and time in MySQL DateTime format - Y-m-d H:i:s.

$date_string

    (string) (Required) Date and time in ISO 8601 format https://en.wikipedia.org/wiki/ISO_8601.
$timezone

    (string) (Optional) If set to GMT returns the time minus gmt_offset. Default is 'user'.
    
    Default value: 'user'

---
---


sanitize_email( string $email )

Strips out all characters that are not allowable in an email.



$email

    (string) (Required) Email address to filter.

---
---

antispambot( string $email_address, int $hex_encoding )

Converts email addresses characters to HTML entities to block spam bots.


$email_address

    (string) (Required) Email address.
$hex_encoding

    (int) (Optional) Set to 1 to enable hex encoding.
    

---
---


is_email( string $email, bool $deprecated = false )

Verifies that an email is valid.

Does not grok i18n domains. Not RFC compliant.


$email

    (string) (Required) Email address to verify.
$deprecated

    (bool) (Optional) Deprecated.
    
    Default value: false
    

---
---


sanitize_user( string $username, bool $strict = false )

Sanitizes a username, stripping out unsafe characters.

Removes tags, octets, entities, and if strict is enabled, will only keep alphanumeric, `_, space, ., -, @. After sanitizing, it passes the username, raw username (the username in the parameter), and the value of $strict as parameters for the ‘sanitize_user’ filter`.


$username

    (string) (Required) The username to be sanitized.
$strict

    (bool) (Optional) If set limits $username to specific characters.
    
    Default value: false
    

---
---


remove_accents( string $string )

Converts all accent characters to ASCII characters.

If there are no accent characters, then the string given is just returned.

Accent characters converted:



Currency signs:
Code 	Glyph 	Replacement 	Description
U+00A3 	£ 	(empty) 	British Pound sign
U+20AC 	€ 	E 	Euro sign

Decompositions for Latin-1 Supplement:
Code 	Glyph 	Replacement 	Description
U+00AA 	ª 	a 	Feminine ordinal indicator
U+00BA 	º 	o 	Masculine ordinal indicator
U+00C0 	À 	A 	Latin capital letter A with grave
U+00C1 	Á 	A 	Latin capital letter A with acute
U+00C2 	Â 	A 	Latin capital letter A with circumflex
U+00C3 	Ã 	A 	Latin capital letter A with tilde
U+00C4 	Ä 	A 	Latin capital letter A with diaeresis
U+00C5 	Å 	A 	Latin capital letter A with ring above
U+00C6 	Æ 	AE 	Latin capital letter AE
U+00C7 	Ç 	C 	Latin capital letter C with cedilla
U+00C8 	È 	E 	Latin capital letter E with grave
U+00C9 	É 	E 	Latin capital letter E with acute
U+00CA 	Ê 	E 	Latin capital letter E with circumflex
U+00CB 	Ë 	E 	Latin capital letter E with diaeresis
U+00CC 	Ì 	I 	Latin capital letter I with grave
U+00CD 	Í 	I 	Latin capital letter I with acute
U+00CE 	Î 	I 	Latin capital letter I with circumflex
U+00CF 	Ï 	I 	Latin capital letter I with diaeresis
U+00D0 	Ð 	D 	Latin capital letter Eth
U+00D1 	Ñ 	N 	Latin capital letter N with tilde
U+00D2 	Ò 	O 	Latin capital letter O with grave
U+00D3 	Ó 	O 	Latin capital letter O with acute
U+00D4 	Ô 	O 	Latin capital letter O with circumflex
U+00D5 	Õ 	O 	Latin capital letter O with tilde
U+00D6 	Ö 	O 	Latin capital letter O with diaeresis
U+00D8 	Ø 	O 	Latin capital letter O with stroke
U+00D9 	Ù 	U 	Latin capital letter U with grave
U+00DA 	Ú 	U 	Latin capital letter U with acute
U+00DB 	Û 	U 	Latin capital letter U with circumflex
U+00DC 	Ü 	U 	Latin capital letter U with diaeresis
U+00DD 	Ý 	Y 	Latin capital letter Y with acute
U+00DE 	Þ 	TH 	Latin capital letter Thorn
U+00DF 	ß 	s 	Latin small letter sharp s
U+00E0 	à 	a 	Latin small letter a with grave
U+00E1 	á 	a 	Latin small letter a with acute
U+00E2 	â 	a 	Latin small letter a with circumflex
U+00E3 	ã 	a 	Latin small letter a with tilde
U+00E4 	ä 	a 	Latin small letter a with diaeresis
U+00E5 	å 	a 	Latin small letter a with ring above
U+00E6 	æ 	ae 	Latin small letter ae
U+00E7 	ç 	c 	Latin small letter c with cedilla
U+00E8 	è 	e 	Latin small letter e with grave
U+00E9 	é 	e 	Latin small letter e with acute
U+00EA 	ê 	e 	Latin small letter e with circumflex
U+00EB 	ë 	e 	Latin small letter e with diaeresis
U+00EC 	ì 	i 	Latin small letter i with grave
U+00ED 	í 	i 	Latin small letter i with acute
U+00EE 	î 	i 	Latin small letter i with circumflex
U+00EF 	ï 	i 	Latin small letter i with diaeresis
U+00F0 	ð 	d 	Latin small letter Eth
U+00F1 	ñ 	n 	Latin small letter n with tilde
U+00F2 	ò 	o 	Latin small letter o with grave
U+00F3 	ó 	o 	Latin small letter o with acute
U+00F4 	ô 	o 	Latin small letter o with circumflex
U+00F5 	õ 	o 	Latin small letter o with tilde
U+00F6 	ö 	o 	Latin small letter o with diaeresis
U+00F8 	ø 	o 	Latin small letter o with stroke
U+00F9 	ù 	u 	Latin small letter u with grave
U+00FA 	ú 	u 	Latin small letter u with acute
U+00FB 	û 	u 	Latin small letter u with circumflex
U+00FC 	ü 	u 	Latin small letter u with diaeresis
U+00FD 	ý 	y 	Latin small letter y with acute
U+00FE 	þ 	th 	Latin small letter Thorn
U+00FF 	ÿ 	y 	Latin small letter y with diaeresis

Decompositions for Latin Extended-A:
Code 	Glyph 	Replacement 	Description
U+0100 	Ā 	A 	Latin capital letter A with macron
U+0101 	ā 	a 	Latin small letter a with macron
U+0102 	Ă 	A 	Latin capital letter A with breve
U+0103 	ă 	a 	Latin small letter a with breve
U+0104 	Ą 	A 	Latin capital letter A with ogonek
U+0105 	ą 	a 	Latin small letter a with ogonek
U+01006 	Ć 	C 	Latin capital letter C with acute
U+0107 	ć 	c 	Latin small letter c with acute
U+0108 	Ĉ 	C 	Latin capital letter C with circumflex
U+0109 	ĉ 	c 	Latin small letter c with circumflex
U+010A 	Ċ 	C 	Latin capital letter C with dot above
U+010B 	ċ 	c 	Latin small letter c with dot above
U+010C 	Č 	C 	Latin capital letter C with caron
U+010D 	č 	c 	Latin small letter c with caron
U+010E 	Ď 	D 	Latin capital letter D with caron
U+010F 	ď 	d 	Latin small letter d with caron
U+0110 	Đ 	D 	Latin capital letter D with stroke
U+0111 	đ 	d 	Latin small letter d with stroke
U+0112 	Ē 	E 	Latin capital letter E with macron
U+0113 	ē 	e 	Latin small letter e with macron
U+0114 	Ĕ 	E 	Latin capital letter E with breve
U+0115 	ĕ 	e 	Latin small letter e with breve
U+0116 	Ė 	E 	Latin capital letter E with dot above
U+0117 	ė 	e 	Latin small letter e with dot above
U+0118 	Ę 	E 	Latin capital letter E with ogonek
U+0119 	ę 	e 	Latin small letter e with ogonek
U+011A 	Ě 	E 	Latin capital letter E with caron
U+011B 	ě 	e 	Latin small letter e with caron
U+011C 	Ĝ 	G 	Latin capital letter G with circumflex
U+011D 	ĝ 	g 	Latin small letter g with circumflex
U+011E 	Ğ 	G 	Latin capital letter G with breve
U+011F 	ğ 	g 	Latin small letter g with breve
U+0120 	Ġ 	G 	Latin capital letter G with dot above
U+0121 	ġ 	g 	Latin small letter g with dot above
U+0122 	Ģ 	G 	Latin capital letter G with cedilla
U+0123 	ģ 	g 	Latin small letter g with cedilla
U+0124 	Ĥ 	H 	Latin capital letter H with circumflex
U+0125 	ĥ 	h 	Latin small letter h with circumflex
U+0126 	Ħ 	H 	Latin capital letter H with stroke
U+0127 	ħ 	h 	Latin small letter h with stroke
U+0128 	Ĩ 	I 	Latin capital letter I with tilde
U+0129 	ĩ 	i 	Latin small letter i with tilde
U+012A 	Ī 	I 	Latin capital letter I with macron
U+012B 	ī 	i 	Latin small letter i with macron
U+012C 	Ĭ 	I 	Latin capital letter I with breve
U+012D 	ĭ 	i 	Latin small letter i with breve
U+012E 	Į 	I 	Latin capital letter I with ogonek
U+012F 	į 	i 	Latin small letter i with ogonek
U+0130 	İ 	I 	Latin capital letter I with dot above
U+0131 	ı 	i 	Latin small letter dotless i
U+0132 	Ĳ 	IJ 	Latin capital ligature IJ
U+0133 	ĳ 	ij 	Latin small ligature ij
U+0134 	Ĵ 	J 	Latin capital letter J with circumflex
U+0135 	ĵ 	j 	Latin small letter j with circumflex
U+0136 	Ķ 	K 	Latin capital letter K with cedilla
U+0137 	ķ 	k 	Latin small letter k with cedilla
U+0138 	ĸ 	k 	Latin small letter Kra
U+0139 	Ĺ 	L 	Latin capital letter L with acute
U+013A 	ĺ 	l 	Latin small letter l with acute
U+013B 	Ļ 	L 	Latin capital letter L with cedilla
U+013C 	ļ 	l 	Latin small letter l with cedilla
U+013D 	Ľ 	L 	Latin capital letter L with caron
U+013E 	ľ 	l 	Latin small letter l with caron
U+013F 	Ŀ 	L 	Latin capital letter L with middle dot
U+0140 	ŀ 	l 	Latin small letter l with middle dot
U+0141 	Ł 	L 	Latin capital letter L with stroke
U+0142 	ł 	l 	Latin small letter l with stroke
U+0143 	Ń 	N 	Latin capital letter N with acute
U+0144 	ń 	n 	Latin small letter N with acute
U+0145 	Ņ 	N 	Latin capital letter N with cedilla
U+0146 	ņ 	n 	Latin small letter n with cedilla
U+0147 	Ň 	N 	Latin capital letter N with caron
U+0148 	ň 	n 	Latin small letter n with caron
U+0149 	ŉ 	n 	Latin small letter n preceded by apostrophe
U+014A 	Ŋ 	N 	Latin capital letter Eng
U+014B 	ŋ 	n 	Latin small letter Eng
U+014C 	Ō 	O 	Latin capital letter O with macron
U+014D 	ō 	o 	Latin small letter o with macron
U+014E 	Ŏ 	O 	Latin capital letter O with breve
U+014F 	ŏ 	o 	Latin small letter o with breve
U+0150 	Ő 	O 	Latin capital letter O with double acute
U+0151 	ő 	o 	Latin small letter o with double acute
U+0152 	Œ 	OE 	Latin capital ligature OE
U+0153 	œ 	oe 	Latin small ligature oe
U+0154 	Ŕ 	R 	Latin capital letter R with acute
U+0155 	ŕ 	r 	Latin small letter r with acute
U+0156 	Ŗ 	R 	Latin capital letter R with cedilla
U+0157 	ŗ 	r 	Latin small letter r with cedilla
U+0158 	Ř 	R 	Latin capital letter R with caron
U+0159 	ř 	r 	Latin small letter r with caron
U+015A 	Ś 	S 	Latin capital letter S with acute
U+015B 	ś 	s 	Latin small letter s with acute
U+015C 	Ŝ 	S 	Latin capital letter S with circumflex
U+015D 	ŝ 	s 	Latin small letter s with circumflex
U+015E 	Ş 	S 	Latin capital letter S with cedilla
U+015F 	ş 	s 	Latin small letter s with cedilla
U+0160 	Š 	S 	Latin capital letter S with caron
U+0161 	š 	s 	Latin small letter s with caron
U+0162 	Ţ 	T 	Latin capital letter T with cedilla
U+0163 	ţ 	t 	Latin small letter t with cedilla
U+0164 	Ť 	T 	Latin capital letter T with caron
U+0165 	ť 	t 	Latin small letter t with caron
U+0166 	Ŧ 	T 	Latin capital letter T with stroke
U+0167 	ŧ 	t 	Latin small letter t with stroke
U+0168 	Ũ 	U 	Latin capital letter U with tilde
U+0169 	ũ 	u 	Latin small letter u with tilde
U+016A 	Ū 	U 	Latin capital letter U with macron
U+016B 	ū 	u 	Latin small letter u with macron
U+016C 	Ŭ 	U 	Latin capital letter U with breve
U+016D 	ŭ 	u 	Latin small letter u with breve
U+016E 	Ů 	U 	Latin capital letter U with ring above
U+016F 	ů 	u 	Latin small letter u with ring above
U+0170 	Ű 	U 	Latin capital letter U with double acute
U+0171 	ű 	u 	Latin small letter u with double acute
U+0172 	Ų 	U 	Latin capital letter U with ogonek
U+0173 	ų 	u 	Latin small letter u with ogonek
U+0174 	Ŵ 	W 	Latin capital letter W with circumflex
U+0175 	ŵ 	w 	Latin small letter w with circumflex
U+0176 	Ŷ 	Y 	Latin capital letter Y with circumflex
U+0177 	ŷ 	y 	Latin small letter y with circumflex
U+0178 	Ÿ 	Y 	Latin capital letter Y with diaeresis
U+0179 	Ź 	Z 	Latin capital letter Z with acute
U+017A 	ź 	z 	Latin small letter z with acute
U+017B 	Ż 	Z 	Latin capital letter Z with dot above
U+017C 	ż 	z 	Latin small letter z with dot above
U+017D 	Ž 	Z 	Latin capital letter Z with caron
U+017E 	ž 	z 	Latin small letter z with caron
U+017F 	ſ 	s 	Latin small letter long s
U+01A0 	Ơ 	O 	Latin capital letter O with horn
U+01A1 	ơ 	o 	Latin small letter o with horn
U+01AF 	Ư 	U 	Latin capital letter U with horn
U+01B0 	ư 	u 	Latin small letter u with horn
U+01CD 	Ǎ 	A 	Latin capital letter A with caron
U+01CE 	ǎ 	a 	Latin small letter a with caron
U+01CF 	Ǐ 	I 	Latin capital letter I with caron
U+01D0 	ǐ 	i 	Latin small letter i with caron
U+01D1 	Ǒ 	O 	Latin capital letter O with caron
U+01D2 	ǒ 	o 	Latin small letter o with caron
U+01D3 	Ǔ 	U 	Latin capital letter U with caron
U+01D4 	ǔ 	u 	Latin small letter u with caron
U+01D5 	Ǖ 	U 	Latin capital letter U with diaeresis and macron
U+01D6 	ǖ 	u 	Latin small letter u with diaeresis and macron
U+01D7 	Ǘ 	U 	Latin capital letter U with diaeresis and acute
U+01D8 	ǘ 	u 	Latin small letter u with diaeresis and acute
U+01D9 	Ǚ 	U 	Latin capital letter U with diaeresis and caron
U+01DA 	ǚ 	u 	Latin small letter u with diaeresis and caron
U+01DB 	Ǜ 	U 	Latin capital letter U with diaeresis and grave
U+01DC 	ǜ 	u 	Latin small letter u with diaeresis and grave

Decompositions for Latin Extended-B:
Code 	Glyph 	Replacement 	Description
U+0218 	Ș 	S 	Latin capital letter S with comma below
U+0219 	ș 	s 	Latin small letter s with comma below
U+021A 	Ț 	T 	Latin capital letter T with comma below
U+021B 	ț 	t 	Latin small letter t with comma below

Vowels with diacritic (Chinese, Hanyu Pinyin):
Code 	Glyph 	Replacement 	Description
U+0251 	ɑ 	a 	Latin small letter alpha
U+1EA0 	Ạ 	A 	Latin capital letter A with dot below
U+1EA1 	ạ 	a 	Latin small letter a with dot below
U+1EA2 	Ả 	A 	Latin capital letter A with hook above
U+1EA3 	ả 	a 	Latin small letter a with hook above
U+1EA4 	Ấ 	A 	Latin capital letter A with circumflex and acute
U+1EA5 	ấ 	a 	Latin small letter a with circumflex and acute
U+1EA6 	Ầ 	A 	Latin capital letter A with circumflex and grave
U+1EA7 	ầ 	a 	Latin small letter a with circumflex and grave
U+1EA8 	Ẩ 	A 	Latin capital letter A with circumflex and hook above
U+1EA9 	ẩ 	a 	Latin small letter a with circumflex and hook above
U+1EAA 	Ẫ 	A 	Latin capital letter A with circumflex and tilde
U+1EAB 	ẫ 	a 	Latin small letter a with circumflex and tilde
U+1EA6 	Ậ 	A 	Latin capital letter A with circumflex and dot below
U+1EAD 	ậ 	a 	Latin small letter a with circumflex and dot below
U+1EAE 	Ắ 	A 	Latin capital letter A with breve and acute
U+1EAF 	ắ 	a 	Latin small letter a with breve and acute
U+1EB0 	Ằ 	A 	Latin capital letter A with breve and grave
U+1EB1 	ằ 	a 	Latin small letter a with breve and grave
U+1EB2 	Ẳ 	A 	Latin capital letter A with breve and hook above
U+1EB3 	ẳ 	a 	Latin small letter a with breve and hook above
U+1EB4 	Ẵ 	A 	Latin capital letter A with breve and tilde
U+1EB5 	ẵ 	a 	Latin small letter a with breve and tilde
U+1EB6 	Ặ 	A 	Latin capital letter A with breve and dot below
U+1EB7 	ặ 	a 	Latin small letter a with breve and dot below
U+1EB8 	Ẹ 	E 	Latin capital letter E with dot below
U+1EB9 	ẹ 	e 	Latin small letter e with dot below
U+1EBA 	Ẻ 	E 	Latin capital letter E with hook above
U+1EBB 	ẻ 	e 	Latin small letter e with hook above
U+1EBC 	Ẽ 	E 	Latin capital letter E with tilde
U+1EBD 	ẽ 	e 	Latin small letter e with tilde
U+1EBE 	Ế 	E 	Latin capital letter E with circumflex and acute
U+1EBF 	ế 	e 	Latin small letter e with circumflex and acute
U+1EC0 	Ề 	E 	Latin capital letter E with circumflex and grave
U+1EC1 	ề 	e 	Latin small letter e with circumflex and grave
U+1EC2 	Ể 	E 	Latin capital letter E with circumflex and hook above
U+1EC3 	ể 	e 	Latin small letter e with circumflex and hook above
U+1EC4 	Ễ 	E 	Latin capital letter E with circumflex and tilde
U+1EC5 	ễ 	e 	Latin small letter e with circumflex and tilde
U+1EC6 	Ệ 	E 	Latin capital letter E with circumflex and dot below
U+1EC7 	ệ 	e 	Latin small letter e with circumflex and dot below
U+1EC8 	Ỉ 	I 	Latin capital letter I with hook above
U+1EC9 	ỉ 	i 	Latin small letter i with hook above
U+1ECA 	Ị 	I 	Latin capital letter I with dot below
U+1ECB 	ị 	i 	Latin small letter i with dot below
U+1ECC 	Ọ 	O 	Latin capital letter O with dot below
U+1ECD 	ọ 	o 	Latin small letter o with dot below
U+1ECE 	Ỏ 	O 	Latin capital letter O with hook above
U+1ECF 	ỏ 	o 	Latin small letter o with hook above
U+1ED0 	Ố 	O 	Latin capital letter O with circumflex and acute
U+1ED1 	ố 	o 	Latin small letter o with circumflex and acute
U+1ED2 	Ồ 	O 	Latin capital letter O with circumflex and grave
U+1ED3 	ồ 	o 	Latin small letter o with circumflex and grave
U+1ED4 	Ổ 	O 	Latin capital letter O with circumflex and hook above
U+1ED5 	ổ 	o 	Latin small letter o with circumflex and hook above
U+1ED6 	Ỗ 	O 	Latin capital letter O with circumflex and tilde
U+1ED7 	ỗ 	o 	Latin small letter o with circumflex and tilde
U+1ED8 	Ộ 	O 	Latin capital letter O with circumflex and dot below
U+1ED9 	ộ 	o 	Latin small letter o with circumflex and dot below
U+1EDA 	Ớ 	O 	Latin capital letter O with horn and acute
U+1EDB 	ớ 	o 	Latin small letter o with horn and acute
U+1EDC 	Ờ 	O 	Latin capital letter O with horn and grave
U+1EDD 	ờ 	o 	Latin small letter o with horn and grave
U+1EDE 	Ở 	O 	Latin capital letter O with horn and hook above
U+1EDF 	ở 	o 	Latin small letter o with horn and hook above
U+1EE0 	Ỡ 	O 	Latin capital letter O with horn and tilde
U+1EE1 	ỡ 	o 	Latin small letter o with horn and tilde
U+1EE2 	Ợ 	O 	Latin capital letter O with horn and dot below
U+1EE3 	ợ 	o 	Latin small letter o with horn and dot below
U+1EE4 	Ụ 	U 	Latin capital letter U with dot below
U+1EE5 	ụ 	u 	Latin small letter u with dot below
U+1EE6 	Ủ 	U 	Latin capital letter U with hook above
U+1EE7 	ủ 	u 	Latin small letter u with hook above
U+1EE8 	Ứ 	U 	Latin capital letter U with horn and acute
U+1EE9 	ứ 	u 	Latin small letter u with horn and acute
U+1EEA 	Ừ 	U 	Latin capital letter U with horn and grave
U+1EEB 	ừ 	u 	Latin small letter u with horn and grave
U+1EEC 	Ử 	U 	Latin capital letter U with horn and hook above
U+1EED 	ử 	u 	Latin small letter u with horn and hook above
U+1EEE 	Ữ 	U 	Latin capital letter U with horn and tilde
U+1EEF 	ữ 	u 	Latin small letter u with horn and tilde
U+1EF0 	Ự 	U 	Latin capital letter U with horn and dot below
U+1EF1 	ự 	u 	Latin small letter u with horn and dot below
U+1EF2 	Ỳ 	Y 	Latin capital letter Y with grave
U+1EF3 	ỳ 	y 	Latin small letter y with grave
U+1EF4 	Ỵ 	Y 	Latin capital letter Y with dot below
U+1EF5 	ỵ 	y 	Latin small letter y with dot below
U+1EF6 	Ỷ 	Y 	Latin capital letter Y with hook above
U+1EF7 	ỷ 	y 	Latin small letter y with hook above
U+1EF8 	Ỹ 	Y 	Latin capital letter Y with tilde
U+1EF9 	ỹ 	y 	Latin small letter y with tilde

German (de_DE), German formal (de_DE_formal), German (Switzerland) formal (de_CH), and German (Switzerland) informal (de_CH_informal) locales:
Code 	Glyph 	Replacement 	Description
U+00C4 	Ä 	Ae 	Latin capital letter A with diaeresis
U+00E4 	ä 	ae 	Latin small letter a with diaeresis
U+00D6 	Ö 	Oe 	Latin capital letter O with diaeresis
U+00F6 	ö 	oe 	Latin small letter o with diaeresis
U+00DC 	Ü 	Ue 	Latin capital letter U with diaeresis
U+00FC 	ü 	ue 	Latin small letter u with diaeresis
U+00DF 	ß 	ss 	Latin small letter sharp s

Danish (da_DK) locale:
Code 	Glyph 	Replacement 	Description
U+00C6 	Æ 	Ae 	Latin capital letter AE
U+00E6 	æ 	ae 	Latin small letter ae
U+00D8 	Ø 	Oe 	Latin capital letter O with stroke
U+00F8 	ø 	oe 	Latin small letter o with stroke
U+00C5 	Å 	Aa 	Latin capital letter A with ring above
U+00E5 	å 	aa 	Latin small letter a with ring above

Catalan (ca) locale:
Code 	Glyph 	Replacement 	Description
U+00B7 	l·l 	ll 	Flown dot (between two Ls)

Serbian (sr_RS) and Bosnian (bs_BA) locales:
Code 	Glyph 	Replacement 	Description
U+0110 	Đ 	DJ 	Latin capital letter D with stroke
U+0111 	đ 	dj 	Latin small letter d with stroke

---



wp_trim_words( string $text, int $num_words = 55, string $more = null )

Trims text to a certain number of words.

This function is localized. For languages that count ‘words’ by the individual character (such as East Asian languages), the $num_words argument will apply to the number of individual characters.


$text

    (string) (Required) Text to trim.
$num_words

    (int) (Optional) Number of words.
    
    Default value: 55
$more

    (string) (Optional) What to append if $text needs to be trimmed. Default '…'.
    
    Default value: null
    

---
---

get_gmt_from_date( string $string, string $format = 'Y-m-d H:i:s' )

Returns a date in the GMT equivalent.


Requires and returns a date in the Y-m-d H:i:s format. If there is a timezone_string available, the date is assumed to be in that timezone, otherwise it simply subtracts the value of the ‘gmt_offset’ option. Return format can be overridden using the $format parameter.

$string

    (string) (Required) The date to be converted.
$format

    (string) (Optional) The format string for the returned date (default is Y-m-d H:i:s)
    
    Default value: 'Y-m-d H:i:s'
    

---
---


backslashit( string $string )

Adds backslashes before letters and before a number at the start of a string.


$string

    (string) (Required) Value to which backslashes will be added.

trailingslashit( string $string )
trailingslashit( string $string )

Appends a trailing slash.

Will remove trailing forward and backslashes if it exists already before adding a trailing forward slash. This prevents double slashing a string or path.

The primary use of this is for paths and thus should be used for paths. It is not restricted to paths and offers no specific path support.

Parameters

$string

    (string) (Required) What to add the trailing slash to.

---



---

make_clickable( string $text )

Convert plaintext URI to HTML links.

Converts URI, www and ftp, and email addresses. Finishes by fixing links within links.


$text

    (string) (Required) Content to convert URIs.

---
---

get_rest_url( int $blog_id = null, string $path = '/', string $scheme = 'rest' )

Retrieves the URL to a REST endpoint on a site.

Description

Note: The returned URL is NOT escaped.

Parameters

$blog_id

    (int) (Optional) Blog ID. Default of null returns URL for current blog.
    
    Default value: null
$path

    (string) (Optional) REST route.
    
    Default value: '/'
$scheme

    (string) (Optional) Sanitization scheme.
    
    Default value: 'rest'

---
---


get_home_path()


Returns (string) Full filesystem path to the root of the WordPress installation


Get the absolute filesystem path to the root of the WordPress installation

---



---


list_files( string $folder = '', int $levels = 100, array $exclusions = array() )

Returns a listing of all files in the specified folder and all subdirectories up to 100 levels deep.

The depth of the recursiveness can be controlled by the $levels param.


$folder

    (string) (Optional) Full path to folder.
    
    Default value: ''
$levels

    (int) (Optional) Levels of folders to follow, Default 100 (PHP Loop limit).
    
    Default value: 100
$exclusions

    (array) (Optional) List of folders and files to skip.
    
    Default value: array()

---
---

get_plugin_files( string $plugin )

Get a list of a plugin’s files.


$plugin

    (string) (Required) Path to the main plugin file from plugins directory.
    

---
---

get_plugin_data( string $plugin_file, bool $markup = true, bool $translate = true )

Parses the plugin contents to retrieve plugin’s metadata.

The metadata of the plugin’s data searches for the following in the plugin’s header. All plugin data must be on its own line. For plugin description, it must not have any newlines or only parts of the description will be displayed and the same goes for the plugin data. The below is formatted for printing.


```
/*
Plugin Name: Name of Plugin
Plugin URI: Link to plugin information
Description: Plugin Description
Author: Plugin author's name
Author URI: Link to the author's web site
Version: Must be set in the plugin for WordPress 2.3+
Text Domain: Optional. Unique identifier, should be same as the one used in
    load_plugin_textdomain()
Domain Path: Optional. Only useful if the translations are located in a
    folder above the plugin's base path. For example, if .mo files are
    located in the locale folder then Domain Path will be "/locale/" and
    must have the first slash. Defaults to the base folder the plugin is
    located in.
Network: Optional. Specify "Network: true" to require that a plugin is activated
    across all sites in an installation. This will prevent a plugin from being
    activated on a single site when Multisite is enabled.
 * / # Remove the space to close comment
```

 Some users have issues with opening large files and manipulating the contents for want is usually the first 1kiB or 2kiB. This function stops pulling in the plugin contents when it has all of the required plugin data.

The first 8kiB of the file will be pulled in and if the plugin data is not within that first 8kiB, then the plugin author should correct their plugin and move the plugin data headers to the top.

The plugin file is assumed to have permissions to allow for scripts to read the file. This is not checked however and the file is only opened for reading.



$plugin_file

    (string) (Required) Path to the main plugin file.
$markup

    (bool) (Optional) If the returned data should have HTML markup applied.
    
    Default value: true
$translate

    (bool) (Optional) If the returned data should be translated.
    
    Default value: true

Top ↑
Return #Return

(array) Plugin data. Values will be empty if not supplied by the plugin.

    'Name'
    (string) Name of the plugin. Should be unique.
    'Title'
    (string) Title of the plugin and link to the plugin's site (if set).
    'Description'
    (string) Plugin description.
    'Author'
    (string) Author's name.
    'AuthorURI'
    (string) Author's website address (if set).
    'Version'
    (string) Plugin version.
    'TextDomain'
    (string) Plugin textdomain.
    'DomainPath'
    (string) Plugins relative directory path to .mo files.
    'Network'
    (bool) Whether the plugin can only be activated network-wide.
    

---
---

plugin_basename( string $file )

Gets the basename of a plugin


This method extracts the name of a plugin from its filename.

$file

    (string) (Required) The filename of plugin.

---

get_dropins()



Returns (array) Key is the file path and the value is an array of the plugin data.

Check the wp-content directory and retrieve all drop-ins with any plugin data.

---
wp_normalize_path( string $path )

Normalize a filesystem path.


On windows systems, replaces backslashes with forward slashes and forces upper-case drive letters. Allows for two leading slashes for Windows network shares, but ensures that all other duplicate slashes are reduced to a single.


$path

    (string) (Required) Path to normalize.

example
A Simple example to normalize the theme include path

```
$bS_incl_path = get_template_directory() . '/inc';

/**
 * Define theme include path
 *
 * Normalize the include path to be safe on windows hosts
 * @return string Normalized path
 * require min WordPress version 3.9
 * @since boot_Strap 1.0.1
 *
 */

 if ( function_exists('wp_normalize_path') ){

    $bS_incl_path = wp_normalize_path($bS_incl_path);
 }

define('THM_INC', $bS_incl_path);

require_once (THM_INC. '/wp_bootstrap_navwalker.php');   

print_r($bS_incl_path);
```
shows

Using this function:

`C:/xampp/htdocs/boot_strap/wp-content/themes/boot_Strap/inc`

Without this function:

`C:\xampp\htdocs\boot_strap/wp-content/themes/boot_Strap/inc`

On a Windows server.
---




plugin_dir_path( string $file )

Get the filesystem directory path (with trailing slash) for the plugin __FILE__ passed in.

plugin_dir_url( string $file )

Get the URL directory path (with trailing slash) for the plugin __FILE__ passed in.


$file

    (string) (Required) The filename of the plugin (__FILE__).

---
---


url_to_postid( string $url )

Examine a URL and try to determine the post ID it represents.

Checks are supposedly from the hosted site blog.

Returns (int) Post ID, or 0 on failure.

$url

    (string) (Required) Permalink to check.

---


home_url( string $path = '', string|null $scheme = null )

Retrieves the URL for the current site where the front end is accessible.

Returns the ‘home’ option with the appropriate protocol. The protocol will be ‘https’ if is_ssl() evaluates to true; otherwise, it will be the same as the ‘home’ option. If $scheme is ‘http’ or ‘https’, is_ssl() is overridden.


$path

    (string) (Optional) Path relative to the home URL.
    
    Default value: ''
$scheme

    (string|null) (Optional) Scheme to give the home URL context. Accepts 'http', 'https', 'relative', 'rest', or null.
    
    Default value: null

---


untrailingslashit( string $string )

Removes trailing forward slashes and backslashes if they exist.


The primary use of this is for paths and thus should be used for paths. It is not restricted to paths and offers no specific path support.



    (string) (Required) What to remove the trailing slashes from.

---
---




addslashes_gpc( string $gpc )

Adds slashes to escape strings.


Slashes will first be removed if magic_quotes_gpc is set, see https://secure.php.net/magic_quotes for more details.



$gpc

    (string) (Required) The string returned from HTTP request data.
    
    

---
---

wp_rel_nofollow( string $text )

Adds rel nofollow string to all HTML A elements in content.


$text

    (string) (Required) Content that may contain HTML A elements.
    
    

---
---


sanitize_html_class( string $class, string $fallback = '' )

Sanitizes an HTML classname to ensure it only contains valid characters.

Strips the string down to `A-Z,a-z,0-9,_,-.`
 If this results in an empty string then it will return the alternative value supplied.


$class

    (string) (Required) The classname to be sanitized

$fallback

    (string) (Optional) The value to return if the sanitization ends up as an empty string. Defaults to an empty string.
    
    Default value: ''
    

----
----

apply_filters( 'sanitize_file_name', string $filename, string $filename_raw )

Filters a sanitized filename string.



$filename

    (string) Sanitized filename.
$filename_raw

    (string) The filename prior to sanitization.
    

---
---


sanitize_key( string $key )

Sanitizes a string key.

Keys are used as internal identifiers. Lowercase alphanumeric characters, dashes and underscores are allowed.


$key

    (string) (Required) String key
    
    

---
---


format_to_edit( string $content, bool $rich_text = false )

Acts on text which is about to be edited.


The $content is run through esc_textarea(), which uses htmlspecialchars() to convert special characters to HTML entities. If $richedit is set to true, it is simply a holder for the ‘format_to_edit’ filter.


$content

    (string) (Required) The text about to be edited.
$rich_text

    (bool) (Optional) Whether $content should be considered rich text, in which case it would not be passed through esc_textarea().
    
    Default value: false
    

---
---


sanitize_title( string $title, string $fallback_title = '', string $context = 'save' )

Sanitizes a title, or returns a fallback title


Specifically, HTML and PHP tags are stripped. Further actions can be added via the plugin API. If $title is empty and $fallback_title is set, the latter will be used.


$title

    (string) (Required) The string to be sanitized.
$fallback_title

    (string) (Optional) A title to use if $title is empty.
    
    Default value: ''
$context

    (string) (Optional) The operation for which the string is sanitized
    
    Default value: 'save'

apply_filters( 'sanitize_title', string $title, string $raw_title, string $context )
apply_filters( 'sanitize_title', string $title, string $raw_title, string $context )

Filters a sanitized title string.

$title

    (string) Sanitized title.
$raw_title

    (string) The title prior to sanitization.
$context

    (string) The context for which the title is being sanitized.
    

---
---


zeroise( int $number, int $threshold )

Add leading zeros when necessary.

If you set the threshold to ‘4’ and the number is ’10’, then you will get back ‘0010’. If you set the threshold to ‘4’ and the number is ‘5000’, then you will get back ‘5000’.

Uses sprintf to append the amount of zeros based on the $threshold parameter and the size of the number. If the number is large enough, then no zeros will be appended.



$number

    (int) (Required) Number to append zeros to if not greater than threshold.
$threshold

    (int) (Required) Digit places number needs to be to not have zeros added.

---
---


sanitize_file_name( string $filename )

Sanitizes a filename, replacing whitespace with dashes.

Removes special characters that are illegal in filenames on certain operating systems and special characters requiring special escaping to manipulate at the command line. Replaces spaces and consecutive dashes with a single dash. Trims period, dash and underscore from beginning and end of filename. It is not guaranteed that this function will return a filename that is allowed to be uploaded.

$filename

(string) (Required) The filename to be sanitized



---


sanitize_sql_orderby( string $orderby )

Ensures a string is a valid SQL ‘order by’ clause.

Accepts one or more columns, with or without a sort order (ASC / DESC). e.g. ‘column_1’, ‘column_1, column_2’, ‘column_1 ASC, column_2 DESC’ etc.
Also accepts ‘RAND()’.



---


shortcode_unautop( string $pee )

Don’t auto-p wrap shortcodes that stand alone
Ensures that shortcodes are not wrapped in <p>...</p>.


$pee

    (string) (Required) The content.

---


seems_utf8( string $str )

Checks to see if a string is utf8 encoded.


NOTE: This function checks for 5-Byte sequences, UTF8 has Bytes Sequences with a maximum length of 4.


$str

    (string) (Required) The string to be checked
    

---
---


wp_specialchars_decode( string $string, string|int $quote_style = ENT_NOQUOTES )

Converts a number of HTML entities into their special characters.

Specifically deals with: &, <, >, ", and ‘.

$quote_style can be set to ENT_COMPAT to decode " entities, or ENT_QUOTES to do both " and ‘. Default is ENT_NOQUOTES where no quotes are decoded.


$string

    (string) (Required) The text which is to be decoded.
$quote_style

    (string|int) (Optional) Converts double quotes if set to ENT_COMPAT, both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES. Also compatible with old \_wp_specialchars() values; converting single quotes if set to 'single', double if set to 'double' or both if otherwise set. Default is ENT_NOQUOTES.
    
    Default value: ENT_NOQUOTES
    

---
---


wp_check_invalid_utf8( string $string, bool $strip = false )

Checks for invalid UTF8 in a string.


Parameters

$string

    (string) (Required) The text which is to be checked.
$strip

    (bool) (Optional) Whether to attempt to strip out invalid UTF8. Default is false.
    
    Default value: false
    

---
---


utf8_uri_encode( string $utf8_string, int $length )

Encode the Unicode values to be used in the URI.



$utf8_string

    (string) (Required)
$length

    (int) (Required) Max length of the string
    
    

---
---


convert_invalid_entities( string $content )

Converts invalid Unicode references range to valid range.


$content

    (string) (Required) String with entities that need converting.
    

---
---

format_for_editor( string $text, string $default_editor = null )

Formats text for the editor.

Generally the browsers treat everything inside a textarea as text, but it is still a good idea to HTML entity encode <, > and & in the content.

The filter ‘format_for_editor’ is applied here. If $text is empty the filter will be applied to an empty string.


$text

    (string) (Required) The text to be formatted.
$default_editor

    (string) (Optional) The default editor for the current user. It is usually either 'html' or 'tinymce'.
    
    Default value: null
    
    

apply_filters( 'format_for_editor', string $text, string $default_editor )
apply_filters( 'format_for_editor', string $text, string $default_editor )

Filters the text after it is formatted for the editor.

Parameters

$text

    (string) The formatted text.
$default_editor

    (string) The default editor for the current user. It is usually either 'html' or 'tinymce'.
---



wp_json_encode( mixed $data, int $options, int $depth = 512 )

Encode a variable into JSON, with some sanity checks.


$data

    (mixed) (Required) Variable (usually an array or object) to encode as JSON.
$options

    (int) (Optional) Options to be passed to json_encode(). Default 0.
$depth

    (int) (Optional) Maximum depth to walk through $data. Must be greater than 0.
    
    Default value: 512
    
    

---
---

wp_enqueue_code_editor( array $args )

Enqueue assets needed by the code editor for the given settings.

$args

    (array) (Required) Args.
    
        'type'
        (string) The MIME type of the file to be edited.
        'file'
        (string) Filename to be edited. Extension is used to sniff the type. Can be supplied as alternative to $type param.
        'theme'
        (WP_Theme) Theme being edited when on theme editor.
        'plugin'
        (string) Plugin being edited when on plugin editor.
        'codemirror'
        (array) Additional CodeMirror setting overrides.
        'csslint'
        (array) CSSLint rule overrides.
        'jshint'
        (array) JSHint rule overrides.
        'htmlhint'
        (array) JSHint rule overrides.

----
----



apply_filters( 'wp_code_editor_settings', array $settings, array $args )

Filters settings that are passed into the code editor.


Description

Returning a falsey value will disable the syntax-highlighting code editor.
$settings

    (array) The array of settings passed to the code editor. A falsey value disables the editor.
$args

    (array) Args passed when calling wp_enqueue_code_editor().
    
        'type'
        (string) The MIME type of the file to be edited.
        'file'
        (string) Filename being edited.
        'theme'
        (WP_Theme) Theme being edited when on theme editor.
        'plugin'
        (string) Plugin being edited when on plugin editor.
        'codemirror'
        (array) Additional CodeMirror setting overrides.
        'csslint'
        (array) CSSLint rule overrides.
        'jshint'
        (array) JSHint rule overrides.
        'htmlhint'
        (array) JSHint rule overrides.
    

---
---

do_action( 'wp_enqueue_code_editor', array $settings )

Fires when scripts and styles are enqueued for the code editor.


$settings

    (array) Settings for the enqueued code editor.
    

---
---


\_WP_Editors::parse_settings( string $editor_id, array $settings )

Parse default arguments for the editor instance.



Parameters #Parameters

$editor_id

    (string) (Required) ID for the current editor instance.
$settings

    (array) (Required) Array of editor arguments.
    
        'wpautop'
        (bool) Whether to use wpautop(). Default true.
        'media_buttons'
        (bool) Whether to show the Add Media/other media buttons.
        'default_editor'
        (string) When both TinyMCE and Quicktags are used, set which editor is shown on page load. Default empty.
        'drag_drop_upload'
        (bool) Whether to enable drag & drop on the editor uploading. Default false. Requires the media modal.
        'textarea_name'
        (string) Give the textarea a unique name here. Square brackets can be used here. Default $editor_id.
        'textarea_rows'
        (int) Number rows in the editor textarea. Default 20.
        'tabindex'
        (string|int) Tabindex value to use. Default empty.
        'tabfocus_elements'
        (string) The previous and next element ID to move the focus to when pressing the Tab key in TinyMCE. Default ':prev,:next'.
        'editor_css'
        (string) Intended for extra styles for both Visual and Text editors. Should include <style> tags, and can use "scoped". Default empty.
        'editor_class'
        (string) Extra classes to add to the editor textarea element. Default empty.
        'teeny'
        (bool) Whether to output the minimal editor config. Examples include Press This and the Comment editor. Default false.
        'dfw'
        (bool) Deprecated in 4.1. Since 4.3 used only to enqueue wp-fullscreen-stub.js for backward compatibility.
        'tinymce'
        (bool|array) Whether to load TinyMCE. Can be used to pass settings directly to TinyMCE using an array. Default true.
        'quicktags'
        (bool|array) Whether to load Quicktags. Can be used to pass settings directly to Quicktags using an array. Default true.

---

---

\_WP_Editors

Facilitates adding of the WordPress editor as used on the Write and Edit screens.



---

apply_filters( 'the_editor', string $output )

Filters the HTML markup output that displays the editor.
Parameters

$output

    (string) Editor's HTML markup.
    

---
---


\_WP_Editors::editor( string $content, string $editor_id, array $settings = array() )

Outputs the HTML for a single instance of the editor.


$content

    (string) (Required) The initial content of the editor.
$editor_id

    (string) (Required) ID for the textarea and TinyMCE and Quicktags instances (can contain only ASCII letters and numbers).
$settings

    (array) (Optional) See \_WP_Editors()::parse_settings() for description.
    
    Default value: array()
    

---
---


\_WP_Editors::enqueue_default_editor()

Enqueue all editor scripts.

For use when the editor is going to be initialized after page load.



---

wp_enqueue_editor()

Outputs the editor scripts, stylesheets, and default settings.


The editor can be initialized when needed after page load. See wp.editor.initialize() in wp-admin/js/editor.js for initialization options.



---

urldecode_deep( mixed $value )

Navigates through an array, object, or scalar, and decodes URL-encoded values



$value

    (mixed) (Required) The array or string to be decoded.

---
---

stripslashes_from_strings_only( mixed $value )

Callback function for stripslashes_deep() which strips slashes from strings.


$value

    (mixed) (Required) The array or string to be stripped.
    

---
---


sanitize_textarea_field( string $str )

Sanitizes a multiline string from user input or from the database.

The function is like sanitize_text_field(), but preserves new lines (\n) and other whitespace, which are legitimate input in textarea elements.

See also sanitize_text_field()

Parameters

$str

    (string) (Required) String to sanitize.
    

---
---

apply_filters( 'sanitize_textarea_field', string $filtered, string $str )

Filters a sanitized textarea field string.


$filtered

    (string) The sanitized string.
$str

    (string) The string prior to being sanitized.
    

---
---


esc_url( string $url, array $protocols = null, string $\_context = 'display' )

Checks and cleans a URL.

A number of characters are removed from the URL. If the URL is for displaying (the default behaviour) ampersands are also replaced. The ‘clean_url’ filter is applied to the returned cleaned URL.



$url

    (string) (Required) The URL to be cleaned.
$protocols

    (array) (Optional) An array of acceptable protocols. Defaults to return value of wp_allowed_protocols()
    
    Default value: null
$\_context

    (string) (Optional) Private. Use esc_url_raw() for database usage.
    
    Default value: 'display'
    

---
---

apply_filters( 'wp_trim_words', string $text, int $num_words, string $more, string $original_text )

Filters the text content after words have been trimmed.


$text

    (string) The trimmed text.
$num_words

    (int) The number of words to trim the text to. Default 55.
$more

    (string) An optional string to append to the end of the trimmed text, e.g. ….
$original_text

    (string) The text before it was trimmed.
    

---
---


esc_sql( string|array $data )

Escapes data for use in a MySQL query.

Description #Description

Usually you should prepare queries using wpdb::prepare(). Sometimes, spot-escaping is required or useful. One example is preparing an array for use in an IN clause.

NOTE: Since 4.8.3, ‘%’ characters will be replaced with a placeholder string, this prevents certain SQLi attacks from taking place. This change in behaviour may cause issues for code that expects the return value of esc_sql() to be useable for other purposes.



Parameters

$data

    (string|array) (Required) Unescaped data
    

---
---


esc_attr( string $text )

Escaping for HTML attributes.




Parameters

$text

    (string) (Required)

---

apply_filters( 'esc_html', string $safe_text, string $text )

Filters a string cleaned and escaped for output in HTML.



apply_filters( 'attribute_escape', string $safe_text, string $text )

Filters a string cleaned and escaped for output in an HTML attribute.



---


apply_filters( 'excerpt_length', int $number )

Filters the number of words in an excerpt.

$number

    (int) The number of words. Default 55.
    

---
---

apply_filters( 'sanitize_html_class', string $sanitized, string $class, string $fallback )



$sanitized

    (string) The sanitized HTML class.
$class

    (string) HTML class before sanitization.
$fallback

    (string) The fallback string.
    
    

---
---


convert_chars( string $content, string $deprecated = '' )

Converts lone & characters into &#038; (a.k.a. &amp;)


$content

    (string) (Required) String of characters to be converted.
$deprecated

    (string) (Optional) Not used.
    
    Default value: ''

---
---


sanitize_title_with_dashes( string $title, string $raw_title = '', string $context = 'display' )

Sanitizes a title, replacing whitespace and a few other characters with dashes.


Limits the output to alphanumeric characters, underscore (\_) and dash (-). Whitespace becomes a dash.

$title

    (string) (Required) The title to be sanitized.
$raw_title

    (string) (Optional) Not used.
    
    Default value: ''
$context

    (string) (Optional) The operation for which the string is sanitized.
    
    Default value: 'display'
    

---
---


apply_filters( 'sanitize_file_name_chars', array $special_chars, string $filename_raw )

Filters the list of characters to remove from a filename.



$special_chars

    (array) Characters to remove.
$filename_raw

    (string) Filename as it was passed into sanitize_file_name().
    
    
    

---
---


apply_filters( 'user_dashboard_url', string $url, int $user_id, string $path, string $scheme )

Filters the dashboard URL for a user.



$url

    (string) The complete URL including scheme and path.
$user_id

    (int) The user ID.
$path

    (string) Path relative to the URL. Blank string if no path is specified.
$scheme

    (string) Scheme to give the URL context. Accepts 'http', 'https', 'login', 'login_post', 'admin', 'relative' or null.
    

----
----


apply_filters( 'the_shortlink', string $link, string $shortlink, string $text, string $title )

Filters the short link anchor tag for a post.



$link

    (string) Shortlink anchor tag.
$shortlink

    (string) Shortlink URL.
$text

    (string) Shortlink's text.
$title

    (string) Shortlink's title attribute.
    

---
---

wp_get_shortlink( int $id, string $context = 'post', bool $allow_slugs = true )

Returns a shortlink for a post, page, attachment, or site.



This function exists to provide a shortlink tag that all themes and plugins can target. A plugin must hook in to provide the actual shortlinks. Default shortlink support is limited to providing ?p= style links for posts. Plugins can short-circuit this function via the ‘pre_get_shortlink’ filter or filter the output via the ‘get_shortlink’ filter.


$id

    (int) (Optional) A post or site id. Default is 0, which means the current post or site.
$context

    (string) (Optional) Whether the id is a 'site' id, 'post' id, or 'media' id. If 'post', the post_type of the post is consulted. If 'query', the current query is consulted to determine the id and context.
    
    Default value: 'post'
$allow_slugs

    (bool) (Optional) Whether to allow post slugs in the shortlink. It is up to the plugin how and whether to honor this.
    
    Default value: true

---




the_shortlink( string $text = '', string $title = '', string $before = '', string $after = '' )

Displays the shortlink for a post.


Must be called from inside "The Loop"

Call like the_shortlink( \__( ‘Shortlinkage FTW’ ) )



$text

    (string) (Optional) The link text or HTML to be displayed. Defaults to 'This is the short link.'
    
    Default value: ''
$title

    (string) (Optional) The tooltip for the link. Must be sanitized. Defaults to the sanitized post title.
    
    Default value: ''
$before

    (string) (Optional) HTML to display before the link.
    
    Default value: ''
$after

    (string) (Optional) HTML to display after the link.
    
    Default value: ''
    

----
----


apply_filters( 'plugins_url', string $url, string $path, string $plugin )

Filters the URL to the plugins directory.



$url

    (string) The complete URL to the plugins directory including scheme and path.
$path

    (string) Path relative to the URL to the plugins directory. Blank string if no path is specified.
$plugin

    (string) The plugin file path to be relative to. Blank string if no plugin is specified.

---
---

apply_filters( 'site_url', string $url, string $path, string|null $scheme, int|null $blog_id )

Filters the site URL.


$url

    (string) The complete site URL including scheme and path.
$path

    (string) Path relative to the site URL. Blank string if no path is specified.
$scheme

    (string|null) Scheme to give the site URL context. Accepts 'http', 'https', 'login', 'login_post', 'admin', 'relative' or null.
$blog_id

    (int|null) Site ID, or null for the current site.
    

---
---


admin_url( string $path = '', string $scheme = 'admin' )

Retrieves the URL to the admin area for the current site.



$path

    (string) (Optional) path relative to the admin URL.
    
    Default value: ''
$scheme

    (string) (Optional) The scheme to use. Default is 'admin', which obeys force_ssl_admin() and is_ssl(). 'http' or 'https' can be passed to force those schemes.
    
    Default value: 'admin'
    
    

---
---


get_admin_url( int $blog_id = null, string $path = '', string $scheme = 'admin' )

Retrieves the URL to the admin area for a given site.


$blog_id

    (int) (Optional) Site ID. Default null (current site).
    
    Default value: null
$path

    (string) (Optional) Path relative to the admin URL.
    
    Default value: ''
$scheme

    (string) (Optional) The scheme to use. Accepts 'http' or 'https', to force those schemes. Default 'admin', which obeys force_ssl_admin() and is_ssl().
    
    Default value: 'admin'

---
---


content_url( string $path = '' )

Retrieves the URL to the content directory.



$path

    (string) (Optional) Path relative to the content URL.
    
    Default value: ''
    

----
----


plugins_url( string $path = '', string $plugin = '' )

Retrieves a URL within the plugins or mu-plugins directory.

Defaults to the plugins directory URL if no arguments are supplied.



$path

    (string) (Optional) Extra path appended to the end of the URL, including the relative directory if $plugin is supplied.
    
    Default value: ''
$plugin

    (string) (Optional) A full path to a file inside a plugin or mu-plugin. The URL will be relative to its directory. Typically this is done by passing __FILE__ as the argument.
    
    Default value: ''
    

---
---


site_url( string $path = '', string $scheme = null )

Retrieves the URL for the current site where WordPress application files (e.g. wp-blog-header.php or the wp-admin/ folder) are accessible.



Returns the ‘site_url’ option with the appropriate protocol, ‘https’ if is_ssl() and ‘http’ otherwise. If $scheme is ‘http’ or ‘https’, is_ssl() is overridden.




$path

    (string) (Optional) Path relative to the site URL.
    
    Default value: ''
$scheme

    (string) (Optional) Scheme to give the site URL context. See set_url_scheme().
    
    Default value: null

---
---



get_site_url( int $blog_id = null, string $path = '', string $scheme = null )

Retrieves the URL for a given site where WordPress application files (e.g. wp-blog-header.php or the wp-admin/ folder) are accessible.

Returns the ‘site_url’ option with the appropriate protocol, ‘https’ if is_ssl() and ‘http’ otherwise. If $scheme is ‘http’ or ‘https’, is_ssl() is overridden.


$blog_id

    (int) (Optional) Site ID. Default null (current site).
    
    Default value: null
$path

    (string) (Optional) Path relative to the site URL.
    
    Default value: ''
$scheme

    (string) (Optional) Scheme to give the site URL context. Accepts 'http', 'https', 'login', 'login_post', 'admin', or 'relative'.
    
    Default value: null
    

---
---


apply_filters( 'tag_feed_link', string $link, string $feed )

Filters the post tag feed link.


Parameters

$link

    (string) The tag feed link.
$feed

    (string) Feed type.

---
---


apply_filters( 'category_feed_link', string $link, string $feed )

Filters the category feed link.


$link

    (string) The category feed link.
$feed

    (string) Feed type.
    

---
---

### get_search_link( string $query = '' )

Retrieves the permalink for a search.



$query

    (string) (Optional) The query string to use. If empty the current query is used.
    
    Default value: ''

---
---

### apply_filters( 'taxonomy_feed_link', string $link, string $feed, string $taxonomy )

Filters the feed link for a taxonomy other than ‘category’ or ‘post_tag’.




    (string) The taxonomy feed link.
$feed

    (string) Feed type.
$taxonomy

    (string) The taxonomy name.
    

---
---

### get_category_feed_link( int $cat_id, string $feed = '' )

Retrieves the feed link for a category.


Returns a link to the feed for all posts in a given category. A specific feed can be requested or left blank to get the default feed.


$cat_id

    (int) (Required) Category ID.
$feed

    (string) (Optional) Feed type.
    
    Default value: ''
---





---

### the_feed_link( string $anchor, string $feed = '' )

Displays the permalink for the feed type.



$anchor

    (string) (Required) The link's anchor text.
$feed

    (string) (Optional) Feed type.
    
    Default value: ''
    

---
---

### permalink_anchor( string $mode = 'id' )

Displays the permalink anchor for the current post.


The permalink mode title will use the post title for the ‘a’ element ‘id’ attribute. The id mode uses ‘post-‘ with the post ID for the ‘id’ attribute.


$mode

    (string) (Optional) Permalink mode. Accepts 'title' or 'id'.
    
    Default value: 'id'

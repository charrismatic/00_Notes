can i use -cli tool
http://caniuse.com/

EMBED THE TOOL RIGHT IN YOUR SITE
https://caniuse.bitsofco.de/

#CHECK IF THE SITE YOUR WORKING ON IS COMPLIANT IN REAL TIME
# OR USE AT THE COMMAND LINE WITH REVEAL.JS
https://github.com/una/caniuse-componentV
wwwwwwwwwwww
# CAN I USE CLI
https://github.com/sgentle/caniuse-cmd

You can specify your own defaults by creating a file called `.caniuse.json` and putting it home directory.

For example, if you're primarily interested in mobile browsers two versions back:

{
  "era": "e-2",
  "mobile": true,
  "desktop": false
}

$ caniuse --help
Options:
Options:
  --short, -s            Short output: show browsers on one line and don't
                         display notes or description (default when displaying
                         multiple results)                             [boolean]
  --long, -l             Long output: show more information (default when
                         displaying a single result)                   [boolean]
  --oneline, -1          One-line output: just global percentages, no per-
                         browser info                 [boolean] [default: false]
  --oneline-browser, -2  One-line output with browser info, implies --abbrev and
                         --current                    [boolean] [default: false]
  --abbrev, -a           Abbreviate browser names     [boolean] [default: false]
  --percentages, -p      Include browser version usage percentages
                                                      [boolean] [default: false]
  --future, -f           Include future browser versions
                                                      [boolean] [default: false]
  --current, -c          Don't include old browser versions, equivalent to --era
                         e0                           [boolean] [default: false]
  --era, -e              How many versions back to go, e0 to e-40       [string]
  --mobile, -m           Include mobile browsers      [boolean] [default: false]
  --desktop, -d          Include desktop browsers      [boolean] [default: true]
  --browser, -b          Show results for these browsers, comma-separated (ie,
                         edge,firefox,chrome,safari,opera,ios_saf,op_mini,
                         android,bb,op_mob,and_chr,and_ff,ie_mob,and_uc)
                                                                        [string]
  --web, -w              Go to the search page on caniuse.com
                                                      [boolean] [default: false]
  --config, -C           Path to JSON config file
                                 [string] [default: "/Users/user/.caniuse.json"]
  --ascii, -A            UTF-8 symbols replacement with ASCII description
                                                      [boolean] [default: false]
  --help                 Show help                                     [boolean]


csslint nodes pacakage
https://github.com/CSSLint/csslint/wiki/command-line-interface
npm install -g csslint
csslint --help 

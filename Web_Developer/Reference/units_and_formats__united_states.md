

https://www.freeformatter.com/united-states-standards-code-snippets.html

# Formatting standards & code snippets for United States - Freeformatter.com

---------------------------
**United States** \- Formatting standards & code snippets
=========================================================

Here is a complete list of standards and formats used in the United States. It includes a full list of ISO codes, number, date, currency, telephone and address formats. You will also get code examples on how to perform the most common formatting operations in Java, C#, JavaScript and PHP. Multiple resource files are made available, mainly the complete list of states, in different formats such as CSV, XML, JSON, HTML and SQL.

*   [Download list of states for the United States in CSV, JSON, HTML, SQL and XML](#downloadstatelist)
    *   [List of states: HTML - Select Control](#united-states-html-list-of-states)
    *   [List of states: CSV](#united-states-csv-list-of-states)
    *   [List of states: JSON](#united-states-json-list-of-states)
    *   [List of states: SQL](#united-states-sql-list-of-states)
    *   [List of states: XML](#united-states-xml-list-of-states)
*   [ISO-3166-1 Codes](#iso3166)
*   [Official Language](#offlang)
*   [Date Format](#dateformats)
    *   [How to format dates for United States in Java, C#, PHP, and JavaScript](#dateformats)
*   [Time Format](#timeformats)
    *   [How to format time for United States in Java, C#, PHP, and JavaScript](#timeformats)
*   [Numeric Format](#numericformats)
    *   [How to format numbers for United States in Java, C#, PHP, and JavaScript](#numericformats)
*   [Currency Format](#currencyformats)
    *   [How to format currencies for United States in Java, C#, PHP, and JavaScript](#currencyformats)
*   [Telephone Format](#telephoneformats)
    *   [How to format a telephone number for United States in Java, C#, PHP, and JavaScript](#telephoneformats)
*   [Address Format](#addressformats)
*   [Units Of Measurement](#unitsofmeasurement)
    *   [Units For Length](#unitsforlength)
    *   [Units For Area](#unitsforarea)
    *   [Units For Volume (Dry Goods)](#unitsforvolumedrygoods)
    *   [Units For Volume (Liquids)](#unitsforvolumeliquids)
    *   [Units For Weight](#unitsforweight)
    *   [Other units (Temperature, Force, etc.)](#unitsforelse)

(adsbygoogle = window.adsbygoogle || \[\]).push({});

What are the **ISO-3166-1** codes for the United States?
--------------------------------------------------------

*   **Alpha-2:** US
*   **Alpha-3:** USA
*   **Numeric:** 840
*   **Java Locale Code:** en_US
*   **.Net CultireInfo Code:** en-US
*   **PHP Locale Code:** en_US

What is the official **language** in the United States?
-------------------------------------------------------

* **English**

    _Although there is no official language at the federal level in the United States, **English** is assumed and used by 80% of the general population. The other most used language is **Spanish** with 12.5%._


What is the **date format** in the United States?
-------------------------------------------------

The date format in the United States is **middle-endian**:

*   **Short Format:** MM/DD/YY  
    _Ex: 12/31/14 for December 31st 2014_
*   **Long Format:** MM/DD/YYYY  
    _Ex: 12/31/2014 for December 31st 2014_

_The formats **YYYY-MM-DD** (2014-12-13) and **DD MonthName, YYYY** (31 December, 2014) are often used as well._

[How to format dates for United States in Java, C#, PHP, and JavaScript](javascript:void(0);)

##### Java:

```
Locale locale =  new  Locale("en",  "US");  SimpleDateFormat sdf =  new  SimpleDateFormat("MM/dd/yy", locale);  // Use yyyy for full year sdf.format(new  Date()); 
```

##### C#:

```
CultureInfo ci =  CultureInfo.GetCultureInfo("en-US");  DateTime.Now.ToString("MM/dd/yy", ci);  // Use yyyy for full year 
```

##### JavaScript:

```
var date =  new  Date(); date.toLocaleDateString('en-US',  {month:  '2-digit', day:  '2-digit', year:  '2-digit'});  // use year: 'numeric' for full yyyy 
```

##### PHP:

```
date("m/d/y");  // Use Y for full year 
```

What is the **time format** in the United States?
-------------------------------------------------

The time format in the United States is **12-hour notation**, but not limited to:

**h:mm\[:ss\] AM|PM**  
_Ex: 1:30 PM, 3:30:45 AM_

[How to format time for United States in Java, C#, PHP, and JavaScript](javascript:void(0);)

##### Java:

```
Locale locale =  new  Locale("en",  "US");  SimpleDateFormat sdf =  new  SimpleDateFormat("h:mm:ss a", locale); sdf.format(new  Date()); 
```

##### C#:

```
CultureInfo ci =  CultureInfo.GetCultureInfo("en-US");  DateTime.Now.ToString("h:mm:ss tt", ci); 
```

##### JavaScript:

```
var date =  new  Date(); date.toLocaleTimeString('en-US',  {hour:  '2-digit'}); 
```

##### PHP:

```
date("g:i:s a"); 
```

What is the **numeric format** in the United States?
----------------------------------------------------

**Format:** 999,999,999.99  

*   **Group Size:** 3
*   **Grouping Character:** , (comma)
*   **Decimal Character:** . (dot)

[How to format numbers for United States in Java, C#, PHP, and JavaScript](javascript:void(0);)

##### Java:

```
Locale locale =  new  Locale("en",  "US");  NumberFormat numberFormat =  NumberFormat.getNumberInstance(locale); numberFormat.format(999999999.99d); 
```

##### C#:

```
double d =  999999999.99d; d.ToString("n",  CultureInfo.GetCultureInfo("en-US"))); 
```

##### JavaScript:

```
var number =  999999999.99; number.toLocaleString('en-US'); 
```

##### PHP:

```
$fmt =  new  NumberFormatter($locale =  'en_US',  NumberFormatter::DECIMAL); $fmt->format(999999999.99); 
```

What is the **currency format** in the United States?
-----------------------------------------------------

**Format:** $999,999,999.99  

*   **Group Size:** 3
*   **Grouping Character:** , (comma)
*   **Decimal Character:** . (dot)
*   **Currency Symbol:** $
*   **Currency Symbol Position:** Before number
*   **Currency Name:** United States Dollars, US Dollars (USD)

[How to format currencies for United States in Java, C#, PHP, and JavaScript](javascript:void(0);)

```
Locale locale =  new  Locale("en",  "US");  NumberFormat numberFormat =  NumberFormat.getCurrencyInstance(locale); numberFormat.format(999999999.99d); 
```

##### C#:

```
double d =  999999999.99d; d.ToString("c",  CultureInfo.GetCultureInfo("en-US"))); 
```

##### JavaScript:

```
var number =  999999999.99; number.toLocaleString('en-US',  {currency:  'USD', style:  'currency'}); 
```

##### PHP:

```
$fmt =  new  NumberFormatter($locale =  'en_US',  NumberFormatter::CURRENCY); $fmt->format(999999999.99); 
```

What is the **telephone format** in the United States?
------------------------------------------------------

**Local:** (NPA) NXX-XXXX. Ex: (555) 555-5555  
**Long Distance Calls:** 1-NPA-NXX-XXXX. Ex: 1-555-555-5555  

*   **Name:** NANP - North American Numbering Plan
*   **NPA:** Numbering Plan Area Code. 3 digits
*   **NXX:** Central Office Exchange Code. 3 digits
*   **XXXX:** Subscriber Number. 4 digits
*   **Separator:** Hyphens

[How to format a telephone number for United States in Java, C#, PHP, and JavaScript](javascript:void(0);)

```
// Format local phones using regular expression:  "5555555555".replaceFirst("(\\\d{3})(\\\d{3})(\\\d+)",  "($1) $2-$3"));  // Format long distance phones using regular expression. Assumes 1 is hardcoded and not stored with value:  "5555555555".replaceFirst("(\\\d{3})(\\\d{3})(\\\d+)",  "1-$1-$2-$3"));  // Format long distance phones using regular expression. Assumes 1 is stored with value:  "15555555555".replaceFirst("(\\\d{1})(\\\d{3})(\\\d{3})(\\\d+)",  "$1-$2-$3-$4") 
```

##### C#:

```
// Format local phones using regular expression:  Regex.Replace("5555555555",  @"(\\d{3})(\\d{3})(\\d+)",  "($1) $2-$3");  // Format long distance phones using regular expression. Assumes 1 is hardcoded and not stored with value:  Regex.Replace("5555555555",  @"(\\d{3})(\\d{3})(\\d+)",  "1-$1-$2-$3");  // Format long distance phones using regular expression. Assumes 1 is stored with value:  Regex.Replace("15555555555",  @"(\\d{1})(\\d{3})(\\d{3})(\\d+)",  "$1-$2-$3-$4"); 
```

##### JavaScript:

```
// Format local phones using regular expression:  "5555555555".replace(/(\\d{3})(\\d{3})(\\d+)/g,  "($1) $2-$3");  // Format long distance phones using regular expression. Assumes 1 is hardcoded and not stored with value:  "5555555555".replace(/(\\d{3})(\\d{3})(\\d+)/g,  "1-$1-$2-$3");  // Format long distance phones using regular expression. Assumes 1 is stored with value:  "15555555555".replace(/(\\d{1})(\\d{3})(\\d{3})(\\d+)/g,  "$1-$2-$3-$4"); 
```

##### PHP:

```
// Format local phones using regular expression: preg_replace('/(\\d{3})(\\d{3})(\\d{4})/',  '($1) $2-$3',  '5555555555');  // Format long distance phones using regular expression. Assumes 1 is hardcoded and not stored with value: preg_replace('/(\\d{3})(\\d{3})(\\d{4})/',  '1-$1-$2-$3',  '5555555555');  // Format long distance phones using regular expression. Assumes 1 is stored with value: preg_replace('/(\\d{1})(\\d{3})(\\d{3})(\\d{4})/',  '$1-$2-$3-$4',  '15555555555'); 
```

What is the **address format** in the United States?
----------------------------------------------------

JOHN DOE  
MY COMPANY  
1234 E STREET SUITE 123  
NEW YORK NY 10106  
USA  

*   **JOHN DOE:** Name of the person
*   **MY COMPANY:** Name of the company if there is one
*   **1234:** Civic number
*   **E:** Direction of street if there is one. E for east, W for west, N for north, S for south
*   **STREET:** Street name
*   **SUITE 123:** Suite or appartment number if there is one
*   **NEW YORK:** City name
*   **NY:** State code. 2 letters
*   **10106:** Zip code. 5 digits. Can also be in Zip+4 (10106-4567) format when required.
*   **USA:** Name of country.

What are the **Unit of Measurement**used in the United States?
--------------------------------------------------------------

The United States uses the **US Customary** units derived from the English system.

Units for length:
-----------------

|   Unit  Abbreviation  Equivalent in metric system   

|   Inch  in or "  25.4mm   
|   Foot  ft or '  304.8mm   
|   Yard  yd  0.9144m   
|   Mile  mi  1609.3m   

Units for Area:
---------------

|   Unit  Abbreviation  Equivalent in metric system   

|   Square Foot  ft2 or sq ft  0.09290m²   
|   Square Yard  sq yd  0.8361m²   
|   Square Mile  mi2 or sq mi  2.590km²   
|   Acre  ac  4046m²   

Units For Volume (Dry Goods):
-----------------------------

|   Unit  Abbreviation  Equivalent in metric system   

|   Cubic Inch  cu in or in3  16.38cm³   
|   Cubic Foot  cu ft or ft3  0.02831m³   
|   Cubic Yard  cu yd or yd3  0.7646m³   

Units For Volume (Liquids):
---------------------------

|   Unit  Abbreviation  Equivalent in metric system   

|   Fluid Ounce  fl oz  29.57mL   
|   Pint  pt  473.2mL   
|   Quart  qt  946.4mL   
|   Gallon  gal  3.785L   

Units For Weight:
-----------------

|   Unit  Abbreviation  Equivalent in metric system   

|   Grain  gr  64.80mg   
|   Ounce  oz  28.35g   
|   Pound  lb  453.6g   
|   Ton  907.2kg   

Other units (Temperature, Force, Power, Energy):
------------------------------------------------

|   Measurement  Unit  Abbreviation  Definition  Equivalent in standard international systems   

|   Force  Poundal  pdl  Force required to accelerate a mass of one pound-mass by 1 ft/ss  0.1383N   
|   Force  Pound Force  lbf  Force exerted on a mass of one pound due to gravity  4.448N   
|   Inertia  Slug  Mass which, when subjected to a force of one pound-weight, accelerates by 1 ft/sec2  14.59kg   
|   Power  Horsepower  hp  Power required to raise 550 lb at the rate of 1 ft/s against gravity  745.7W   
|   Energy  British Thermal Unit  BTU  Energy required to raise the temperature of 1 lb liquid water by 1 °F  1055 J   
|   Temperature  Degree Fahrenheit  °F  32 + 1.8xT(°C)   
|   Absolute Temperature  Degree Rankine  °R  5/9K   
|   Speed  Miles Per Hour  mph or mi/h  Miles covered in one hour  1.609344km   

Download list of states for the United States in CSV, JSON, HTML, SQL and XML
-----------------------------------------------------------------------------

  

### List of states: HTML - Select Control

### 

```
\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  Alpha-2 code +  Alpha-2 code \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  <!--  States  -->  <select>  <option value="AL">AL</option> 	<option value="AK">AK</option>  <option value="AZ">AZ</option> 	<option value="AR">AR</option>  <option value="CA">CA</option> 	<option value="CO">CO</option>  <option value="CT">CT</option> 	<option value="DE">DE</option>  <option value="DC">DC</option> 	<option value="FL">FL</option>  <option value="GA">GA</option> 	<option value="HI">HI</option>  <option value="ID">ID</option> 	<option value="IL">IL</option>  <option value="IN">IN</option> 	<option value="IA">IA</option>  <option value="KS">KS</option> 	<option value="KY">KY</option>  <option value="LA">LA</option> 	<option value="ME">ME</option>  <option value="MD">MD</option> 	<option value="MA">MA</option>  <option value="MI">MI</option> 	<option value="MN">MN</option>  <option value="MS">MS</option> 	<option value="MO">MO</option>  <option value="MT">MT</option> 	<option value="NE">NE</option>  <option value="NV">NV</option> 	<option value="NH">NH</option>  <option value="NJ">NJ</option> 	<option value="NM">NM</option>  <option value="NY">NY</option> 	<option value="NC">NC</option>  <option value="ND">ND</option> 	<option value="OH">OH</option>  <option value="OK">OK</option> 	<option value="OR">OR</option>  <option value="PA">PA</option> 	<option value="RI">RI</option>  <option value="SC">SC</option> 	<option value="SD">SD</option>  <option value="TN">TN</option> 	<option value="TX">TX</option>  <option value="UT">UT</option> 	<option value="VT">VT</option>  <option value="VA">VA</option> 	<option value="WA">WA</option>  <option value="WV">WV</option> 	<option value="WI">WI</option>  <option value="WY">WY</option> </select>  <!-- US Outlying  Territories  -->  <option value="AS">AS</option> <option value="GU">GU</option>  <option value="MP">MP</option> <option value="PR">PR</option>  <option value="UM">UM</option> <option value="VI">VI</option>  <!--  Armed  Forces  -->  <option value="AA">AA</option> <option value="AP">AP</option>  <option value="AE">AE</option>  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  Alpha-2 code + name \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  <!\-\- States --> <select> 	<option value="AL">Alabama</option>  <option value="AK">Alaska</option> 	<option value="AZ">Arizona</option>  <option value="AR">Arkansas</option> 	<option value="CA">California</option>  <option value="CO">Colorado</option> 	<option value="CT">Connecticut</option>  <option value="DE">Delaware</option> 	<option value="DC">District Of Columbia</option>  <option value="FL">Florida</option> 	<option value="GA">Georgia</option>  <option value="HI">Hawaii</option> 	<option value="ID">Idaho</option>  <option value="IL">Illinois</option> 	<option value="IN">Indiana</option>  <option value="IA">Iowa</option> 	<option value="KS">Kansas</option>  <option value="KY">Kentucky</option> 	<option value="LA">Louisiana</option>  <option value="ME">Maine</option> 	<option value="MD">Maryland</option>  <option value="MA">Massachusetts</option> 	<option value="MI">Michigan</option>  <option value="MN">Minnesota</option> 	<option value="MS">Mississippi</option>  <option value="MO">Missouri</option> 	<option value="MT">Montana</option>  <option value="NE">Nebraska</option> 	<option value="NV">Nevada</option>  <option value="NH">New  Hampshire</option> 	<option value="NJ">New Jersey</option>  <option value="NM">New  Mexico</option> 	<option value="NY">New York</option>  <option value="NC">North  Carolina</option> 	<option value="ND">North Dakota</option>  <option value="OH">Ohio</option> 	<option value="OK">Oklahoma</option>  <option value="OR">Oregon</option> 	<option value="PA">Pennsylvania</option>  <option value="RI">Rhode  Island</option> 	<option value="SC">South Carolina</option>  <option value="SD">South  Dakota</option> 	<option value="TN">Tennessee</option>  <option value="TX">Texas</option> 	<option value="UT">Utah</option>  <option value="VT">Vermont</option> 	<option value="VA">Virginia</option>  <option value="WA">Washington</option> 	<option value="WV">West Virginia</option>  <option value="WI">Wisconsin</option> 	<option value="WY">Wyoming</option>  </select>	  <!\-\- US Outlying Territories --> <option value="AS">American Samoa</option>  <option value="GU">Guam</option> <option value="MP">Northern Mariana Islands</option>  <option value="PR">Puerto  Rico</option> <option value="UM">United States Minor Outlying Islands</option>  <option value="VI">Virgin  Islands</option> 				 <!\-\- Armed Forces --> <option value="AA">Armed Forces Americas</option>  <option value="AP">Armed  Forces  Pacific</option> <option value="AE">Armed Forces Others</option>  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\- ISO_3166-2 code + name \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  <!--  States  -->  <select>  <option value="US-AL">Alabama</option> 	<option value="US-AK">Alaska</option>  <option value="US-AZ">Arizona</option> 	<option value="US-AR">Arkansas</option>  <option value="US-CA">California</option> 	<option value="US-CO">Colorado</option>  <option value="US-CT">Connecticut</option> 	<option value="US-DE">Delaware</option>  <option value="US-DC">District  Of  Columbia</option> 	<option value="US-FL">Florida</option>  <option value="US-GA">Georgia</option> 	<option value="US-HI">Hawaii</option>  <option value="US-ID">Idaho</option> 	<option value="US-IL">Illinois</option>  <option value="US-IN">Indiana</option> 	<option value="US-IA">Iowa</option>  <option value="US-KS">Kansas</option> 	<option value="US-KY">Kentucky</option>  <option value="US-LA">Louisiana</option> 	<option value="US-ME">Maine</option>  <option value="US-MD">Maryland</option> 	<option value="US-MA">Massachusetts</option>  <option value="US-MI">Michigan</option> 	<option value="US-MN">Minnesota</option>  <option value="US-MS">Mississippi</option> 	<option value="US-MO">Missouri</option>  <option value="US-MT">Montana</option> 	<option value="US-NE">Nebraska</option>  <option value="US-NV">Nevada</option> 	<option value="US-NH">New Hampshire</option>  <option value="US-NJ">New  Jersey</option> 	<option value="US-NM">New Mexico</option>  <option value="US-NY">New  York</option> 	<option value="US-NC">North Carolina</option>  <option value="US-ND">North  Dakota</option> 	<option value="US-OH">Ohio</option>  <option value="US-OK">Oklahoma</option> 	<option value="US-OR">Oregon</option>  <option value="US-PA">Pennsylvania</option> 	<option value="US-RI">Rhode Island</option>  <option value="US-SC">South  Carolina</option> 	<option value="US-SD">South Dakota</option>  <option value="US-TN">Tennessee</option> 	<option value="US-TX">Texas</option>  <option value="US-UT">Utah</option> 	<option value="US-VT">Vermont</option>  <option value="US-VA">Virginia</option> 	<option value="US-WA">Washington</option>  <option value="US-WV">West  Virginia</option> 	<option value="US-WI">Wisconsin</option>  <option value="US-WY">Wyoming</option> </select>  <!-- US Outlying  Territories  -->  <option value="US-AS">American  Samoa</option> <option value="US-GU">Guam</option>  <option value="US-MP">Northern  Mariana  Islands</option> <option value="US-PR">Puerto Rico</option>  <option value="US-UM">United  States  Minor  Outlying  Islands</option> <option value="US-VI">Virgin Islands</option>  <!--  Armed  Forces  -->  <option value="US-AA">Armed  Forces  Americas</option> <option value="US-AP">Armed Forces Pacific</option>  <option value="US-AE">Armed  Forces  Others</option> 
```

  

### List of states: CSV

```
// States // AL,"Alabama" AK,"Alaska" AZ,"Arizona" AR,"Arkansas" CA,"California" CO,"Colorado" CT,"Connecticut" DE,"Delaware" DC,"District Of Columbia" FL,"Florida" GA,"Georgia" HI,"Hawaii" ID,"Idaho" IL,"Illinois" IN,"Indiana" IA,"Iowa" KS,"Kansas" KY,"Kentucky" LA,"Louisiana" ME,"Maine" MD,"Maryland" MA,"Massachusetts" MI,"Michigan" MN,"Minnesota" MS,"Mississippi" MO,"Missouri" MT,"Montana" NE,"Nebraska" NV,"Nevada" NH,"New Hampshire" NJ,"New Jersey" NM,"New Mexico" NY,"New York" NC,"North Carolina" ND,"North Dakota" OH,"Ohio" OK,"Oklahoma" OR,"Oregon" PA,"Pennsylvania" RI,"Rhode Island" SC,"South Carolina" SD,"South Dakota" TN,"Tennessee" TX,"Texas" UT,"Utah" VT,"Vermont" VA,"Virginia" WA,"Washington" WV,"West Virginia" WI,"Wisconsin" WY,"Wyoming"  // US Outlying Territories // AS,"American Samoa" GU,"Guam" MP,"Northern Mariana Islands" PR,"Puerto Rico" UM,"United States Minor Outlying Islands" VI,"Virgin Islands"  // Armed Forces // AA,"Armed Forces Americas" AP,"Armed Forces Pacific" AE,"Armed Forces Others" 
```

  

### List of states: JSON

```
\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  Alpha-2 code +  Name  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  \[  {code:  "AL", name:  "Alabama"},  {code:  "AK", name:  "Alaska"},  {code:  "AZ", name:  "Arizona"},  {code:  "AR", name:  "Arkansas"},  {code:  "CA", name:  "California"},  {code:  "CO", name:  "Colorado"},  {code:  "CT", name:  "Connecticut"},  {code:  "DE", name:  "Delaware"},  {code:  "DC", name:  "District Of Columbia"},  {code:  "FL", name:  "Florida"},  {code:  "GA", name:  "Georgia"},  {code:  "HI", name:  "Hawaii"},  {code:  "ID", name:  "Idaho"},  {code:  "IL", name:  "Illinois"},  {code:  "IN", name:  "Indiana"},  {code:  "IA", name:  "Iowa"},  {code:  "KS", name:  "Kansas"},  {code:  "KY", name:  "Kentucky"},  {code:  "LA", name:  "Louisiana"},  {code:  "ME", name:  "Maine"},  {code:  "MD", name:  "Maryland"},  {code:  "MA", name:  "Massachusetts"},  {code:  "MI", name:  "Michigan"},  {code:  "MN", name:  "Minnesota"},  {code:  "MS", name:  "Mississippi"},  {code:  "MO", name:  "Missouri"},  {code:  "MT", name:  "Montana"},  {code:  "NE", name:  "Nebraska"},  {code:  "NV", name:  "Nevada"},  {code:  "NH", name:  "New Hampshire"},  {code:  "NJ", name:  "New Jersey"},  {code:  "NM", name:  "New Mexico"},  {code:  "NY", name:  "New York"},  {code:  "NC", name:  "North Carolina"},  {code:  "ND", name:  "North Dakota"},  {code:  "OH", name:  "Ohio"},  {code:  "OK", name:  "Oklahoma"},  {code:  "OR", name:  "Oregon"},  {code:  "PA", name:  "Pennsylvania"},  {code:  "RI", name:  "Rhode Island"},  {code:  "SC", name:  "South Carolina"},  {code:  "SD", name:  "South Dakota"},  {code:  "TN", name:  "Tennessee"},  {code:  "TX", name:  "Texas"},  {code:  "UT", name:  "Utah"},  {code:  "VT", name:  "Vermont"},  {code:  "VA", name:  "Virginia"},  {code:  "WA", name:  "Washington"},  {code:  "WV", name:  "West Virginia"},  {code:  "WI", name:  "Wisconsin"},  {code:  "WY", name:  "Wyoming"}  \]  // US Outlying Territories //  {code:  "AS", name:  "American Samoa"},  {code:  "GU", name:  "Guam"},  {code:  "MP", name:  "Northern Mariana Islands"},  {code:  "PR", name:  "Puerto Rico"},  {code:  "UM", name:  "United States Minor Outlying Islands"},  {code:  "VI", name:  "Virgin Islands"}  // Armed Forces //  {code:  "AA", name:  "Armed Forces Americas"},  {code:  "AP", name:  "Armed Forces Pacific"},  {code:  "AE", name:  "Armed Forces Others"}  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\- ISO-3166-2  +  Name  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  \[  {code:  "US-AL", name:  "Alabama"},  {code:  "US-AK", name:  "Alaska"},  {code:  "US-AZ", name:  "Arizona"},  {code:  "US-AR", name:  "Arkansas"},  {code:  "US-CA", name:  "California"},  {code:  "US-CO", name:  "Colorado"},  {code:  "US-CT", name:  "Connecticut"},  {code:  "US-DE", name:  "Delaware"},  {code:  "US-DC", name:  "District Of Columbia"},  {code:  "US-FL", name:  "Florida"},  {code:  "US-GA", name:  "Georgia"},  {code:  "US-HI", name:  "Hawaii"},  {code:  "US-ID", name:  "Idaho"},  {code:  "US-IL", name:  "Illinois"},  {code:  "US-IN", name:  "Indiana"},  {code:  "US-IA", name:  "Iowa"},  {code:  "US-KS", name:  "Kansas"},  {code:  "US-KY", name:  "Kentucky"},  {code:  "US-LA", name:  "Louisiana"},  {code:  "US-ME", name:  "Maine"},  {code:  "US-MD", name:  "Maryland"},  {code:  "US-MA", name:  "Massachusetts"},  {code:  "US-MI", name:  "Michigan"},  {code:  "US-MN", name:  "Minnesota"},  {code:  "US-MS", name:  "Mississippi"},  {code:  "US-MO", name:  "Missouri"},  {code:  "US-MT", name:  "Montana"},  {code:  "US-NE", name:  "Nebraska"},  {code:  "US-NV", name:  "Nevada"},  {code:  "US-NH", name:  "New Hampshire"},  {code:  "US-NJ", name:  "New Jersey"},  {code:  "US-NM", name:  "New Mexico"},  {code:  "US-NY", name:  "New York"},  {code:  "US-NC", name:  "North Carolina"},  {code:  "US-ND", name:  "North Dakota"},  {code:  "US-OH", name:  "Ohio"},  {code:  "US-OK", name:  "Oklahoma"},  {code:  "US-OR", name:  "Oregon"},  {code:  "US-PA", name:  "Pennsylvania"},  {code:  "US-RI", name:  "Rhode Island"},  {code:  "US-SC", name:  "South Carolina"},  {code:  "US-SD", name:  "South Dakota"},  {code:  "US-TN", name:  "Tennessee"},  {code:  "US-TX", name:  "Texas"},  {code:  "US-UT", name:  "Utah"},  {code:  "US-VT", name:  "Vermont"},  {code:  "US-VA", name:  "Virginia"},  {code:  "US-WA", name:  "Washington"},  {code:  "US-WV", name:  "West Virginia"},  {code:  "US-WI", name:  "Wisconsin"},  {code:  "US-WY", name:  "Wyoming"}  \]  // US Outlying Territories //  {code:  "US-AS", name:  "American Samoa"},  {code:  "US-GU", name:  "Guam"},  {code:  "US-MP", name:  "Northern Mariana Islands"},  {code:  "US-PR", name:  "Puerto Rico"},  {code:  "US-UM", name:  "United States Minor Outlying Islands"},  {code:  "US-VI", name:  "Virgin Islands"}  // Armed Forces //  {code:  "US-AA", name:  "Armed Forces Americas"},  {code:  "US-AP", name:  "Armed Forces Pacific"},  {code:  "US-AE", name:  "Armed Forces Others"} 
```

  

### List of states: SQL

```
--  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  --  Table  \`state\`  --  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\- DROP TABLE IF EXISTS state; CREATE TABLE IF NOT EXISTS state ( id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT, code VARCHAR(6) NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY (id), UNIQUE INDEX id_UNIQUE (id ASC), UNIQUE INDEX code_UNIQUE (code ASC)  ) ENGINE =  InnoDB;  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-  Alpha-2 code + name \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\- INSERT INTO state (id, code, name) VALUES (null,  'AL',  'Alabama'); INSERT INTO state (id, code, name) VALUES (null,  'AK',  'Alaska'); INSERT INTO state (id, code, name) VALUES (null,  'AZ',  'Arizona'); INSERT INTO state (id, code, name) VALUES (null,  'AR',  'Arkansas'); INSERT INTO state (id, code, name) VALUES (null,  'CA',  'California'); INSERT INTO state (id, code, name) VALUES (null,  'CO',  'Colorado'); INSERT INTO state (id, code, name) VALUES (null,  'CT',  'Connecticut'); INSERT INTO state (id, code, name) VALUES (null,  'DE',  'Delaware'); INSERT INTO state (id, code, name) VALUES (null,  'DC',  'District Of Columbia'); INSERT INTO state (id, code, name) VALUES (null,  'FL',  'Florida'); INSERT INTO state (id, code, name) VALUES (null,  'GA',  'Georgia'); INSERT INTO state (id, code, name) VALUES (null,  'HI',  'Hawaii'); INSERT INTO state (id, code, name) VALUES (null,  'ID',  'Idaho'); INSERT INTO state (id, code, name) VALUES (null,  'IL',  'Illinois'); INSERT INTO state (id, code, name) VALUES (null,  'IN',  'Indiana'); INSERT INTO state (id, code, name) VALUES (null,  'IA',  'Iowa'); INSERT INTO state (id, code, name) VALUES (null,  'KS',  'Kansas'); INSERT INTO state (id, code, name) VALUES (null,  'KY',  'Kentucky'); INSERT INTO state (id, code, name) VALUES (null,  'LA',  'Louisiana'); INSERT INTO state (id, code, name) VALUES (null,  'ME',  'Maine'); INSERT INTO state (id, code, name) VALUES (null,  'MD',  'Maryland'); INSERT INTO state (id, code, name) VALUES (null,  'MA',  'Massachusetts'); INSERT INTO state (id, code, name) VALUES (null,  'MI',  'Michigan'); INSERT INTO state (id, code, name) VALUES (null,  'MN',  'Minnesota'); INSERT INTO state (id, code, name) VALUES (null,  'MS',  'Mississippi'); INSERT INTO state (id, code, name) VALUES (null,  'MO',  'Missouri'); INSERT INTO state (id, code, name) VALUES (null,  'MT',  'Montana'); INSERT INTO state (id, code, name) VALUES (null,  'NE',  'Nebraska'); INSERT INTO state (id, code, name) VALUES (null,  'NV',  'Nevada'); INSERT INTO state (id, code, name) VALUES (null,  'NH',  'New Hampshire'); INSERT INTO state (id, code, name) VALUES (null,  'NJ',  'New Jersey'); INSERT INTO state (id, code, name) VALUES (null,  'NM',  'New Mexico'); INSERT INTO state (id, code, name) VALUES (null,  'NY',  'New York'); INSERT INTO state (id, code, name) VALUES (null,  'NC',  'North Carolina'); INSERT INTO state (id, code, name) VALUES (null,  'ND',  'North Dakota'); INSERT INTO state (id, code, name) VALUES (null,  'OH',  'Ohio'); INSERT INTO state (id, code, name) VALUES (null,  'OK',  'Oklahoma'); INSERT INTO state (id, code, name) VALUES (null,  'OR',  'Oregon'); INSERT INTO state (id, code, name) VALUES (null,  'PA',  'Pennsylvania'); INSERT INTO state (id, code, name) VALUES (null,  'RI',  'Rhode Island'); INSERT INTO state (id, code, name) VALUES (null,  'SC',  'South Carolina'); INSERT INTO state (id, code, name) VALUES (null,  'SD',  'South Dakota'); INSERT INTO state (id, code, name) VALUES (null,  'TN',  'Tennessee'); INSERT INTO state (id, code, name) VALUES (null,  'TX',  'Texas'); INSERT INTO state (id, code, name) VALUES (null,  'UT',  'Utah'); INSERT INTO state (id, code, name) VALUES (null,  'VT',  'Vermont'); INSERT INTO state (id, code, name) VALUES (null,  'VA',  'Virginia'); INSERT INTO state (id, code, name) VALUES (null,  'WA',  'Washington'); INSERT INTO state (id, code, name) VALUES (null,  'WV',  'West Virginia'); INSERT INTO state (id, code, name) VALUES (null,  'WI',  'Wisconsin'); INSERT INTO state (id, code, name) VALUES (null,  'WY',  'Wyoming');  -- US Outlying  Territories  -- INSERT INTO state (id, code, name) VALUES (null,  'AS',  'American Samoa'); INSERT INTO state (id, code, name) VALUES (null,  'GU',  'Guam'); INSERT INTO state (id, code, name) VALUES (null,  'MP',  'Northern Mariana Islands'); INSERT INTO state (id, code, name) VALUES (null,  'PR',  'Puerto Rico'); INSERT INTO state (id, code, name) VALUES (null,  'UM',  'United States Minor Outlying Islands'); INSERT INTO state (id, code, name) VALUES (null,  'VI',  'Virgin Islands');  --  Armed  Forces  -- INSERT INTO state (id, code, name) VALUES (null,  'AA',  'Armed Forces Americas'); INSERT INTO state (id, code, name) VALUES (null,  'AP',  'Armed Forces Pacific'); INSERT INTO state (id, code, name) VALUES (null,  'AE',  'Armed Forces Others');  \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\- ISO-3166-2 code + name \-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\- INSERT INTO state (id, code, name) VALUES (null,  'US-AL',  'Alabama'); INSERT INTO state (id, code, name) VALUES (null,  'US-AK',  'Alaska'); INSERT INTO state (id, code, name) VALUES (null,  'US-AZ',  'Arizona'); INSERT INTO state (id, code, name) VALUES (null,  'US-AR',  'Arkansas'); INSERT INTO state (id, code, name) VALUES (null,  'US-CA',  'California'); INSERT INTO state (id, code, name) VALUES (null,  'US-CO',  'Colorado'); INSERT INTO state (id, code, name) VALUES (null,  'US-CT',  'Connecticut'); INSERT INTO state (id, code, name) VALUES (null,  'US-DE',  'Delaware'); INSERT INTO state (id, code, name) VALUES (null,  'US-DC',  'District Of Columbia'); INSERT INTO state (id, code, name) VALUES (null,  'US-FL',  'Florida'); INSERT INTO state (id, code, name) VALUES (null,  'US-GA',  'Georgia'); INSERT INTO state (id, code, name) VALUES (null,  'US-HI',  'Hawaii'); INSERT INTO state (id, code, name) VALUES (null,  'US-ID',  'Idaho'); INSERT INTO state (id, code, name) VALUES (null,  'US-IL',  'Illinois'); INSERT INTO state (id, code, name) VALUES (null,  'US-IN',  'Indiana'); INSERT INTO state (id, code, name) VALUES (null,  'US-IA',  'Iowa'); INSERT INTO state (id, code, name) VALUES (null,  'US-KS',  'Kansas'); INSERT INTO state (id, code, name) VALUES (null,  'US-KY',  'Kentucky'); INSERT INTO state (id, code, name) VALUES (null,  'US-LA',  'Louisiana'); INSERT INTO state (id, code, name) VALUES (null,  'US-ME',  'Maine'); INSERT INTO state (id, code, name) VALUES (null,  'US-MD',  'Maryland'); INSERT INTO state (id, code, name) VALUES (null,  'US-MA',  'Massachusetts'); INSERT INTO state (id, code, name) VALUES (null,  'US-MI',  'Michigan'); INSERT INTO state (id, code, name) VALUES (null,  'US-MN',  'Minnesota'); INSERT INTO state (id, code, name) VALUES (null,  'US-MS',  'Mississippi'); INSERT INTO state (id, code, name) VALUES (null,  'US-MO',  'Missouri'); INSERT INTO state (id, code, name) VALUES (null,  'US-MT',  'Montana'); INSERT INTO state (id, code, name) VALUES (null,  'US-NE',  'Nebraska'); INSERT INTO state (id, code, name) VALUES (null,  'US-NV',  'Nevada'); INSERT INTO state (id, code, name) VALUES (null,  'US-NH',  'New Hampshire'); INSERT INTO state (id, code, name) VALUES (null,  'US-NJ',  'New Jersey'); INSERT INTO state (id, code, name) VALUES (null,  'US-NM',  'New Mexico'); INSERT INTO state (id, code, name) VALUES (null,  'US-NY',  'New York'); INSERT INTO state (id, code, name) VALUES (null,  'US-NC',  'North Carolina'); INSERT INTO state (id, code, name) VALUES (null,  'US-ND',  'North Dakota'); INSERT INTO state (id, code, name) VALUES (null,  'US-OH',  'Ohio'); INSERT INTO state (id, code, name) VALUES (null,  'US-OK',  'Oklahoma'); INSERT INTO state (id, code, name) VALUES (null,  'US-OR',  'Oregon'); INSERT INTO state (id, code, name) VALUES (null,  'US-PA',  'Pennsylvania'); INSERT INTO state (id, code, name) VALUES (null,  'US-RI',  'Rhode Island'); INSERT INTO state (id, code, name) VALUES (null,  'US-SC',  'South Carolina'); INSERT INTO state (id, code, name) VALUES (null,  'US-SD',  'South Dakota'); INSERT INTO state (id, code, name) VALUES (null,  'US-TN',  'Tennessee'); INSERT INTO state (id, code, name) VALUES (null,  'US-TX',  'Texas'); INSERT INTO state (id, code, name) VALUES (null,  'US-UT',  'Utah'); INSERT INTO state (id, code, name) VALUES (null,  'US-VT',  'Vermont'); INSERT INTO state (id, code, name) VALUES (null,  'US-VA',  'Virginia'); INSERT INTO state (id, code, name) VALUES (null,  'US-WA',  'Washington'); INSERT INTO state (id, code, name) VALUES (null,  'US-WV',  'West Virginia'); INSERT INTO state (id, code, name) VALUES (null,  'US-WI',  'Wisconsin'); INSERT INTO state (id, code, name) VALUES (null,  'US-WY',  'Wyoming');  -- US Outlying  Territories  -- INSERT INTO state (id, code, name) VALUES (null,  'US-AS',  'American Samoa'); INSERT INTO state (id, code, name) VALUES (null,  'US-GU',  'Guam'); INSERT INTO state (id, code, name) VALUES (null,  'US-MP',  'Northern Mariana Islands'); INSERT INTO state (id, code, name) VALUES (null,  'US-PR',  'Puerto Rico'); INSERT INTO state (id, code, name) VALUES (null,  'US-UM',  'United States Minor Outlying Islands'); INSERT INTO state (id, code, name) VALUES (null,  'US-VI',  'Virgin Islands');  --  Armed  Forces  -- INSERT INTO state (id, code, name) VALUES (null,  'US-AA',  'Armed Forces Americas'); INSERT INTO state (id, code, name) VALUES (null,  'US-AP',  'Armed Forces Pacific'); INSERT INTO state (id, code, name) VALUES (null,  'US-AE',  'Armed Forces Others'); 
```

  

### List of states: XML

```
<!\-\- Alpha-2 code + name -->  <?xml version="1.0" encoding="UTF-8"?>  <states>  <state>  <code>AL</code>  <name>Alabama</name>  </state>  <state>  <code>AK</code>  <name>Alaska</name>  </state>  <state>  <code>AZ</code>  <name>Arizona</name>  </state>  <state>  <code>AR</code>  <name>Arkansas</name>  </state>  <state>  <code>CA</code>  <name>California</name>  </state>  <state>  <code>CO</code>  <name>Colorado</name>  </state>  <state>  <code>CT</code>  <name>Connecticut</name>  </state>  <state>  <code>DE</code>  <name>Delaware</name>  </state>  <state>  <code>DC</code>  <name>District Of Columbia</name>  </state>  <state>  <code>FL</code>  <name>Florida</name>  </state>  <state>  <code>GA</code>  <name>Georgia</name>  </state>  <state>  <code>HI</code>  <name>Hawaii</name>  </state>  <state>  <code>ID</code>  <name>Idaho</name>  </state>  <state>  <code>IL</code>  <name>Illinois</name>  </state>  <state>  <code>IN</code>  <name>Indiana</name>  </state>  <state>  <code>IA</code>  <name>Iowa</name>  </state>  <state>  <code>KS</code>  <name>Kansas</name>  </state>  <state>  <code>KY</code>  <name>Kentucky</name>  </state>  <state>  <code>LA</code>  <name>Louisiana</name>  </state>  <state>  <code>ME</code>  <name>Maine</name>  </state>  <state>  <code>MD</code>  <name>Maryland</name>  </state>  <state>  <code>MA</code>  <name>Massachusetts</name>  </state>  <state>  <code>MI</code>  <name>Michigan</name>  </state>  <state>  <code>MN</code>  <name>Minnesota</name>  </state>  <state>  <code>MS</code>  <name>Mississippi</name>  </state>  <state>  <code>MO</code>  <name>Missouri</name>  </state>  <state>  <code>MT</code>  <name>Montana</name>  </state>  <state>  <code>NE</code>  <name>Nebraska</name>  </state>  <state>  <code>NV</code>  <name>Nevada</name>  </state>  <state>  <code>NH</code>  <name>New Hampshire</name>  </state>  <state>  <code>NJ</code>  <name>New Jersey</name>  </state>  <state>  <code>NM</code>  <name>New Mexico</name>  </state>  <state>  <code>NY</code>  <name>New York</name>  </state>  <state>  <code>NC</code>  <name>North Carolina</name>  </state>  <state>  <code>ND</code>  <name>North Dakota</name>  </state>  <state>  <code>OH</code>  <name>Ohio</name>  </state>  <state>  <code>OK</code>  <name>Oklahoma</name>  </state>  <state>  <code>OR</code>  <name>Oregon</name>  </state>  <state>  <code>PA</code>  <name>Pennsylvania</name>  </state>  <state>  <code>RI</code>  <name>Rhode Island</name>  </state>  <state>  <code>SC</code>  <name>South Carolina</name>  </state>  <state>  <code>SD</code>  <name>South Dakota</name>  </state>  <state>  <code>TN</code>  <name>Tennessee</name>  </state>  <state>  <code>TX</code>  <name>Texas</name>  </state>  <state>  <code>UT</code>  <name>Utah</name>  </state>  <state>  <code>VT</code>  <name>Vermont</name>  </state>  <state>  <code>VA</code>  <name>Virginia</name>  </state>  <state>  <code>WA</code>  <name>Washington</name>  </state>  <state>  <code>WV</code>  <name>West Virginia</name>  </state>  <state>  <code>WI</code>  <name>Wisconsin</name>  </state>  <state>  <code>WY</code>  <name>Wyoming</name>  </state>  </states>  <!\-\- US Outlying Territories -->  <state>  <code>AS</code>  <name>American Samoa</name>  </state>  <state>  <code>GU</code>  <name>Guam</name>  </state>  <state>  <code>MP</code>  <name>Northern Mariana Islands</name>  </state>  <state>  <code>PR</code>  <name>Puerto Rico</name>  </state>  <state>  <code>UM</code>  <name>United States Minor Outlying Islands</name>  </state>  <state>  <code>VI</code>  <name>Virgin Islands</name>  </state>  <!\-\- Armed Forces -->  <state>  <code>AA</code>  <name>Armed Forces Americas</name>  </state>  <state>  <code>AP</code>  <name>Armed Forces Pacific</name>  </state>  <state>  <code>AE</code>  <name>Armed Forces Others</name>  </state>  <!\-\- ISO 3166-2 code + name -->  <?xml version="1.0" encoding="UTF-8"?>  <states>  <state>  <code>US-AL</code>  <name>Alabama</name>  </state>  <state>  <code>US-AK</code>  <name>Alaska</name>  </state>  <state>  <code>US-AZ</code>  <name>Arizona</name>  </state>  <state>  <code>US-AR</code>  <name>Arkansas</name>  </state>  <state>  <code>US-CA</code>  <name>California</name>  </state>  <state>  <code>US-CO</code>  <name>Colorado</name>  </state>  <state>  <code>US-CT</code>  <name>Connecticut</name>  </state>  <state>  <code>US-DE</code>  <name>Delaware</name>  </state>  <state>  <code>US-DC</code>  <name>District Of Columbia</name>  </state>  <state>  <code>US-FL</code>  <name>Florida</name>  </state>  <state>  <code>US-GA</code>  <name>Georgia</name>  </state>  <state>  <code>US-HI</code>  <name>Hawaii</name>  </state>  <state>  <code>US-ID</code>  <name>Idaho</name>  </state>  <state>  <code>US-IL</code>  <name>Illinois</name>  </state>  <state>  <code>US-IN</code>  <name>Indiana</name>  </state>  <state>  <code>US-IA</code>  <name>Iowa</name>  </state>  <state>  <code>US-KS</code>  <name>Kansas</name>  </state>  <state>  <code>US-KY</code>  <name>Kentucky</name>  </state>  <state>  <code>US-LA</code>  <name>Louisiana</name>  </state>  <state>  <code>US-ME</code>  <name>Maine</name>  </state>  <state>  <code>US-MD</code>  <name>Maryland</name>  </state>  <state>  <code>US-MA</code>  <name>Massachusetts</name>  </state>  <state>  <code>US-MI</code>  <name>Michigan</name>  </state>  <state>  <code>US-MN</code>  <name>Minnesota</name>  </state>  <state>  <code>US-MS</code>  <name>Mississippi</name>  </state>  <state>  <code>US-MO</code>  <name>Missouri</name>  </state>  <state>  <code>US-MT</code>  <name>Montana</name>  </state>  <state>  <code>US-NE</code>  <name>Nebraska</name>  </state>  <state>  <code>US-NV</code>  <name>Nevada</name>  </state>  <state>  <code>US-NH</code>  <name>New Hampshire</name>  </state>  <state>  <code>US-NJ</code>  <name>New Jersey</name>  </state>  <state>  <code>US-NM</code>  <name>New Mexico</name>  </state>  <state>  <code>US-NY</code>  <name>New York</name>  </state>  <state>  <code>US-NC</code>  <name>North Carolina</name>  </state>  <state>  <code>US-ND</code>  <name>North Dakota</name>  </state>  <state>  <code>US-OH</code>  <name>Ohio</name>  </state>  <state>  <code>US-OK</code>  <name>Oklahoma</name>  </state>  <state>  <code>US-OR</code>  <name>Oregon</name>  </state>  <state>  <code>US-PA</code>  <name>Pennsylvania</name>  </state>  <state>  <code>US-RI</code>  <name>Rhode Island</name>  </state>  <state>  <code>US-SC</code>  <name>South Carolina</name>  </state>  <state>  <code>US-SD</code>  <name>South Dakota</name>  </state>  <state>  <code>US-TN</code>  <name>Tennessee</name>  </state>  <state>  <code>US-TX</code>  <name>Texas</name>  </state>  <state>  <code>US-UT</code>  <name>Utah</name>  </state>  <state>  <code>US-VT</code>  <name>Vermont</name>  </state>  <state>  <code>US-VA</code>  <name>Virginia</name>  </state>  <state>  <code>US-WA</code>  <name>Washington</name>  </state>  <state>  <code>US-WV</code>  <name>West Virginia</name>  </state>  <state>  <code>US-WI</code>  <name>Wisconsin</name>  </state>  <state>  <code>US-WY</code>  <name>Wyoming</name>  </state>  </states>  <!\-\- US Outlying Territories -->  <state>  <code>US-AS</code>  <name>American Samoa</name>  </state>  <state>  <code>US-GU</code>  <name>Guam</name>  </state>  <state>  <code>US-MP</code>  <name>Northern Mariana Islands</name>  </state>  <state>  <code>US-PR</code>  <name>Puerto Rico</name>  </state>  <state>  <code>US-UM</code>  <name>United States Minor Outlying Islands</name>  </state>  <state>  <code>US-VI</code>  <name>Virgin Islands</name>  </state>  <!\-\- Armed Forces -->  <state>  <code>US-AA</code>  <name>Armed Forces Americas</name>  </state>  <state>  <code>US-AP</code>  <name>Armed Forces Pacific</name>  </state>  <state>  <code>US-AE</code>  <name>Armed Forces Others</name>  </state> 
```


Credit Card Number Generator & Validator
========================================

*   [Validate a credit card number](#validate)
*   [Fake credit card numbers for all major brands (Not real numbers, testing only!)](#fakeNumbers)
*   [How to validate a credit card number](#howToValidate)
*   [List of credit card formats by issuer](#cardFormats)

Validate a credit card number
-----------------------------

Credit Card Number:  [Validate](javascript:validateCreditCard();) 

Fake credit card numbers for all major brands
---------------------------------------------

**These credit card numbers DO NOT work! They are for testing purposes only. Without a valid owner name, an expiration date and a valid CVV code, they can't be used for real transactions. You should use these numbers only to test your validation strategies and for bogus data. Note that the algorithm used here is freely available across the web even Wikipedia.org. These numbers were generated randomly.****You can [refresh](javascript:location.reload();) the page to get new numbers.**

*   **VISA**:  
    4929903943176912  
    4024007103071576  
    4929114001572008651
*   **MasterCard**:  
    5537860697223343  
    2221003383365676  
    5428841139310577
*   **American Express (AMEX)**:  
    371318780666456  
    343676764182682  
    347732815874763
*   **Discover**:  
    6011572454185861  
    6011772642126534  
    6011039272481253251
*   **JCB**:  
    3538290088852381  
    3533299019251725  
    3531216800259763096
*   **Diners Club - North America**:  
    5555164192172809  
    5518307948829406  
    5445181371808445
*   **Diners Club - Carte Blanche**:  
    30597456972776  
    30478891143051  
    30487737092125
*   **Diners Club - International**:  
    36890518744059  
    36784699221724  
    36436941558847
*   **Maestro**:  
    5020700774131080  
    5020228579204522  
    5018931525058090
*   **Visa Electron**:  
    4175004575593754  
    4913824472678193  
    4913520027041446
*   **InstaPayment**:  
    6382072501550978  
    6385446506143640  
    6383723026138272

How to validate a Credit Card Number?
-------------------------------------

Most credit card number can be validated using the Luhn algorithm, which is more or a less a glorified Modulo 10 formula!

### The Luhn Formula:

*   Drop the last digit from the number. The last digit is what we want to check against
*   Reverse the numbers
*   Multiply the digits in odd positions (1, 3, 5, etc.) by 2 and subtract 9 to all any result higher than 9
*   Add all the numbers together
*   The check digit (the last number of the card) is the amount that you would need to add to get a multiple of 10 (Modulo 10)

### Luhn Example:

|   Step  Total   

|   Original Number:  4  5  5  6  7  3  7  5  8  6  8  9  9  8  5  **5**   
|   Drop the last digit:  4  5  5  6  7  3  7  5  8  6  8  9  9  8  5   
|   Reverse the digits:  5  8  9  9  8  6  8  5  7  3  7  6  5  5  4   
|   Multiple odd digits by 2:  10  8  18  9  16  6  16  5  14  3  14  6  10  5  8   
|   Subtract 9 to numbers over 9:  1  8  9  9  7  6  7  5  5  3  5  6  1  5  8   
|   Add all numbers:  1  8  9  9  7  6  7  5  5  3  5  6  1  5  8  **85**   
|   Mod 10:  85 modulo 10 = **5** (last digit of card)   

List of credit card number formats
----------------------------------

|   Credit Card Issuer  Starts With ( IIN Range )  Length ( Number of digits )   

|   **American Express**  34, 37  15   
|   Diners Club - Carte Blanche  300, 301, 302, 303, 304, 305  14   
|   Diners Club - International  36  14   
|   Diners Club - USA & Canada  54  16   
|   Discover  6011, 622126 to 622925, 644, 645, 646, 647, 648, 649, 65  16-19   
|   InstaPayment  637, 638, 639  16   
|   JCB  3528 to 3589  16-19   
|   Maestro  5018, 5020, 5038, 5893, 6304, 6759, 6761, 6762, 6763  16-19   
|   **MasterCard**  51, 52, 53, 54, 55, 222100-272099  16   
|   **Visa**  4  13-16-19   
|   Visa Electron  4026, 417500, 4508, 4844, 4913, 4917  16
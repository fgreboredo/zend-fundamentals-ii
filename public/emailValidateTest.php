<?php

// Lab: Validata an Email Address

echo "Lab: Validata an Email Address\n\n";

$emails = [
    "fgonzalez@dinahosting.com" ,
    "@dinahosting.com",
    "email-at-dinahosting.com",
    "email@dinahosting",
    "---fgonzalez@dinahosting.com"
    ];

/**
 * Email account:
 * - Begin with alphanumeric
 * - One or more of:
 *    - word character (alphanumieric and "_")
 *    - dot (explicit)
 *    - 'plus' character (+) (explicit)
 *    - 'dash' character
 *
 * Separator:
 * - '@' character (explicit)
 *
 * Domain name:
 * - zero or more alphanumeric characters
 * - a group containing, one or more times:
 *    - Dot OR dash-asterisk zero or one time
 *    - alphaumeric
 * - dot (explicit)
 * - from A to Z and a to Z, between 2 and 20 times
 * End
 */

$emailRegExp = "/^[[:alnum:]][\w\.\+\-]*\@[A-Za-z0-9]+((\.|-*)?[A-Za-z0-9])*\.[A-Za-z]{2,20}$/";


foreach ($emails as $email)
{
    $passes = preg_match($emailRegExp, $email);

    echo $passes? "$email passes the validation!\n" : "$email is NOT a valid email\n";
}

echo "\n\n";
# Clover Property Web App: RTO Affordability Calculator

<b>Front end form</b>
<img src="https://github.com/kholmatov/rto/blob/master/form.png?raw=true">

Th form is located somewhere on the website http://site.com/clover-properties-rent-to-own-application/<br>
The form includes the following fields: Name (First and Last), Email, Household Income (number is entered by a user), Down Payment (amount is entered by a user)<br>
As soon as the form completed, the user is suggested to click on CALCULATE button<br>
Click on CALCULATE button will trigger the following action: the app takes the Household Income Number, multiplies it by the Stress Test % (5.5%), adds Down Payment amount and display this final number in the field “YOUR BUDGET IS:”; the info (see the Example) is sent to user’s email, admin’s email, and saved in online DB.<br>

<i>Example:</i> 

John Smith<br>
jsmith@gmail.com<br>
Household Income: $100,000<br>
Down Payment: $15,000<br>
YOUR BUDGET IS:  $120,500.<br>

<b>Backend admin panel</b>
 
Only one pre-set account is available for Backend panel. Link to the login page is not publicly available. It can be a link like this: http://site.com/calculator/login/



<img src="https://github.com/kholmatov/rto/blob/master/admin.png?raw=true" width="50%">

# Security Policy

## Supported Versions

Use this section to tell people about which versions of your project are
currently being supported with security updates.

| Version | Supported          |
| ------- | ------------------ |
| 5.1.x   | :white_check_mark: |
| 5.0.x   | :x:                |
| 4.0.x   | :white_check_mark: |
| < 4.0   | :x:                |

## Reporting a Vulnerability

Use this section to tell people how to report a vulnerability.

Tell them where to go, how often they can expect to get an update on a
reported vulnerability, what to expect if the vulnerability is accepted or
declined, etc.


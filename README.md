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
<br>
<center><img src="https://github.com/kholmatov/rto/blob/master/admin.png?raw=true" width="50%"></center>


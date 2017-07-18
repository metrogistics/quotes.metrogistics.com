<br />
<br />
Thank you for requesting a quote from MetroGistics!<br />
<br />
The best rate for the transportation you requested is: {!! $QuickQuote->Quote !!}<br />
<br />
Thanks,<br />
{!! $QuickQuote->QuotedBy !!}<br />
1-877-571-6235 x1<br />
sales@metrogistics.com<br />
<br />
<br />
<br />
Your Quote Information<br />
---------------------------------<br />
Name: {!! $QuickQuote->FirstName !!} {!! $QuickQuote->LastName !!}<br />
Phone: {!! $QuickQuote->PhoneNumber !!} {!! $QuickQuote->PhoneNumberExt !!}<br />
Email: {!! $QuickQuote->EmailAddress !!}<br />
<br />
<br />
Number of Vehicles: {!! $QuickQuote->NumberOfVehicles !!}<br />
<br />

Origin: {!! $QuickQuote->oAreaName !!}<br />
Origin User Typed in: {!! $QuickQuote->oTerm !!}<br />
<br />
Dest: {!! $QuickQuote->dAreaName !!}<br />
Dest User Typed in: {!! $QuickQuote->dTerm !!}<br />
<br />
Details:<br />
{!! $QuickQuote->Details !!}<br />
<br />
<br />
<br />
Created: {!! Carbon\Carbon::parse($QuickQuote->created_at)->format('m/d/Y h:i A') !!}<br />

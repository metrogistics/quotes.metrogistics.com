Name: {!! $QuickQuote->FirstName !!} {!! $QuickQuote->LastName !!}<br />
Phone: {!! $QuickQuote->PhoneNumber !!} {!! $QuickQuote->PhoneNumberExt !!}<br />
Email: {!! $QuickQuote->EmailAddress !!}<br />
IP: {!! $QuickQuote->IPAddress !!}<br />
<br />
<br />
Number of Vehicles: {!! $QuickQuote->NumberOfVehicles !!}<br />
<br />

Origin Area: {!! $QuickQuote->oAreaName !!} -  oAreaId({!! $QuickQuote->oAreaId !!})<br />
Origin User Typed in: {!! $QuickQuote->oTerm !!}<br />
<br />
Dest Area: {!! $QuickQuote->dAreaName !!} -  dAreaId({!! $QuickQuote->dAreaId !!})<br />
Dest User Typed in: {!! $QuickQuote->dTerm !!}<br />
<br />
Details:<br />
{!! $QuickQuote->Details !!}<br />
<br />
<br />
<br />
Quote:  <a href="http://{{$QuickQuote->request_subdomain}}.metrogistics.com/SendQuote/{!! $QuickQuote->id !!}" target="_blank">Send Quote Response</a><br />
<br />
<br />
<br />
Created: {!! Carbon\Carbon::parse($QuickQuote->created_at)->format('m/d/Y h:i A') !!}<br />

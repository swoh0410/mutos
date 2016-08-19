<!DOCTYPE html>
<html lang="en">
<head>

<title>jQuery DOB Picker Plugin Demo</title>
</head>
<body>
<div class="container" style="margin-top:150px;">
<h3>jQuery DOB Picker Plugin Demo</h3>
<div class="row">
<div class="col-xs-2">
<select id="dobday" class="form-control input-lg"></select>
</div>
<div class="col-xs-2">
<select id="dobmonth" class="form-control input-lg"></select>
</div>
<div class="col-xs-2">
<select id="dobyear" class="form-control input-lg"></select>
</div>
</div>
</div>
<script>
$(document).ready(function(){
  $.dobPicker({
    daySelector: '#dobday', /* Required */
    monthSelector: '#dobmonth', /* Required */
    yearSelector: '#dobyear', /* Required */
    dayDefault: 'Day', /* Optional */
    monthDefault: 'Month', /* Optional */
    yearDefault: 'Year', /* Optional */
    minimumAge: 8, /* Optional */
    maximumAge: 100 /* Optional */
  });
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
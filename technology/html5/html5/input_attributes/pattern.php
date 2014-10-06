<!DOCTYPE html>
<html>
<body>

<form action="demo_form.asp">
  Country code: <input type="text" name="country_code" pattern="[A-Za-z]{3}" title="Three letter country code">
  <input type="submit">
</form>

<p><strong>Note:</strong> The pattern attribute of the input tag is not supported in Internet Explorer 9 and earlier versions, or in Safari.</p>

</body>
</html>
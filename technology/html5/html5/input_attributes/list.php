<!DOCTYPE html>
<html>
<body>

<form action="demo_form.asp" method="get">

<input list="browsers" name="browser">
<datalist id="browsers">
  <option value="Internet Explorer">
  <option value="Firefox">
  <option value="Chrome">
  <option value="Opera">
  <option value="Safari">
</datalist>
<input type="submit">
</form>

<p><b>Note:</b> The datalist tag is not supported in Internet Explorer 9 and earlier versions, or in Safari.</p>

</body>
</html>
<!DOCTYPE html>
<html>
<body>

<p>
Depending on browser support:<br>
Numeric restrictions will apply in the input field.
</p>

<form action="demo_form.asp">
  Quantity (between 1 and 5):
  <input type="number" name="quantity" min="1" max="5">
  <input type="submit" value="Send">
</form>

<p><b>Note:</b>
type="number" is not supported in Internet Explorer 9 and earlier versions.
</p>

</body>
</html>
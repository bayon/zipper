<!DOCTYPE html>
<html>
<body>

<form action="demo_form.asp">
  First name: <input type="text" name="fname"><br>
  Last name: <input type="text" name="lname"><br>
  <input type="submit" value="Submit as normal">
  <input type="submit" formtarget="_blank" value="Submit to a new window/tab">
</form>

<p><strong>Note:</strong> The formtarget attribute of the input tag is not supported in Internet Explorer 9 and earlier versions.</p>

</body>
</html>
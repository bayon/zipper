<!DOCTYPE html>
<html>
<body>

<form action="demo_form.asp">
  First name: <input type="text" name="fname"><br>
  Last name: <input type="text" name="lname"><br>
  <input type="submit" value="Submit"><br>
  <input type="submit" formaction="demo_admin.asp" value="Submit as admin">
</form>

<p><strong>Note:</strong> The formaction attribute of the input tag is not supported in Internet Explorer 9 and earlier versions.</p>

</body>
</html>
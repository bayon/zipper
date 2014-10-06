<!DOCTYPE html>
<html>
<body>

<form action="demo_form.asp" method="get">
  First name: <input type="text" name="fname"><br>
  Last name: <input type="text" name="lname"><br>
  <input type="submit" value="Submit">
  <input type="submit" formmethod="post" formaction="demo_post.asp" value="Submit using POST">
</form>

<p><strong>Note:</strong> The formmethod attribute of the input tag is not supported in Internet Explorer 9 and earlier versions.</p>

</body>
</html>
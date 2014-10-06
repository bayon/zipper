<!DOCTYPE html>
<html>
<body>

<form action="demo_post_enctype.asp" method="post">
  First name: <input type="text" name="fname"><br>
  <input type="submit" value="Submit">
  <input type="submit" formenctype="multipart/form-data" value="Submit as Multipart/form-data">
</form>

<p><strong>Note:</strong> The formenctype attribute of the input tag is not supported in Internet Explorer 9 and earlier versions.</p>

</body>
</html>
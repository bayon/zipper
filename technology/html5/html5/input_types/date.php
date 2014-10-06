<!DOCTYPE html>
<html>
<body>

<form action="demo_form.asp">
  Enter a date before 1980-01-01:
  <input type="date" name="bday" max="1979-12-31"><br>
  Enter a date after 2000-01-01:
  <input type="date" name="bday" min="2000-01-02"><br>
  <input type="submit" value="Send"> 
</form>

<p><strong>Note:</strong>
type="date" is not supported in Internet Explorer 9 and earlier versions.</p>

</body>
</html>

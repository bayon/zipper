<!DOCTYPE html>
<html>
<body>

<form action="demo_form.asp" id="form1">
First name: <input type="text" name="fname"><br>
<input type="submit" value="Submit">
</form>

<p>The "Last name" field below is outside the form element, but still part of the form.</p>
Last name: <input type="text" name="lname" form="form1">

</body>
</html>
<!DOCTYPE html>
<html>
<body>

<form action="demo_form.asp" method="get"
oninput="x.value=parseInt(a.value)+parseInt(b.value)">
0
<input type="range" id="a" name="a" value="50">
100 +
<input type="number" id="b" name="b" value="50">
=
<output name="x" for="a b"></output>
<input type="submit">
</form>

</body>
</html>
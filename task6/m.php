<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<script src="s.js"></script>
<input type="text" name="name" value="kkkk" onchange="myfunc(this.value)">
<script>
function myfunc(value){
  console.log("change" + value);
}
</script>
</body>
</html>
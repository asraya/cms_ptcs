<!DOCTYPE html>
<html>
<head>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</head>
<body>
<select id="selectBox" onchange="changeFunc();">
<option value="MCA">MCA</option>
<option value="MBA">MBA</option>
<option value="not_listed">Not Listed</option>
</select>
<input name="dd_number" placeholder="Add New" class="form-control" type="text" style="display: none" id="textboxes">

<script type="text/javascript">
function changeFunc() {
var selectBox = document.getElementById("selectBox");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;
if (selectedValue=="not_listed"){
$('#textboxes').show();

}
else {
alert("Error");
$('#textboxes').hide();
}
}
</script>
</body>
</html>
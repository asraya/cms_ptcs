	
<html>
	<head></head>
	<body>
		<form>
		<table id="tampilan">
<tr>
<td width="25%"><label for="alamat">Data Penerima</label></td>
<td>
<input type="radio" name="alamat" value="sama" class="detail"> Sama dengan data Pembeli
 
</td>
<td width="40%">
<input type="radio" name="alamat" value="berbeda" class="detail">Data berbeda
</td>
</tr>
 
<tr>
<td>
</td>
<td>
</td>
 
<td>
<div id="form-input">
 
<p>Nama<br />
<input type="text" name="nama"></p>
<p>Telpon/HP<br />
<input type="text" name="telpon"></p>
<p>Email<br />
<input type="text" name="email"></p>
 
</div>
</td>
 
</tr>
</table>
		</form>
		<!-- tambahkan jquery-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$(":radio.rad").click(function(){
					$("#form1, #form2").hide()
					if($(this).val() == "1"){
						$("#form1").show();
					}else{
						$("#form2").show();
					}
				});
			});
		</script>
                <script>
$(document).ready(function(){
$("#form-input").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
$(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
if ($("input[name='alamat']:checked").val() == "berbeda" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
$("#form-input").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
} else {
$("#form-input").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
}
});
});
</script>
	</body>
</html>
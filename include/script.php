<script>
		function active(self){
			var data=self.value;
		
			if(data=="Active"){
				self.innerHTML="Deactive";
				self.style.color="white";
				$(self).removeAttr("value");
				$(self).attr("value","Deactive");
				self.style.background="red";
				$("#al").html("<p class='alert text-center alert-danger'>Deactive</p>");
				return;
			}
			if(data=="Deactive"){
				$(self).removeAttr("value");
				$(self).attr("value","Active");
				self.innerHTML="Active";
				self.style.color="white";
				self.style.background="green";
				$("#al").html("<p class='alert text-center alert-success '>active</p>");
				return;
			}
		}
	</script>
	<style> .activeBtn{
		background:red;
		color:white;
		width:10%;
		cursor:pointer;
		
	}</style>
	<button class="activeBtn" onclick="active(this)"  value="Deactive">Deactive</button>
	<p id="al" style="width:200px; height:50px;"></p>
	<?php
		$con=mysqli_connect("localhost","root","","hms2");
		$ROW=mysqli_query($con,"select * from tblpatient");
		var_dump($ROW);	
		/*while($RW=mysqli_fetch_array($ROW)){
			echo $RW['gender']."<br>";
		}*/
	
	?>
    
<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?php
	include_once "./ad.php";
	?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<p class="t botli">管理員登入區</p>
	<p class="cent">帳號 ： <input name="acc" id="acc" type="text"></p>
	<p class="cent">密碼 ： <input name="pw" id="pw" type="password"></p>
	<p class="cent"><input value="送出" type="submit" onclick="loginFun()"><input type="reset" value="清除" onclick="resetFun()"></p>
</div>
<script>
	function loginFun(){
		let acc = $("#acc").val();
		let pw = $("#pw").val();

		$.post("./api/login.php",{acc,pw},(res)=>{
			if(parseInt(res)===1){
				location.href ="./back.php";
			}else{
				alert("帳號或密碼錯誤");
			}
		})
	}

	function resetFun(){
		$("#acc, #pw").val("");
	}
</script>
<div class="login">	
		<?php if(strlen($name) == 0){?>
			<form name="loginForm" onsubmit="return checkLoginPass(this)" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="col"><input type="text" name="login" value="" placeholder="Login lub e-mail"></div>
				
				<div class="col">
					<input type="password" name="pass" value="" placeholder="Hasło">
					<!-- dodać w przyszłości obsługę zapomnianego hasła
					<div class="pasforg"><a href="/login-reminder.html" class="pasforg">Nie pamiętasz hasła?</a></div> 
					-->
				</div>
				
				<div class="col">
					<input type="submit" class="submitLogin" value="Zaloguj">
				</div>
			</form>
	<?php }else{?>
		<div class="col_right">
			<form name="logoffForm" method="post" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<img src="img/user.png" title="Cześć <?php echo $name?>">
					<input type="hidden" name="logoff" value="YES"> 
					<img src="img/exit.png" title="Wyloguj" onclick="submit()"style="cursor:pointer;border:none;width:20px;height:20px;">
				</form>
		</div>
	<?php }?>
</div>

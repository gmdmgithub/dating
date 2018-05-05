<?php
	$naviItems = array(
					array(
						'name'		=> 'home',
						'site'		=> 'index.php',
						'title'		=>	'Home',
						'access'	=>	'ALL'
					),
					array(
						'name'		=> 'register',
						'site'		=> 'register.php',
						'title'		=>	'Rejestracja',
						'access'	=>	'UNREGISTRED'
					),
					array(
						'name'		=> 'contact',
						'site'		=> 'contact.php',
						'title'		=>	'Kontakt',
						'access'	=>	'REGISTRED'
					),
					array(
						'name'		=> 'proposals',
						'site'		=> 'proposals.php',
						'title'		=>	'Ogłoszenia',
						'access'	=>	'REGISTRED'
					),
					array(
						'name'		=> 'questions',
						'site'		=> 'questions.php',
						'title'		=>	'Pytania',
						'access'	=>	'ADMIN'
					),
					array(
						'name'		=> 'invitations',
						'site'		=> 'invitations.php',
						'title'		=>	'Zaproszenia',
						'access'	=>	'REGISTRED'
					),//jako ostatnie zawsze te dwie
					array(
						'name'		=> 'regulamin',
						'site'		=> 'regulamin.php',
						'title'		=>	'Regulamin',
						'access'	=>	'ALL'
					),
					array(
						'name'		=> 'about',
						'site'		=> 'about.php',
						'title'		=>	'O nas',
						'access'	=>	'ALL'
					)
					);

	if(strlen($message) >0){
		echo '<div class="message">';
		echo $message;
		echo '</div>';
		$_SESSION["message"] = "";
	}
	
?>
	<nav>
		<div class="menu">
			<?php
	foreach($naviItems as $item){
		if( ($item['access'] == 'REGISTRED' &&  strlen($name) > 0) ||
					($item['access'] == 'UNREGISTRED' &&  strlen($name) == 0) || $item['access'] == 'ALL'){
			if($item['name'] == $page){?>
					<a class="active" href="#">
						<?php echo $item['title'];?>
					</a>
				<?php }else{ ?>
					<a href="./<?php echo $item['site'];?>">
						<?php echo $item['title'];?>
					</a>
				<?php
			}
		}
	};
?>
		</div>
		<?php include('./login.php');?>
	</nav>
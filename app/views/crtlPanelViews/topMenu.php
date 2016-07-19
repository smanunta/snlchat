<?php
  $menuData = $data['allMenuData']->createAllWgtMenu();
//var_dump($menuData->first()->name);
  
?>
<div class="wrapper">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
				<!-- Title or logo --> 
				<div class='navbar-header publicNav'>
					<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#main_navbar'>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					<a href='#' class='navbar-brand'>Admin Tool</a>
				</div>
				
				<!-- menu items -->
				<div class='collapse navbar-collapse' id="main_navbar">
					<ul class='nav navbar-nav'>
						
						<li class='dropdown active'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown'>New <span class='caret'></span></a>
							<ul class='dropdown-menu'>
								<?php
                  foreach($menuData->results() as $wgt)
                  {
                    echo "<li class='wgtOption' data-widget='".$wgt->name."'><a href='#'>" . $wgt->displayName ."</a></li>";
                  }
				        ?>
							</ul>
						</li>
						<li><a href='update.php'>Logged in: <?php echo Sanitize::escape($data['user']->data()->username)?></a></li>
								<li><a href='logout.php'>Log out</a></li>
					<ul>
				</div>
            </div>
		</nav>
           
	</div>
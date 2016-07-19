<?php 
	
	/*if(isset($_GET['widget_id']))
	{
		 $widget_id = $_GET['widget_id'];
	}else{$widget_id =0;}
	
	$sql = "SELECT * FROM articles LIMIT 10";
	$query = $handler->prepare($sql);
	$query->execute();
	
	echo "<link rel='stylesheet' type='text/css' href='./widgets/display_articles/display_articles.css'/>";
	echo "<div class='article_list'>";
	while($article_data = $query->fetch(PDO::FETCH_ASSOC))
	{
		//find the user who created the article
		$sql = "SELECT * FROM users WHERE (user_id = :user_id) LIMIT 1";
		$find_creator = $handler->prepare($sql);
		$find_creator->bindParam(':user_id', $article_data['created_by'], PDO::PARAM_STR);
		$find_creator->execute();
		$created_by = $find_creator->fetch(PDO::FETCH_ASSOC);
		
		//display the data 
		echo "<ul>";
		echo "<li class='display_article_id'><a href='./display_article.php?article_id=" . $article_data['article_id'] ."'>" . $article_data['article_id'] . "</a></li>";
		echo "<li class='display_article_id'><a href='./display_article.php?article_id=" . $article_data['article_id'] ."'><span aria-hidden='true' class='icon-pencil'></span></a></li>";
		echo "<li class='display_article_id'><a href='./display_article.php?article_id=" . $article_data['article_id'] ."'><span aria-hidden='true' class='icon-newspaper'></span></a></li>";
		echo "<li class='display_article_title'>" . $article_data['article_title'] . "</li>";
		echo "<li class='display_article_creator'>" . $created_by['last'] . ", " . $created_by['first'] . "</li>";
		echo "</ul>";
	}
	echo "</div>";*/
?>
<div class="jumbotron">
	<h1>This is one of the first views created...called display articles</h1>
</div>



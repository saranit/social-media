<?php 
/**
 * Twitter API SEARCH
 * Selim Hallaç
 * selimhallac@gmail.com
 */

//include "libraries/twitteroauth.php";

$consumer_key = "UmuoIrhenIFmbWO7cYHTxQ1I2";
$consumer_secret = "IINeTdTZPjnDMpTGYt3LnSnZWUX1LuzUhGExbAVkQAneV5thUZ";
$access_token = "988242884-QoCLdJZXKsFsxhtMg44jXLTE7eFl5kGE6xCjKDb7";
$access_token_secret = "74SLvElGqFfgFlVBFfksg1TwMmzHer5ak9Zm9PlQs5ck4";
?>
<form method="post">
<p>Search :</p><p><input type="text" name="linked_search" id="linked_search"></p>
<tr><input type="submit" name="submit" value="search"></tr>
</form>
<?php

if(isset($_POST['submit']))
{
	$search=$_POST['linked_search']; 
	$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

	$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$search.'&result_type=recent&count=50&lang=en');
	
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <title>Twitter API SEARCH</title>
	</head>
	<body>
	<?php foreach ($tweets->statuses as $key => $tweet) { ?>
		Tweet : <img src="<?=$tweet->user->profile_image_url;?>" /><?=$tweet->text; ?><br>
	<?php 
	} 
} ?>
  

</body>
</html>
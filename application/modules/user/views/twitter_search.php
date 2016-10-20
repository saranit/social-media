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
$access_token_secret = "74SLvElGqFfgFlVBFfksg1TwMmzHer5ak9Zm9PlQs5ck4 ";
?>
<form method="post">
<p>Search :</p><p><input type="text" name="linked_search" value="<?=(isset($_POST['linked_search']) && $_POST['linked_search'] !='' )?$_POST['linked_search']:''?>" id="linked_search"   required></p>
<tr><input type="submit" id="search_tweets"  name="submit" value="search" ></tr>
</form>
<?php


	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
	  <meta charset="UTF-8">
	  <title>Twitter API SEARCH</title>
	</head>
	<body>
	<?php 
	    
		if(isset($tweets) && count($tweets) > 0 ) 
	    {
			foreach ($tweets->statuses as $key => $tweet) 
		    { 
			 //echo $tweet->id ; die;
			?>
		        
				
				Tweet : <img src="<?=$tweet->user->profile_image_url;?>" /><?=$tweet->text; ?> 
				
				
				
				<?php
				
				$connection = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);
				
				//$connection = getConnectionWithAccessToken($consumer_key, $consumer_secret, $access_token, $access_token_secret);
				
				//print_r($connection); die;
				$var = $connection->post('statuses/retweet/'.$tweet->id_str);  
				
				print_r($var); ?>
				 
			<br>
	        <?php 
	        }    
		}
		else
		{
			echo '';
		}
/* } */ ?>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
<script>
/* $("#search_tweets").click(function(){
	var twitter_key =$("#linked_search").val();
	
	$.post("<?php  echo base_url()?>user/social/twitter_keyword_validation",{ twitter_key : 'twitter_key'}, 
	function(res)
	{
		alert(res);
		return false;

	});
	
	//alert();
	//return false;
	
}); */
</script>
</html>
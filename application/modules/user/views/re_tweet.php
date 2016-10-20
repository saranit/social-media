<?php
//require_once 'twitteroauth/twitteroauth.php';

/* $consumer_key = "UmuoIrhenIFmbWO7cYHTxQ1I2";
$consumer_secret = "IINeTdTZPjnDMpTGYt3LnSnZWUX1LuzUhGExbAVkQAneV5thUZ";
$access_token = "988242884-QoCLdJZXKsFsxhtMg44jXLTE7eFl5kGE6xCjKDb7";
$access_token_secret = "74SLvElGqFfgFlVBFfksg1TwMmzHer5ak9Zm9PlQs5ck4 ";*/

$twitteruser = 'saladi_saran';
$notweets = 1;
$consumerkey = 'UmuoIrhenIFmbWO7cYHTxQ1I2';
$consumersecret = 'IINeTdTZPjnDMpTGYt3LnSnZWUX1LuzUhGExbAVkQAneV5thUZ';
$accesstoken = '988242884-QoCLdJZXKsFsxhtMg44jXLTE7eFl5kGE6xCjKDb7';
$accesstokensecret = '74SLvElGqFfgFlVBFfksg1TwMmzHer5ak9Zm9PlQs5ck4';

$connection = new TwitterOAuth($consumerkey , $consumersecret , $accesstoken,$accesstokensecret);
$tweets = $connection->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$twitteruser.'&count='.$notweets);
@$tweetData = json_decode($tweets, true);
print_r($tweetData); die;
$retweetId=$tweetData[0]['id_str'];

 // load oauth_token,oauth_token_secret,twitter username from file accounts.txt ( possible load from any database ) 
$lines=file('accounts.txt');
foreach($lines as $line) {
     $data=explode(',',trim($line));
     $connection = new TwitterOAuth($consumerkey , $consumersecret , $data[0],$data[1]);
     $var = $connection->post('statuses/retweet/'.$retweetId);
}

 ?>
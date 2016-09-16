<?php
class Common_function
	{
		function generateOneTimePassword ($length = 10)
			{
				$password = "";
				$possible = "123467890ABCDFGHJKLMNPQRTVWXYZ";

				$maxlength = strlen($possible);  
				
				if ($length > $maxlength) {
				  $length = $maxlength;
				}    
				$i = 0; 
				
				while ($i < $length) { 
				  $char = substr($possible, mt_rand(0, $maxlength-1), 1);
				  if (!strstr($password, $char)) {        
					$password .= $char;        
					$i++;
				  }

				}
				return $password;

			}
	}
 

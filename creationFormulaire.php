<?php
	function get_current_url($strip = true)
	{
		// filter function
		static $filter;
		if ($filter == null)
		{
			$filter = function($input) use($strip)
			{
				$input = str_ireplace(array("\0", '%00', "\x0a", '%0a', "\x1a", '%1a'), '', urldecode($input));
				if ($strip)
				{
					$input = strip_tags($input);
				}

				// or any encoding you use instead of utf-8
				$input = htmlspecialchars($input, ENT_QUOTES, 'utf-8'); 
				return trim($input);
			};
		}

		return 'http'. (($_SERVER['SERVER_PORT'] == '443') ? 's' : '').'://'. $_SERVER['SERVER_NAME'] . $filter($_SERVER['REQUEST_URI']);
	}

	$param =  get_current_url();
	$param = $param . "&";
	$pos = strpos ($param, "?");

	$param = substr ($param, $pos + 1);
	
	function getoccurence($chaine, $rechercher)
	{
		$lastpos = 0;
		$positions = array ();
		while (($lastpos = strpos ($chaine, $rechercher, $lastpos)) !== false)
		{
			$positions[] = $lastpos;
			$lastpos = $lastpos + strlen($rechercher);
		}
		return $positions;
	}

	$positionset[] = getoccurence ($param, "&");
	$positionsegal[] = getoccurence ($param, "=");

	$identifiant = $_COOKIE["identifiant"];

	$mysqli = new mysqli("localhost", "root", "pixel1234", "test");
	$requette = "INSERT INTO questionnaire(id_utilisateur) VALUES('".$identifiant."')";
	$query =$mysqli->query ($requette);

	$id_questionnaire = $mysqli->insert_id;

	$numero_question = 1;
	for ($i = 0; $i < count ($positionset[0]); $i ++)
	{
		$question = substr ($param, $positionsegal[0][$i] + 1, $positionset[0][$i] - $positionsegal[0][$i] - 1);
		$i ++;

		$elem1 = substr ($param, $positionsegal[0][$i] + 1, $positionset[0][$i] - $positionsegal[0][$i] - 1);
		$i ++;

		$elem2 = substr ($param, $positionsegal[0][$i] + 1, $positionset[0][$i] - $positionsegal[0][$i] - 1);
		$i ++;

		$elem3 = substr ($param, $positionsegal[0][$i] + 1, $positionset[0][$i] - $positionsegal[0][$i] - 1);
		$i ++;

		$elem4 = substr ($param, $positionsegal[0][$i] + 1, $positionset[0][$i] - $positionsegal[0][$i] - 1);
		$i ++;

		$elem5 = substr ($param, $positionsegal[0][$i] + 1, $positionset[0][$i] - $positionsegal[0][$i] - 1);

		// echo $question . "<br />";
		// echo $elem1 . "<br />";
		// echo $elem2 . "<br />";
		// echo $elem3 . "<br />";
		// echo $elem4 . "<br />";
		// echo $elem5 . "<br />";
		
		if (is_numeric ($elem1))
		{
			$bonne_reponse = $elem1;
			$reponse1 = $elem2;
			$reponse2 = $elem3;
			$reponse3 = $elem4;
			$reponse4 = $elem5;
		}
		else if (is_numeric ($elem2))
		{
			$reponse1 = $elem1;
			$bonne_reponse = $elem2;
			$reponse2 = $elem3;
			$reponse3 = $elem4;
			$reponse4 = $elem5;
		}
		else if (is_numeric ($elem3))
		{
			$reponse1 = $elem1;
			$reponse2 = $elem2;
			$bonne_reponse = $elem3;
			$reponse3 = $elem4;
			$reponse4 = $elem5;
		}
		else if (is_numeric ($elem4))
		{
			$reponse1 = $elem1;
			$reponse2 = $elem2;
			$reponse3 = $elem3;
			$bonne_reponse = $elem4;
			$reponse4 = $elem5;
		}
		else if (is_numeric ($elem5))
		{
			$reponse1 = $elem1;
			$reponse2 = $elem2;
			$reponse3 = $elem3;
			$reponse4 = $elem4;
			$bonne_reponse = $elem5;
		}
		
		$requete = "INSERT INTO question(id_questionnaire,question ,bonne_reponse,numero_question,activation_question ) VALUES('".$id_questionnaire."', '".$question."','".$bonne_reponse."','".$numero_question."','0')";
		echo $requete . "<br />";
		$query =$mysqli->query ($requete);
		
		$id_question  = $mysqli->insert_id;
		$requete = "INSERT INTO reponse_prof(id_question,numero_reponse,reponse) VALUES('".$id_question."', '". "a"."','".$reponse1."' ),('".$id_question."', '"."b"."','".$reponse2."' ),('".$id_question."', '"."c"."','".$reponse3."' ),('".$id_question."', '"."d"."','".$reponse4."' ) ";
		echo $requete . "<br />";
		$query =$mysqli->query ($requete);
		
		$numero_question ++;
	}
	// header("Refresh: 1; prof.php");
?>
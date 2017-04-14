<?php
    require_once("DBAccess.php");
	
function healthIssueList()
{
		$db = new DBAccess();
		$dbConnection = $db->initConnection();   // collect all the tags from questions tag and article tags 
		$queryString="Select tag from 
						( 	Select tag From question_tags
							Union
							Select tag From article_tags 
						) userInfo
						order by tag";
				
		$query = mysql_query($queryString,$dbConnection) or die("MySql Error".mysql_error());		
	
		$str =	'<select id = "issue" name="issue" style="width:300px">';
		
		while($rows=mysql_fetch_array($query))
		{	
				$str .=	'<option value="'.$rows["tag"].' " selected>'.$rows["tag"].'</option>';    
		}
		$str.=  '</select>';

		return $str;
}

function answerStatistics()
{
		$db = new DBAccess();
		$dbConnection = $db->initConnection();   
		$queryString="SELECT t.q_id as 'Question Id', AVG(counts) as Average FROM (SELECT q_id, Count(*) AS counts 
							FROM answer GROUP BY q_id) AS t GROUP BY (t.q_id) ORDER BY (Average) DESC";
				
		$query = mysql_query($queryString,$dbConnection) or die("MySql Error".mysql_error());		
	
		$str = '<h2 align="center">Average number of likes per questions</h2><table align="center" border="1"><tr><th>Question</th><th>Average</th></tr>';
		while($rows=mysql_fetch_array($query))
		{	
				$str .=	'<tr><td>'.$rows['Question Id'].'</td><td>'.$rows['Average'].'</td></tr>';    
		}
		$str.=  '</table><br><br>
		
		Query Executed : <br>'.$queryString;
		return $str;
}
	
	
function topRelatedQuestions($related)
{
		$db = new DBAccess();
		$dbConnection = $db->initConnection();   
		$queryString="SELECT q_id, question FROM question WHERE question like '%".$related."%'";
				
		$query = mysql_query($queryString,$dbConnection) or die("MySql Error".mysql_error());		
	
		$str = '<h2 align="center">Related articles</h2><table align="center" border="1"><tr><th>Question Id</th><th>Question</th></tr>';
		while($rows=mysql_fetch_array($query))
		{	
				$str .=	'<tr><td>'.$rows['q_id'].'</td><td>'.$rows['question'].'</td></tr>';    
		}
		$str.=  '</table><br><br>
		
		Query Executed : <br>'.$queryString;
		return $str;
}

function taggedArticles($tag)
{
		$db = new DBAccess();
		$dbConnection = $db->initConnection();   
		$queryString="SELECT title, CONCAT(article_link,'/',a.art_id,'.pdf') as link FROM article a, article_tags at WHERE a.art_id = at.art_id AND at.tag = '".$tag."'";

				
		$query = mysql_query($queryString,$dbConnection) or die("MySql Error".mysql_error());		
	
		$str = '<h2 align="center">Related articles</h2><table align="center" border="1"><tr><th>Article Title</th><th>Link</th></tr>';
		while($rows=mysql_fetch_array($query))
		{	
				$str .=	'<tr><td>'.$rows['title'].'</td><td>'.$rows['link'].'</td></tr>';    
		}
		$str.=  '</table><br><br>
		
		Query Executed : <br>'.$queryString;

		return $str;
}
	

function mostLikedQuestions()
{
		$db = new DBAccess();
		$dbConnection = $db->initConnection();   
		$queryString="SELECT p.patient_id as pid, q.title as title, q.question as question, q.likes FROM question q, patient p WHERE q.patient_id = p.patient_id AND q.likes IN (SELECT MAX(likes) FROM question)";

				
		$query = mysql_query($queryString,$dbConnection) or die("MySql Error".mysql_error());		
	
		$str = '<h2 align="center">Related articles</h2><table align="center" border="1"><tr><th>Asked by</th><th>Title</th><th>Question</th></tr>';
		while($rows=mysql_fetch_array($query))
		{	
				$str .=	'<tr><td>'.$rows['pid'].'</td><td>'.$rows['title'].'</td><td>'.$rows['question'].'</td></tr>';    
		}
		$str.=  '</table><br><br>
		
		Query Executed : <br>'.$queryString;

		return $str;
}
	
	
function topThreeArticles(){
		$db = new DBAccess();
		$dbConnection = $db->initConnection();   
		$queryString="SELECT art_id, likes, title FROM article ORDER BY(likes) DESC LIMIT 3;";

				
		$query = mysql_query($queryString,$dbConnection) or die("MySql Error".mysql_error());		
	
		$str = '<h2 align="center">Related articles</h2><table align="center" border="1"><tr><th>Article Id</th><th>Likes</th><th>Title</th></tr>';
		while($rows=mysql_fetch_array($query))
		{	
				$str .=	'<tr><td>'.$rows['art_id'].'</td><td>'.$rows['likes'].'</td><td>'.$rows['title'].'</td></tr>';    
		}
		$str.=  '</table><br><br>
		
		Query Executed : <br>'.$queryString;

		return $str;
}


	
?>
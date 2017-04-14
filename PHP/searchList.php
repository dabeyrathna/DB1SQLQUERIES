<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<script>

function ansStat() {
	window.open("popUpWindow.php?ansStat=1","_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}

function displayRelatedArticles() {
	window.open("popUpWindow.php?related="+document.getElementById('relatedParts').value,"_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}

function displayTopThreeArticles() {
	window.open("popUpWindow.php?top=1","_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}

function displayMostLikedQuestions(){
	window.open("popUpWindow.php?likes=1","_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}

function displayTagArticles(){
	window.open("popUpWindow.php?tag="+document.getElementById('issue').value,"_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}
</script>

<body>
<p align="center"><h2 align="center">Search and statistics</h2></p><p align="center"><a href="index.php">Home</a></p>
<table align="center" width="806" border="1">
  <tr>
    <td width="796"><div align="center"><br />
      <button onclick="displayTopThreeArticles();">Top three rated articles</button>
      <p>* This will display three article links for highets liked</p>
    </div></td>
  </tr>
  <tr>
    <td>
     <p align="center">
		  <?php
            include 'getLists.php';
            $issueList = healthIssueList(); 
            echo $issueList;
            ?>
    	</p>
        <p align="center">*This will display articles tagged with selected tag</p>
        <div align="center">
      <br/><button onclick="displayTagArticles();">Tag related articles</button>
    </div>
      <br/>
    </td>
  </tr>
  <tr>
    <td>
    <p align="center">
        <label for="relatedParts" >Enter word parts to search related articles</label>
		  <input type="text" id="relatedParts" name="relatedParts" />
    	</p>
    <div align="center">
      <br/><button onclick="displayRelatedArticles();">Related articles</button>  
    </div>
      <p align="center">For ex : search &quot;back pain&quot;</p></td>
  </tr>
  <tr>
    <td>
    	<div align="center">
      		<br/><button onclick="ansStat();">Answer statistics</button>
    	</div>
    	<p align="center">*Display Average number of likes per questions in descending order<br/></p>
    </td>
  </tr>
  <tr>
    <td><div align="center">
      <br/><button onclick="displayMostLikedQuestions();">Most liked answer and Question</button>
      <br/><br/>
    </div></td>
  </tr>
</table>
</body>
</html>
<html>
  	<head>
      <title>Portfolio</title>		

      	<meta name="viewport" content="width=device-width, initial-scale=1">
 
		<link rel="stylesheet"
		  	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
		  	crossorigin="anonymous">
          
		<link rel="stylesheet"
				href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
				integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
				crossorigin="anonymous">
        
		<script	src="https://code.jquery.com/jquery-3.2.1.min.js"
				integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
				crossorigin="anonymous"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
				integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
				crossorigin="anonymous"></script>
        
        <style>
            .fullWidth {
                width: 100%;
            }
            .lav {
                background-color: lavender; 
            }
            .lavBlush {
                background-color: lavenderblush;
            }
            body{
                position: relative; 
            }
            .space {
                margin-top: 50px; 
            }
        </style>
        
 
 		<!-- angular cdn -->
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    </head>
    
    <body>
    <div class="container">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About Me</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reminder.html">Notifcation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="portfolio.html">Portfolio</a>
          </li>
        </ul>
    </div> 
    <?php
    require_once('connectvars.php');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)or die('Error connecting to MySQL server.');
    $query = "SELECT * FROM image6";
    $data = mysqli_query($dbc, $query)or die('Error querying database');

    while($row = mysqli_fetch_array($data)) {
      echo "<div style = \"width : 300px; height: 400px; left : 20%; position: relative;\">";
         echo "<div style= \"width: 300px; height: 300px; position: relative; float:left;\"><img src = $row[path] style= \"width: 300px; height: 300px;\">  <br></div>";
         echo "<div style = \"position:relative;float: left; width:300px; height: 100px;\">";
            echo "<h style =\"position: 40%;\">Image Type: $row[type] </h> <br>";
            echo "<h>Image Size: $row[size]  </h> <br>";
            echo "<h>Uploaded Time: $row[time]  </h> <br>";
            echo "<h>Saved Location: $row[path] </h>";
            echo "<br>";
         echo "</div>";
      echo "</div>";
    }

    ?>
</body>
</html>
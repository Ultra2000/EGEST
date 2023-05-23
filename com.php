


<?php
	// Build up DB connection including cofiguration file
	$conn = mysqli_connect('localhost','root','','egest');

    //if DB connection fails, get a error message
    if(!$conn){
        die('Connection Failed'.mysqli_connect_error());
    }
	//Assign an empty variable to store the fetched items
	$output = '';
	//SQL query to fetch the phone models belongs to the entered brand to the input field
	$sql = "SELECT nom, prixachat, prixvente, articles.id FROM `articles`, `unite` 
    WHERE articles.unite = unite.id AND articles.unite = articles.id AND articles.id = '".$_POST['article_id']."' ";
	// execution of the query. Output a boolean value
	$res = mysqli_query($conn , $sql);
	//Concatenate fetched items to the output variable with HTML option tags to display
	$output .= '<option value="" disabled selected>Select Phone Model</option>';
	// Check whether there are results or not
	if(mysqli_num_rows($res)>0){
		//Fetch the models into an array belongs to a particular brand name/id
		while ($row = mysqli_fetch_array($res)) {
			//Concatenate further fetched items to the output variable
			$output .= '<option value="'.$row["unite"].'">'.$row["nom"].'</option>';
		}
	}
	//print the fetched phone models
	echo $output;



?>
 


<?php

include('connection.php');

	if (isset($_POST['submit'])) {

		$name = $_POST['name'];
        $description = $_POST['description'];
        $department = $_POST['department'];
        $author = $_POST['author'];

		if (isset($_FILES['pdf_file']['name']))
		{

		$file_name = date("hmsms").$_FILES['pdf_file']['name'];
    $file_name = str_replace(' ', '-', $file_name);
		$file_tmp =  $_FILES['pdf_file']['tmp_name'];

		move_uploaded_file($file_tmp,"./all_pdf_file/".$file_name);

    
		$insertquery ="INSERT INTO pdf_data_table(name, filename , description,department, author, date) 
        VALUES('$name','$file_name', '$description', '$department' , '$author', NOW())";

		$iquery = mysqli_query($con, $insertquery);
        header("Location:uploadPage.php");
        echo '<b> Upload successful ok </b>';
        
		}
		else
		{
		?>
			<div class=
			"alert alert-danger alert-dismissible
			fade show text-center">
			<a class="close" data-dismiss="alert"
				aria-label="close">×</a>
			<strong>Failed!</strong>
				File must be uploaded in PDF format!
			</div>
		<?php
		}

  


	}
?>


<?php

if(isset($_POST['btnDeleteAbook'])){
 $remove_file_id = $_POST['id'];
 echo $remove_file_id ;
 $sql_remove_file = "SELECT * FROM pdf_data_table WHERE id = $remove_file_id";
 $result_remove_file = mysqli_query($con, $sql_remove_file);
  
  if(mysqli_num_rows($result_remove_file) > 0){ 
  
    while($row_remove_file = mysqli_fetch_assoc($result_remove_file)){ 
         $filename = $row_remove_file['filename']; 
           echo $filename . '<p>' ;
           $dir =  getcwd().'/all_pdf_file/';
           echo $dir. "" . $filename;
           
         if(unlink($dir. "" . $filename)){
          header("Location:uploadPage.php");
         }
          
          
}

  }

}

?>


<?php
// Deleting a book

if(isset($_POST['btnDeleteAbook'])){
    $id = $_POST['id'];
    $query = "DELETE FROM pdf_data_table WHERE id = $id";
    $result = mysqli_query($con, $query);

    
    if($result){
      echo "Record Deleted ";
      
    //   header("Location:uploadPage.php");
    }else{
        echo "ERROR In deleteing record!!!!!" ;
        header("Location:uploadPage.php");
    }

}


?>



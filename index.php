
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
   include('header.php');
    ?>

  <div class="container mt-5">
  <div class="search">

<form class="form-inline mt-5 pt-5" action="index.php" method = "POST">
<div class="col-sm-9 offset-2">
<input type="text" class="form-control " name = "search" placeholder = "search book by title , deparment or author">
<button type="submit" name = "searchBtn" class="btn form-control">Search For Books</button>
</div>

</form>
</div>

<?php
include('connection.php');

if(isset($_POST['searchBtn'])){
 $search = $_POST['search'];

 $sub_search = substr($search, 0,3);
 
 $sql = "SELECT * FROM pdf_data_table WHERE name LIKE '$search' OR name LIKE '%$sub_search%' 
 OR department LIKE '$search' OR department LIKE '%$sub_search%' 
 OR author LIKE '$search' OR author LIKE '%$sub_search%' ";

 $result = mysqli_query($con, $sql);
  
  if(mysqli_num_rows($result) > 0){ 
  
    while($row = mysqli_fetch_assoc($result)){ 
      
         echo ' <div class = "row mt-4 ">
         <div class="col-sm-4 shadow">
      <p class = "h4" style= "font-family:cursive;"> ' . $row['name']. ' eact is a  for building user interfaces based on UI components.</p>
      <p class ="h6"> AURTHOR : ' .$row['author'] . '</p>

    
      <a href = "./all_pdf_file/'. $row["filename"]. '" download><i class = "fa fa-download fa-3x offset-4"></i> </a>
       

    </div>

    <div class="col-sm-8 shadow">
      <p>' .$row['description'] . '</p>
      <b>' .$row['department'] . ' Department</b>
    </div>
         </div>';
        
          
          
}
 }

}

?>

 
  <div class="row">
    
  </div>

  </div>
</body>
</html>
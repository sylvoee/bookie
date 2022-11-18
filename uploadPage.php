
<?php
include('connection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uploads Books</title>
    
    <?php
   include('header.php');
    ?>

<!-- navbar ends here -->


<div class="row" style ="font-family: cursive;">

<!-- post pdf starts here -->
<div class="col-sm-5" >

<form class = "form-group" method="post" action = "allProcess.php" enctype="multipart/form-data" style ="height:90vh;" 
class ="shadow-lg border-0 pl-1 pr-1">

    <div class="form-input py-2 mt-5">
       <h3 class = "text-info text-center"><i class="fa fa-upload"></i> Upload A Book</h3>
       <hr>
        <div class="form-group">
          <input type="text" class="form-control" name="name"
                 placeholder="Enter book name or title" required>
        </div> 

        <div class="form-input py-2">
        <div class="form-group">
          <label for="">Book Description</label>
          <textarea class="form-control" name="description" name="" id="" cols="30" rows="6"></textarea>
        </div> 

        <div class="form-input py-2">
        <div class="form-group">
          <input type="text" class="form-control" name="department"
                 placeholder="department" required>
        </div> 

        
        <div class="form-group ">
          <input type="text" class="form-control" name="author"
                 placeholder="author" required>
        </div> 

        <div class="form-group py-2">
          <input type="file" name="pdf_file"
                 class="form-control" target =".pdf"
                 title="Upload PDF"/>
        </div>
        <div class="form-group">
          <input type="submit" class="btnRegister btn btn-success"name="submit" value="Submit">
      <input type="reset" class="btnRegister btn btn-danger" name="submit" value="Reset">
        </div>
   </div>
</form>

</div>

</div>
</div> 
<!-- post pdf ends here --> 

<!-- fetch data starts here -->
<div class="col-sm-7 mt-5 shadow-lg"  style="overflow:scroll; height:89vh;""> 
<h3 class= "h3 text-center text-info">All  <i class = "fa fa-book fa-2x"></i> </h3>

<table class = "table table-responsive table-hover">
 <?php

$sql = "SELECT * FROM pdf_data_table ORDER BY id DESC";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) { ?>
   <!-- output data of each row -->

  <tr><th>Title</th> <th>Description</th>  <th>Department</th> <th>Author</th>  <th>Download</th> <th>Delete</th></tr>

  <?php
  while($row = mysqli_fetch_assoc($result)) {         


echo '<tr> <td>'. $row["name"]. '</td>  <td>'. $row["description"]. '</td> <td>'
.$row['department'].   '</td> <td>' .$row['author']. 
'</td><td> <a href = "./all_pdf_file/'. $row["filename"]. '" download><i class = "fa fa-download"></i> </a>  </td>
<td> 
<form action = "allProcess.php" method = "POST">
<input type ="hidden" name = "id"  value = "'.$row["id"].'"/>
<button type = "submit" name = "btnDeleteAbook" class = "border-0"><i class = "fa fa-trash text-danger"> </button></td> </tr>
</form>' ;


  }
} else {
  echo "0 results";
}
mysqli_close($con);

?> 
</table>

 </div>


</div>
<!-- fetch data ends here -->
</body>
</html>
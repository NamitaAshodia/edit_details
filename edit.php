 <form class="w3-container w3-animate-top" action="update.php" method="POST" enctype="multipart/form-data">
     
     <div class="w3-col l12 w3-center w3-padding">
<br>
  <div class="w3-col s3"> &nbsp; </div>

                    <div class="w3-col s12 l6 w3-padding w3-card-4">


<p><input  type="hidden" name="id" id="id" value="<?php echo $edrs['id']; ?>" >

<div class="form-group row">
           <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" class="form-control form-control-user" name="name2" value="<?php echo $edrs['name2']; ?>"  placeholder="First Name">
            </div>

<p> 

<div class="col-sm-6">
<img src="image1/<?php echo $edrs['image2'];?>" alt="image2 " height="75" width="75">

<br>

<input type="hidden" name="id" value="<?php echo $edrs["id"]?>">
        <input type="file" name="image2"/>
<br>
<!--<input type="submit" name="update" value="update"/> 
-->


<!--
<input class="form-control form-control-user" type="file"  id="image1" name="image1" placeholder="image1" value="<?php echo $edrs['image1']; ?>" maxlength="250"  >
</p>--></div>

  <div class="col-sm-6">
<textarea name="size2" id="editor1" rows="3" cols="4" value="<?php echo $edrs['size2']; ?>" >
  
    </textarea>

</p></div>

<p>   <div class="col-sm-6">
<!--<input class="form-control form-control-user" type="text"  id="detail" name="detail" placeholder="detail" value="<?php echo $edrs['detail']; ?>" maxlength="250"  >-->
<textarea name="detail" id="editor" rows="3" cols="4" value="<?php echo $edrs['detail']; ?>" >
<?php echo $edrs['detail']; ?>
  
    </textarea>

</p></div>

<p>   
<br>
<div class="col-sm-6">
  <p><center><button type="submit" class="form-control form-control-user" name="submit" value="submit" style="width:120px">Update &nbsp; ❯</button></p>
  </div>
  </center>
  </div>
  </div>
  <div class="w3-col s3"> &nbsp;</div>
</form>
  </div>
  </div>
  <div class="w3-col s3"> &nbsp;</div>
</form>
<?php

unset($id);
unset($_GET['id']);

}
?>


<?php 
include 'connection.php';
if(isset($_POST['submit']))
{
  $old_image = $_POST['old_image'];
  $name2=$_POST['name2'];
  $size2=$_POST['size2'];
  if(isset($_FILES['image2']['name']))
  {
    $size = $_FILES['image2']['size'];
    $temp= $_FILES['image2']['tmp_name'];
    $type= $_FILES['image2']['type'];
    $image2=$_FILES['image2']['name'];
    echo($image2);
    unlink("image1/$old_image");
    move_uploaded_file($temp,"image1/$image2");

  }
  else
  {
    $image2=$old_image;
  }
  $update=mysqli_query($conn,"update insertsubtool set name2='$name2',size2='$size2', image2='$image2'");
  echo("update insertsubtool set name2='$name2',size2='$size2', image2='$image2'");
  if($update)
  {
    echo("inserted");
  }
  else
  {
    echo("failed");
  }
}
?>

<?php include ('database.php');
//fetch the record to update
if(isset($_GET['edit'])){
  $id=  $_GET['edit'];
  $rec =$mysqli_query($connection,"SELECT * FROM info WHERE id=$id ");
  $record=  mysqli_fetch_array($rec);
  $name= $record['name'];
  $address=$record['address'];
  $id=$record['id'];
}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD APP</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php if(isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php 
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            
            ?>
        </div>>
        <?php endif;?>
      <table>
        <thead>  
            <th>Name</th>
            <th>Address</th>
            <th colspan="2">Action</th>
       </thead>
       <tbody>
           <?php while($row= mysqli_fetch_array($results)) {?>
               <tr>
                   <td><?php echo $row['name'] ;?></td>
            <td><?php echo $row['address'] ;?></td>
            <td><a href="index.php?edit =<?php echo $row['id']; ?>">Edit</a></td>
            <td><a href="#">Delete</a></td>
        </tr>
          <?php };?>
        
        </tbody>
        </table>
        <form action="database.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $name?>">
                </div>
                <div class="input-group">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php echo $address?>">
                </div>
                <div class="input-group">
                    <?php
                    if($edit_state==false):?>
                    <button type="submit" name="save" class="btn">Save</button>
                    <?php else:?>
                        <button type="submit" name="update" class="btn">Update</button>
                   <?php endif;?>
                   
                </div>
            </form>
    </body>
</html>






















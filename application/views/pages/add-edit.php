<?php function renderForm($id, $firstname, $lastname)
{
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
     <body>
<section id="blog-content" class="col-md-8"> 
    <h2>Add/Edit</h2> 

<form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <p><strong>ID:</strong> <?php echo $id; ?></p>
 <strong>Title: *</strong> <input type="text" name="title" value="<?php echo $title; ?>"/><br/>
 <strong>Description: *</strong> <input type="text" name="description" value="<?php echo $description; ?>"/><br/>
 <p>* Required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
    </section>
 </body>
 </html> 
 <?php
 } 
?>
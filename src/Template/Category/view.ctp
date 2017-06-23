<?php require(dirname(__FILE__)."/../config.php"); ?>
<div class="layout">
      <div class="layout-image">
      <br><br>
<div class="panel panel-primary">
  <div class="panel-heading">

  </div>
  <div class="panel-body">

<h1><?= h($category->title) ?></h1>
<p><?php //<?= h($category->content) ?></p>

<?php

  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqldish = "SELECT id, title, category, content FROM dishes WHERE category='$category->title'";
$resultsdish = $conn->query($sqldish);
//var_dump($sqlcat);
?>
    
<?php foreach ($resultsdish as $rowcat): ?>
    <p><?= $rowcat['title'] ?></p>

 <?php endforeach; ?>
</select>
</div>
</div>
</div>
</div>
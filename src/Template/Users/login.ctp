<div class="layout">
      <div class="layout-image">
          <!--<img src="img/layout.png" alt=""> -->
    <br><br>
    <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Login</h3>
  </div>
  <div class="panel-body">
   <?php echo $this->Form->create();
 	echo $this->Form->input('email');
 	echo $this->Form->input('password');
 	echo $this->Form->button('Login');
 	echo $this->Form->end() 
    ?>
  </div>
</div>
 </div>
    </div>

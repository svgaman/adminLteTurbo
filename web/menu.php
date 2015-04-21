<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

require __DIR__."/../vendor/autoload.php";

//use Admin\AdminLte;

$admin = new Admin\AdminLte2();
$admin->title("Menu");
//$admin->menu("Menu");

echo $admin->html();//

//echo new Admin\Contentheader('title','icon','small');

?>
<section class="content-header">
  <h1><i class='fa fa-list'></i> Menu <small>Configuration</small></h1>
</section>


<section class="content">
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12" >
      <?php
      // Menu config
      $box=new Admin\Box;
      $box->title("Menu configuration");
      $box->type("info");
      $box->icon("fa fa-warning");
      $box->id("box");
      $body=[];
      $body[]="The left menu is configured through src/Admin/config.json<br />";
      $body[]="Of course it could be updated or generated by javascript:<br />";
      $body[]="You can access it with $('ul.sidebar-menu')<br />";
      echo $box->html($body,"<button class='btn btn-default'>Ok</button>");
      
      // Menu search
      $box=new Admin\Box;
      $box->title("Menu search");
      $box->icon("fa fa-search");
      $box->id("box");
      $body=[];
      $body[]="See that left menu search ?<br />";
      //$body[]="Of course it could be updated or generated by javascript:<br />";
      $body[]="You can select it with $('input#q')<br />";
      echo $box->html($body,"<button id='btnsearch' class='btn btn-default'>$('input#q').select()</button>");

      ?>

    </div>   <!-- /.row -->

  <div class="col-md-6 col-sm-6 col-xs-12" >
  <?php
  $box=new Admin\Box;
  $box->title("Override <small>\$admin->config()->menu</small>");
  $box->icon("fa fa-bolt");
  $html=[];
  $html[]="<pre>".print_r($admin->config()->menu,true)."</pre>";
  
  echo $box->html($html,"<button class='btn btn-default'>Button</button>");
  ?>
  </div>

  </div>   <!-- /.row -->
</section>

<script>
$(function(){
  $('#btnsearch').click(function(){
    $('input#q').select();
  });
});
</script>
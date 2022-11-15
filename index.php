<?php

session_start();

spl_autoload_register(function($className) {
   $directories = array('classes/', 'controllers/');
   foreach($directories as $d) {
      if(file_exists($d.$className.'.php')) {
         require_once($d.$className.'.php');
      }
   }
});

?>
<!DOCTYPE html>
<html>
   <head>
      <title>Tool Shop</title>
      <base href="/">
      <link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   <body>
      <div id="wrap">
         <div id="title">
            <h1>Tool Shop</h1>
         </div>
         <div id="nav">
            <a href="/home">Home</a>
            <a href="/about">Order Info</a>
<?php

new Nav();

?>
         </div>
         <div id="main">
<?php

new Router();

?>
         </div>
      </div>
   </body>
</html>
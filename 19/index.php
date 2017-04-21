<?php
 $text =   'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci assumenda, 
            deleniti distinctio eius 0934669146 esse eum fugit incidunt libero natus possimus repellendus, 
            0687385545 similique suscipit unde ut vel, voluptates!Ex,sed!';


 preg_match_all('/([0-9]{10})/', $text, $matches );

 var_dump($matches);

?>


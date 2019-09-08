<?php




echo password_hash('secret', PASSWORD_BCRYPT,array('cost'=>10));
//strlen(password_hash());

// if you wanna to know all information 
//phpinfo();


?>
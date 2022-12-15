<?php
session_start();
function end_user_session(){
    session_destroy();
    unset($_SESSION);
    header("Location: ../index.php?mess=loggedout");
}
end_user_session();


?>
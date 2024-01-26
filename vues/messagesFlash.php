<?php
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!empty($_SESSION["message"])){
        $mesMessages = $_SESSION["message"];
        foreach($mesMessages as $key => $message){
            echo '<div class="container pt-5">
            <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">
                '.$message.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>';
        }
        $_SESSION["message"] = [];
    }
?>

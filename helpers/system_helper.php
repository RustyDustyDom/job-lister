<?php
function redirect($page = false, $message = null, $message_type = null)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    //Check For Message
    if ($message != null) {
        //SET message
        $_SESSION['message'] = $message;
    }

    if ($message_type != null) {
        //Set Message Type
        $_SESSION['message_type'] = $message_type;
    }

    header('Location:' . $location);
    exit;
}

function displayMessage(){
    if(!empty($_SESSION['message'])) {
        //Assign Message Var
        $message = $_SESSION['message'];

        if (!empty($_SESSION['message_type'])) {
            //Assign Type Var
            $message_type = $_SESSION['message_type'];
            //Create output
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">' . $message . '</div>';
            } else {
                echo '<div class="alert alert-success">' . $message . '</div>';
            }
        } 
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
    } else {
        echo '';
    } 
}

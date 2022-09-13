<?php
    if(isset($_POST['pwd'])) {
        $pwd = $_POST['pwd'];
        $data = [
            'error' => null,
            'status' => null
        ];
        
        if(sizeof($pwd) < 12) {
            $data['error'] = "password is short";
            $data['status'] = "poor";
        }elseif(sizeof($pwd) < 14) {
            $data['error'] = "password is ok";
            $data['status'] = "not weak";
            
            
        }
        
        
    }
?>
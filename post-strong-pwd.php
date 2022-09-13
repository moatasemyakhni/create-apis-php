<?php
    if(isset($_POST['pwd'])) {
        function pwdStatus() {
            $pwd = $_POST['pwd'];
            $is_long_length = true;
            $is_lower_upper_case = true;
            $data = [
                'errors' => [
                    'length' => null,
                    'charsTransform' => null,
                ],
                'status' => null
            ];
            
            if(strlen($pwd) < 12) {
                $data['error']['length'] = "length is short";
                $is_long_length = false;
            }else {
                if(strlen($pwd) < 14) {
                    $data['error']['length'] = "length is ok";
                }else {//pwd chars is good
                    $data['error']['length'] = "length is enough";
                }
                
                $is_long_length = true;
            }
    
            $chars = str_split($pwd);
            $lowerCharsCounter = 0;
            $upperCharsCounter = 0;
            foreach($chars as $char) {
                if(ctype_lower($char)) {
                    $lowerCharsCounter ++;
                }elseif(ctype_upper($char)) {
                    $upperCharsCounter ++;
                }
                if($lowerCharsCounter > 0 && $upperCharsCounter > 0) {
                    $data['error']['charsTransform'] = "lower and upper cases exists";
                    $is_lower_upper_case = true;
                    break;
                }
            }
            if($lowerCharsCounter == 0 || $upperCharsCounter == 0) {
                $data['error']['charsTransform'] = "string should be lower and upper cases";
                $is_lower_upper_case = false;
            }
    
            if($is_long_length && $is_lower_upper_case) {
                $data['status'] = "strong password";
            }else {
                $data['status'] = "weak password";
            }
            return json_encode($data);
            
        }
        echo pwdStatus();
    } 
?>
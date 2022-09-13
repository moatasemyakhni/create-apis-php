<?php
    if(isset($_POST['pwd'])) {
        function pwdStatus() {
            $pwd = $_POST['pwd'];
            $is_long_length = true;
            $is_lower_upper_case = true;
            
            
            if(strlen($pwd) < 12) {
                $lengthStatus['error']['length'] = "length is short";
                $is_long_length = false;
            }else {
                if(strlen($pwd) < 14) {
                    $lengthStatus = "length is ok";
                }else {//pwd chars is good
                    $lengthStatus = "length is enough";
                }
                
                $is_long_length = true;
            }
    
            $chars = str_split($pwd);
            $lowerCharsCounter = 0;
            $upperCharsCounter = 0;
            $numberCounter = 0;
            foreach($chars as $char) {
                if(ctype_lower($char)) {
                    $lowerCharsCounter ++;
                }elseif(ctype_upper($char)) {
                    $upperCharsCounter ++;
                }elseif(is_numeric($char)) {
                    $numberCounter++;
                }
                if($lowerCharsCounter > 0 && $upperCharsCounter > 0) {
                    $charStatus = "lower and upper cases exists";
                    $is_lower_upper_case = true;
                    break;
                }
                if($numberCounter == 0) {
                    $containNumber = false;
                }else {
                    $containNumber = true;
                }
            }
            if($lowerCharsCounter == 0 || $upperCharsCounter == 0) {
                $charStatus = "string should be lower and upper cases";
                $is_lower_upper_case = false;
            }

            // check spelling (in other word check if it is in the dictionary)
            $pspell = pspell_new("en");
            if (pspell_check($pspell, $pwd)) {
                $is_dictionary = true;
            } else {
                $is_dictionary = false;
            }
    
            if($is_long_length && $is_lower_upper_case && !$is_dictionary && !$containNumber) {
                $pwdStatus = "strong password";
            }else {
                $pwdStatus = "weak password";
            }

            

            $data = [
                'errors' => [
                    'length' => $lengthStatus,
                    'charStatus' => $charStatus,
                    'in_dictionary' => $is_dictionary,
                    'contain_number' => $containNumber,
                ],
                'status' => $pwdStatus
            ];
            return json_encode($data);
            
        }
        echo pwdStatus();
    } 
?>
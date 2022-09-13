<?php
if(isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];

function equation() {
 $equationSol = pow($a, 3) + $b*$c - $a/$b;
 $data = ['sol' => $equationSol];
 $postArr = ['http' => [
            'method' => 'POST',
            'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-Length: " . strlen($data) . "\r\n",
            'content' => $data
            )]
];
return json_encode($postArr);
}
echo equation();
}
?>

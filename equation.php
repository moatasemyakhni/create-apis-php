<?php
if(isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])) {

    function equation() {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $equationSol = pow($a, 3) + $b*$c - $a/$b;
        $data = ['sol' => $equationSol];

        return json_encode($data);
    }
    echo equation();
}
?>

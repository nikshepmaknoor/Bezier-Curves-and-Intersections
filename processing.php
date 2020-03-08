<?php
session_start();

if(isset($_POST['Float1']) && isset($_POST['Float2']) && isset($_POST['Float3']) && isset($_POST['Float4'])) {
    $data = $_POST['Float1'] . "\n" . $_POST['Float2'] . "\n" . $_POST['Float3'] . "\n" . $_POST['Float4'];
    $ret = file_put_contents('mydata.txt', $data);
    if($ret === false) {
        die('There was an error writing this file');
    }
    else {
        echo "$ret bytes written to file";
        $command = escapeshellcmd('python temp.py');
		$output = shell_exec($command);
        $_SESSION['written'] = '1';
        $_SESSION['output'] = $output;
        $ret = file_put_contents('test.txt', $output);
        header('Location: pythonOutput.php');
    }
}
else {
   die('no post data to process');
}

?>
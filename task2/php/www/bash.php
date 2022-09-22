<!--bash.php for printing some commands output-->
<?php

function printCommand($command) {
    echo "<pre>";
    echo shell_exec($command);
    echo "</pre>";
}

$commands = array("ls", "pwd", "whoami", "id");
foreach ($commands as $command) {
    printCommand($command);
}

?>
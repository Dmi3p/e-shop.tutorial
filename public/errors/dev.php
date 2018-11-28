<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Error</title>
</head>
<body>
    <h1>An error has occured</h1>
    <p><b>Error code: </b><?= $errno ?></p>
    <p><b>Error message </b><?= $errstr ?></p>
    <p><b>Error file: </b><?= $errfile ?></p>
    <p><b>Error line: </b><?= $errline ?></p>
</body>
</html>
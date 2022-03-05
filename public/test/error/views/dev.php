<!DOCTYPE html>

<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
<title>Error</title>
</head>
<body>
    <h1>Произошла ошибка</h1>
    <p>Код ошибки:<b></b><?= $errno ?></p>
    <p>Текст ошибки:<b></b><?= $errstr ?></p>
    <p>Файл,в котором произошла ошибка:<b></b><?= $errfile ?></p>
    <p>Строка,в которой произошла ошибка:<b></b><?= $errline ?></p>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2> Welcome! This is homepage. </h2>
    <div>
        <?php if (! empty($invoice)): ?>
            Invoice ID: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES) ?> <br />
            Invoice Amount: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES) ?> <br />
            User: <?= htmlspecialchars($invoice['full_name'], ENT_QUOTES) ?> <br />
        <?php endif ?>
    </div>
</body>
</html>

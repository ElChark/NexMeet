<?php require_once './views/partials/head.php' ?>

<body>
    <?php require_once './views/partials/nav-bar.php'; ?>
    <style>
        html,
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
        }

        #not-found {
            height: 100vh;
            width: 100vw;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 50px;
        }
    </style>
    <div id="not-found">
        <h1>403</h1>
        <h3>No autorizado</h3>
        <h4>favor de comunicarse con un administrador</h4>
    </div>
</body>

</html>
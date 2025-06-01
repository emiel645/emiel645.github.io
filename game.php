<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Reactietijd Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        #start {
            padding: 20px 40px;
            font-size: 24px;
        }

        #result {
            margin-top: 20px;
            font-size: 24px;
        }
    </style>
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <?php session_start(); ?>

    <div style="position: absolute; right: 20px;">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="acount.php">
                <button style="padding: 10px 20px; font-size: 16px;">Account</button>
            </a>
        <?php else: ?>
            <a href="login.php">
                <button style="padding: 10px 20px; font-size: 16px;">Login</button>
            </a>
        <?php endif; ?>
    </div>

    <h1>Test je reactietijd</h1>
    <button id="start">Start</button>
    <div id="result"></div>

    <script>
        const button = document.getElementById("start");
        const result = document.getElementById("result");

        let waitingForClick = false;
        let startTime;

        function startGame() {
            result.innerText = "Wacht op groen...";
            button.disabled = true;
            button.innerText = "Wachten...";

            setTimeout(() => {
                result.innerText = "KLIK NU!";
                button.innerText = "KLIK!";
                startTime = new Date().getTime();
                waitingForClick = true;
                button.disabled = false;
            }, Math.random() * 3000 + 2000);
        }

        button.addEventListener("click", () => {
            if (waitingForClick) {
                const reactionTime = new Date().getTime() - startTime;
                result.innerText = `Je reactietijd was ${reactionTime} ms`;
                button.innerText = "Opnieuw";
                waitingForClick = false;

                // Stuur data naar PHP (als ingelogd)
                fetch("save_reaction.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: "reactionTime=" + reactionTime
                    })
                    .then(res => res.text())
                    .then(data => console.log(data));
            } else {
                startGame();
            }
        });
    </script>

    <?php include 'includes/footer.php'; ?>

</body>

</html>
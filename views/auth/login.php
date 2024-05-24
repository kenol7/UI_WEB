<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM WEBSITE UNEJ</title>
    <link rel="stylesheet" href="/views/asset/css/style.css">
    <link rel="stylesheet" href="/views/asset/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'views/components/navigation.php' ?>
    <main>
        <form action="login" method="POST">
            <h1>LOGIN FOR ADMIN</h1>
            <div>
                <input type="text" name="username" id="username" class="inputan" placeholder="Username" required><br>
                <input id="password" type="password" name="password" class="inputan" placeholder="Password" required><br>
                <input type="checkbox" id="showPasswordCheckbox">
                <label for="showPasswordCheckbox">Tampilkan Kata Sandi</label>
            </div>
            <button class="button" type="submit">LOGIN</button>
        </form>
    </main>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPasswordCheckbox');

        showPasswordCheckbox.addEventListener('change', function() {
            const isChecked = this.checked;
            if (isChecked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
</body>

</html>
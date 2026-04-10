<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form id="loginForm">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // prevent normal form submit

            fetch('/api/login', {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: new FormData(document.getElementById('loginForm'))
            })
            .then(res => res.json())
            .then(data => {
                if (data.redirect) {
                    window.location.href = data.redirect;
                } else {
                    alert('Login failed');
                }
            });
        });
    </script>
</body>
</html>

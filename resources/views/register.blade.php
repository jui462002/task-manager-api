<form id="registerForm">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Register</button>
</form>

<script>
document.getElementById('registerForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const response = await fetch('/api/register', {
        method: 'POST',
        headers: { 'Accept': 'application/json' },
        body: formData
    });
    const data = await response.json();
    console.log(data);
    alert(JSON.stringify(data));
});
</script>

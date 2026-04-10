<form id="projectForm">
    @csrf
    <input type="text" name="name" placeholder="Project Name" required>
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit">Create Project</button>
</form>

<script>
document.getElementById('projectForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);

    const response = await fetch('/api/projects', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer 2|MClz4N2mHNYEDeRmqGkvnJXEH1T63gdkHR7tPLpSdf038504' // use your token here
        },
        body: formData
    });

    const data = await response.json();
    console.log(data);
    alert(JSON.stringify(data));
});
</script>

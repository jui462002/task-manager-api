<form id="taskForm">
    @csrf
    <input type="text" name="title" placeholder="Task Title" required>
    
    <select name="status" required>
        <option value="TODO">TODO</option>
        <option value="IN_PROGRESS">IN_PROGRESS</option>
        <option value="DONE">DONE</option>
        <option value="OVERDUE">OVERDUE</option>
    </select>
    
    <select name="priority" required>
        <option value="LOW">LOW</option>
        <option value="MEDIUM">MEDIUM</option>
        <option value="HIGH">HIGH</option>
    </select>
    
    <input type="date" name="due_date" required>
    <input type="number" name="project_id" placeholder="Project ID" required>
    <input type="number" name="user_id" placeholder="User ID" required>
    
    <button type="submit">Create Task</button>
</form>

<script>
document.getElementById('taskForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);

    const response = await fetch('/api/tasks', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Authorization': 'Bearer 2|MClz4N2mHNYEDeRmqGkvnJXEH1T63gdkHR7tPLpSdf038504' // replace with your token
        },
        body: formData
    });

    const data = await response.json();
    console.log(data);
    alert(JSON.stringify(data));
});
</script>

// Hole Benutzer aus der API
async function fetchUsers() {
    const response = await fetch('./userapi.php');
    const users = await response.json();
    console.log(users);

    const userList = document.getElementById('userList');
    userList.innerHTML = users.map(user => `
        <li>${user.name} - ${user.department} - ${user.class}</li>
    `).join('');
}

// Füge neuen Benutzer hinzu
async function addUser(name, password, department, userClass) {
    const response = await fetch('./userapi.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, password, department, class: userClass })
    });
    const result = await response.json();
    console.log(result);
}

// Beispiel: Hole Benutzer beim Laden der Seite
window.onload = fetchUsers;

// Beispiel: Neuer Benutzer hinzufügen
document.getElementById('addUserButton').onclick = () => {
    const name = document.getElementById('name').value;
    const password = document.getElementById('password').value;
    const department = document.getElementById('department').value;
    const userClass = document.getElementById('class').value;
    addUser(name, password, department, userClass).then(fetchUsers);
};

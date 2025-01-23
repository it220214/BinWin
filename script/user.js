fetch(`../api/userapi.php`)
        .then((response) => response.json())
        .then((data) =>{
            console.log(data);
            if(data.code == 200) {
                //html
            } else {
                //error message
            }
           
        })
        .catch((error)=>{
            console.log(error);
        })

function addUser() {
    const name = document.getElementById("name").value;
    const password = document.getElementById("password").value;
    const department = document.getElementById("department").value;
    const classValue = document.getElementById("class").value;

    if (name && password && department && classValue) {
        fetch('../api/userapi.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name, password, department, class: classValue }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.code === 200) {
                alert("User registered successfully!");
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    } else {
        alert("Please fill in all fields!");
    }
}

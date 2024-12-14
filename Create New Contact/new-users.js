document.addEventListener("DOMContentLoaded", function () {
    const save = document.getElementById("save");

    // Save button listener
    save.addEventListener("click", function () {
        // Collect data from the form
        const data = {
            title: document.getElementById("select").value.trim(),
            fname: document.getElementById("fname").value.trim(),
            lname: document.getElementById("lname").value.trim(),
            email: document.getElementById("email").value.trim(),
            company: document.getElementById("company").value.trim(),
            assignedto: document.getElementById("assigned-select").value.trim(),
            phone: document.getElementById("phone").value.trim(),
            type: document.getElementById("type-select").value.trim(),
        };

        // Debugging: Check data in console
        console.log("Data to be sent:", data);
        alert(JSON.stringify(data));
        // Send data using fetch
        fetch("http://localhost/Create%20New%20Contact/create_user.php", {
            method: "POST", // Explicitly specify the POST method
            headers: {
                "Content-Type": "application/json", // Inform server we're sending JSON
            },
            body: JSON.stringify(data), // Convert the JavaScript object to JSON
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json(); // Parse the JSON response
            })
            .then((result) => {
                // Handle success
                console.log("Server response:", result);
                alert("Data sent successfully!");
            })
            .catch((error) => {
                // Handle errors
                console.error("Error:", error);
                alert("An error occurred while sending the request.");
            });
    });
});

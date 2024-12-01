document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get("user");

    if(userId) {
        fetch(`getUserData.php?user=${encodeURIComponent(userId)}`)
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Populate the fields with the data received
                    document.querySelector(".profile-info h1").textContent = data.name;
                    document.querySelector(".email-value").textContent = data.email;
                    document.querySelector(".telephone-value").textContent = data.telephone;
                    document.querySelector(".company-value").textContent = data.company;
                    document.querySelector(".assignedto-value").textContent = data.assigned_to;
                    document.querySelector(".created-value").textContent = `Created on: ${data.created_at} by ${data.created_by}`;
                    document.querySelector(".updated-value").textContent = `Last Updated: ${data.updated_at}`;
                } else {
                    alert("User data could not be fetched");
                }
            })
            .catch(err => console.error("Error fetching user data:", err));
    } else {
        alert("No user specified");
    }
});
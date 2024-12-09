document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get("user");
    console.log("User ID:", userId);

    // Helper function to format date in "Month Day, Year" format
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', options);
    }

    if (userId) {
        fetch(`getUserData.php?user=${encodeURIComponent(userId)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log("Fetched user data:", data);

                if (data.success) {
                    //console.log("Assigned To:", data.assigned_to); // Should be a name (string)
                    // Populate the fields with formatted date strings
                    const user = data; // This should match your PHP response format
                    document.querySelector(".profile-info h1").textContent = user.name || "N/A";
                    document.querySelector(".email-value").textContent = user.email || "N/A";
                    document.querySelector(".telephone-value").textContent = user.telephone || "N/A";
                    document.querySelector(".company-value").textContent = user.company || "N/A";
                    document.querySelector(".assignedto-value").textContent = user.assigned_to || "N/A";

                    // Format and display dates
                    const createdDate = formatDate(data.created_at);
                    const updatedDate = formatDate(data.updated_at);

                    document.querySelector(".created-value").textContent = `Created on: ${createdDate} by ${data.created_by || "Unknown"}`;
                    document.querySelector(".updated-value").textContent = `Updated on: ${updatedDate}`;
                } else {
                    alert("User data could not be fetched");
                }
            })
            .catch(err => {
                console.error("Error fetching user data:", err);
                alert("An error occurred while fetching user data. Please try again later.");
            });
    } else {
        alert("No user specified");
    }
});

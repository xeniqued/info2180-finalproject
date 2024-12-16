document.addEventListener("DOMContentLoaded", function () {
    const div = document.getElementsByClassName("data-table-section")[0];

    function fetchData() {
        fetch('dashboard.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                div.innerHTML = data; // Load the fetched content
                initializeFilters();  // Reinitialize filters after loading
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    function initializeFilters() {
        const filterOptions = document.querySelectorAll(".filter-option");
        const tableRows = document.querySelectorAll(".table-row");
        // const filterOption2 = document.querySelectorAll(".filter-option2");

        function resetRows() {
            tableRows.forEach(row => {
                row.style.display = ""; // Show all rows by default
            });
        }

        filterOptions.forEach(option => {
            option.addEventListener("click", function (event) {
                event.preventDefault();

                // Remove active class from all filters
                filterOptions.forEach(option => option.classList.remove("active"));
                this.classList.add("active");

                // Get the selected filter
                const filter = this.getAttribute("data-filter");

                // Reset rows visibility before applying new filter
                resetRows();

                // Show/Hide rows based on the filter
                tableRows.forEach(row => {
                    const rowType = row.getAttribute("data-type");
                    if (filter !== "all" && rowType !== filter) {
                        row.style.display = "none"; // Hide rows not matching the filter
                    }
                });
            });
        });
    }

    // Fetch data initially and set up filters
    fetchData();
});

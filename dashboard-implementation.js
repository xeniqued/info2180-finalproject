document.addEventListener("DOMContentLoaded", function () {
    const filterOptions = document.querySelectorAll(".filter-option");
    const tableRows = document.querySelectorAll(".table-row");

    // Function to reset all rows to visible
    function resetRows() {
        tableRows.forEach(row => {
            row.style.display = ""; // Reset display to default (visible)
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

                // If it's not the 'all' filter, hide rows that don't match the filter
                if (filter !== "all" && rowType !== filter) {
                    row.style.display = "none"; // Hide row
                }
            });
        });
    });
    
});
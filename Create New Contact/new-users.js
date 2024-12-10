document.addEventListener("DOMContentLoaded", function () {
    // save button
    var savebutton = domcument.getElementsByClassName("save");
    // Save button listner
    
    savebutton.addEventListener("click", function() {
        // Get's data form the HTML 
        var title = document.getElementById('title').value.trim();
        var lname = document.getElementById('lname').value.trim();
        var fname = document.getElementsByClassName('fname').value.trim();
        var title = document.getElementById('title').value.trim();
        var email = document.getElementById('email').value.trim();
        var company = document.getElementById('company').value.trim();
        var assignedto = document.getElementById('assigned-select').value.trim();
        var phone = document.getElementById('phone').value.trim();
        var type = document.getElementById('type-select').value.trim();

        //Ajax
        const httpRequest = new XMLHttpRequest();
        let url = "http://create_user.php";
        // Data 
        var data= {
            'title': title,
            'fname': fname,
            'lname': lname,
            'email': email,
            'company': company,
            'assignedto': assignedto,
            'phone': phone,
            'type': type,
        }
        // Convert to jason
        let jsonString = JSON.stringify(data);

        // responce
        httpRequest.onreadystatechange = doSomething;
        httpRequest.open('POST', url);

        // Set the request header to indicate JSON content
        httpRequest.setRequestHeader('Content-Type', 'application/json');

        // Send the data with the request
        httpRequest.send(jsonString);

        // Responce from the php
        function doSomething() {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    let response = httpRequest.responseText;
                    alert(response);
                } else {
                    alert('There was a problem with the request.');
                }
            }
        }


     });
});

document.getElementById('adminForm').addEventListener('submit', function(event) {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    // Perform additional validation if needed

    if (!isValid(username, password)) {
        event.preventDefault();
        alert('Invalid input. Please check your username and password.');
    }
});

function isValid(username, password) {
    // Implement your validation logic
    return true; // Return true if the input is valid, false otherwise
}

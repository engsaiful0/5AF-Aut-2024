<label for="user">Select User:</label>
<select id="user" onchange="fetchUserDetails(this.value)">
    <option value="">Select</option>
    <option value="1">User 1</option>
    <option value="2">User 2</option>
    <option value="3">User 3</option>
</select>

<div id="userDetails">
    <!-- User details will be displayed here -->
</div>
<script>
function fetchUserDetails(userId) {
    if (!userId) {
        document.getElementById('userDetails').innerHTML = '';
        return;
    }

    // Create an AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `getUserDetails.php?userId=${userId}`, true);

    // Handle the server response
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('userDetails').innerHTML = xhr.responseText;
        } else {
            console.error('Error fetching user details.');
        }
    };

    xhr.send();
}
</script>
<?php
// getUserDetails.php
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Mock user data
    $users = [
        1 => 'User 1 Details: Name: John, Email: john@example.com',
        2 => 'User 2 Details: Name: Jane, Email: jane@example.com',
        3 => 'User 3 Details: Name: Bob, Email: bob@example.com',
    ];

    echo $users[$userId] ?? 'User not found.';
}
?>

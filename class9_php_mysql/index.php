<form action="data_save.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="studentName" >
            </td>
        </tr>
        <tr>
            <td>Roll</td>
            <td>
                <input type="text" name="roll" >
            </td>
        </tr>
        <tr>
            <td>Deparment</td>
            <td>
                <select onchange="club_load(this.value)" name="department">
                    <option>CSE</option>
                    <option>EEE</option>
                    <option>CE</option>
                    <option>ME</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Club</td>
            <td>
                <select name="club_id" id="club">
                    <option value="">Select Club</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>
                <input type="text" name="mobile" >
            </td>
        </tr>
        <tr>
            <td>Image</td>
            <td>
                <input type="file" name="image" >
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit_button" value="Submit">
            </td>
        </tr>
    </table>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function club_load(department) {
        if (department) {
            $.ajax({
                url: 'load_clubs.php',
                type: 'POST',
                data: {
                    department: department
                },
                dataType: 'json',
                success: function(response) {
                    let clubDropdown = $('#club');
                    clubDropdown.empty(); // Clear previous options
                    clubDropdown.append('<option value="">Select Club</option>'); // Default option
                    $.each(response, function(index, club) {
                        clubDropdown.append('<option value="' + club.id + '">' + club.club_name + '</option>');
                    });
                },
                error: function() {
                    alert('Error loading clubs. Please try again.');
                }
            });
        } else {
            $('#club').empty().append('<option value="">Select Club</option>');
        }
    }
</script>
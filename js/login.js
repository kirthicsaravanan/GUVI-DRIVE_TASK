$(document).ready(function () {
    $('#win').click(function (e) {
        e.preventDefault();
        var lname = $('#form3Example1q').val();
        var lpassword = $('#form4Example1q').val();
        alert(lname);
        if (lname != '' && lpassword != '') {
            $.ajax({
                url: "http://localhost/guvi/php/login.php",
                method: "POST",
                data: { lname: lname, lpassword: lpassword },
                success: function (data) {
                    if (data == 'No') {
                        alert("Invalid credentials");
                        window.location.href = "http://localhost/guvi/login.html";
                    }
                    else {
                        alert("Successfully logged in");
                        window.location.href = "http://localhost/guvi/profile.html";
                    }
                }
            })
        } else {
            alert("Both the feilds are required");
        }

    })
})
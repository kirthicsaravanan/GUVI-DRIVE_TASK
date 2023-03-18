$(document).ready(function () {
    $('#sign-up').click(function (e) {
        e.preventDefault();
        var rname = $('#rname').val();
        var rmail = $('#rmail').val();
        var r1password = $('#r1password').val();

        var rdate = $('#rdate').val();
        var rbio = $('#rbio').val();
        var rinterests = $('#rinterests').val();
        var runame = $('#runame').val();
        alert(rname);
        if (rname != '' && rmail != '' && r1password != '' && rdate != '' && rbio != '' && rinterests != '' && runame != '') {
            alert(r1password);
            $.ajax({
                url: "http://localhost/guvi/php/register.php",
                method: "POST",
                data: { rname: rname, rmail: rmail, r1password: r1password, rdate: rdate, rbio: rbio, rinterests: rinterests, runame: runame },
                success: function (data) {
                    if (data == 'error') {
                        window.location.href = "http://localhost/guvi/login.html";
                    }
                }
            })
        } else {
            alert("All the feilds are required");
        }

    })
})

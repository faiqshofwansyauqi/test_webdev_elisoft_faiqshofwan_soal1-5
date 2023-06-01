<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        /* Margin top for container */
        .container {
            margin-top: 50px;
        }
    
        /* Center the card */
        .card {
            border: none;
            margin: 15% auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    
        /* Styling for card label and separator */
        .card-body label {
            font-weight: bold;
        }
    
        .card-body hr {
            margin-top: 10px;
            margin-bottom: 10px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
    
        /* Center the "Belum punya akun" text */
        .text-center {
            text-align: center;
        }
    </style>
    
    <title>Login Akun</title>
</head>
<body>

<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-5 offset-md-3 ">
            <div class="card">
                <div class="card-body">
                    <label>LOGIN</label>
                    <hr>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
                    </div>

                    <button class="btn btn-login btn-success">LOGIN</button>

                </div>
            </div>

            <div class="text-center" style="margin-top: 15px">
                Belum punya akun? <a href="/register"> Daftar</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        $(".btn-login").click( function() {
            var email = $("#email").val();
            var password = $("#password").val();
            var token = $("meta[name='csrf-token']").attr("content");
            if(email.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Alamat Email Wajib Diisi !'
                });
            } else if(password.length == "") {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops...',
                    text: 'Password Wajib Diisi !'
                });
            } else {
                $.ajax({
                    url: "{{ route('login.check_login') }}",
                    type: "POST",
                    dataType: "JSON",
                    cache: false,
                    data: {
                        "email": email,
                        "password": password,
                        "_token": token
                    },
                    success:function(response){
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                title: 'Login Berhasil!',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false
                            })
                                .then (function() {
                                    window.location.href = "{{ route('dashboard.index') }}";
                                });
                        } else {
                            console.log(response.success);
                            Swal.fire({
                                type: 'error',
                                title: 'Login Gagal!',
                                text: 'silahkan coba lagi!'
                            });
                        }
                        console.log(response);
                    },
                    error:function(response){
                        Swal.fire({
                            type: 'error',
                            title: 'Login Gagal !',
                            text: 'silahkah coba lagi'
                        });
                        console.log(response);
                    }
                });
            }
        });
    });
</script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        /* Margin top for container */
        .container {
            margin-top: 50px;
        }
    
        /* Active list item */
        .list-group-item.active {
            background-color: #218c78;
            border-color: #007bff;
        }
    
        /* Styling for logout link */
        .list-group-item#logout {
            color: #212529;
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
    </style>
    
    <title>Dashboard</title>
</head>
<body>

<div class="container" style="margin-top: 50px">
    <div class="row">

        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item active">MAIN MENU</li>            
                <li class="list-group-item">Profile</li>
                <a href="{{ route('dashboard.index') }}" class="list-group-item" style="color: #212529;">Dashboard</a>
                <a href="{{ route('avatargenerator') }}" class="list-group-item" style="color: #212529;">Avatar Generator</a>
                <a href="{{ route('posts.index') }}" class="list-group-item" style="color: #212529;">Table</a>
                <a href="#" id="logout" class="list-group-item" style="color: #212529;">Logout</a>
            </ul>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <label>DASHBOARD</label>
                    <hr>
                    Selamat Datang {{ Auth::user()->name }}
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

     

<script>
    $(document).ready(function() {
    $("#logout").on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            text: 'Apakah Anda yakin ingin logout?',
            showCancelButton: true,
            confirmButtonText: 'Logout',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                type: 'success',
                title: 'Berhasil Logout',
                showConfirmButton: false,
                showCancelButton: false
                });
                setTimeout(function() {
                    window.location.href = "{{ route('logout') }}";
                }, 2000);
            }
        });
    });
});
</script>
</body>
</html>

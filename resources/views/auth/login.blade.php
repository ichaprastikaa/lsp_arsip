<!DOCTYPE html>
<html lang="en">
<head>
@vite('resources/js/app.js')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - SiArsip</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style>
        .sufee-login {
            display: flex;
            justify-content: center; /* Untuk penempatan horizontal di tengah */
            align-items: center; /* Untuk penempatan vertikal di tengah */
            height: 100vh; /* Menggunakan tinggi layar penuh */
        }
        .container {
            max-width: 400px; 
        }
    </style>
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap" >
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="">
                        <img class="align-content" src="images/logo-2.png" alt="">
                    </a>
                    @include('sweetalert::alert')
                </div>
                <div class="login-form">
                    <form action="{{ route('masuk') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan Username" style="border-radius:5px;">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" style="border-radius:5px;">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" style="border-radius:10px;">Log in</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>

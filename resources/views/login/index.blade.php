
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login E-Schedule</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <div class="text-center">
                                    <h4>Login Form</h4>
                                    <img src="images/logo/logo.png" width="200px" height="200px">
                                </div>
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(session()->has('loginError'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('loginError') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <form action="/login" method="post" class="mt-4 mb-4 login-input">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autofocus required>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button class="btn login-form__btn submit w-100 mt-2">Sign In</button>
                                </form>
                                {{-- <p class="mt-5 login-form__footer">Dont have account? <a href="/register" class="text-primary">Sign Up</a> now</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>






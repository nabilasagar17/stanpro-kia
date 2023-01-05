<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Stanpro Learning Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}">

    <!-- App css -->
    <link href="{{asset('hyp/dist/modern/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('hyp/dist/modern/assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css"
        id="light-style" />
    <link href="{{asset('hyp/dist/modern/assets/css/app-modern-dark.min.css')}}" rel="stylesheet" type="text/css"
        id="dark-style" />

</head>

<body>

    <section class="h-80 gradient-form">
        <div class="container py-5 h-80">
            <div class="row d-flex justify-content-center align-items-center h-80">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{asset('img/logo.png')}}" style="width: 70px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">STANPRO LEARNING CENTER</h4>
                                    </div>

                                    <form method="POST" action="{{ route('login') }}" novalidate class=" mt-4 pt-2">
                                        @csrf
                                        <p>Login Untuk Akses Aplikasi</p>

                                        <div class="form-outline mb-4">
                                            <input id="form2Example11" class="form-control"
                                                placeholder="Phone number or email address" name="email" />
                                            <label class="form-label" for="form2Example11">Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example22" class="form-control"
                                                name="password" />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg  mb-3" type="submit">Log
                                                in</button>

                                        </div>



                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end container -->

    <!-- end page -->

    <!-- bundle -->
    <script src="{{asset('hyp/dist/modern/assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('hyp/dist/modern/assets/js/app.min.js')}}"></script>

</body>

</html>
<style>
.gradient-custom-2 {
    /* fallback for old browsers */
    background: #fccb90;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
    .gradient-form {
        height: 100vh !important;
    }
}

@media (min-width: 769px) {
    .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
    }
}
</style>
<div class="row">
    <div class="col-lg-4 offset-lg-2 col-md-4 offset-md-2 col-sm-12 mt-5">
        <div class="card card-chart">
            <div class="card-header">
                <i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;<strong class="login-title">Login</strong>
            </div>
            <div class="card-body justify-content-center">
                <form id="login-form" method="post" role="form">
                    <div class="row form-group justify-content-center">
                        <input type="text" name="username" id="username" tabindex="2" class="form-control"
                            placeholder="Email" value="" autocomplete="off">
                    </div>
                    <div class="row form-group justify-content-center">
                        <input type="password" name="password" id="password1" tabindex="2" class="form-control"
                            placeholder="Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="button" name="login-submit" id="login-submit" tabindex="2"
                                    class="btn btn-register text-muted font-weight-bold" value="Log In">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
        <div class="card card-chart">
            <div class="card-header">
                <i class="fas fa-user-plus"></i>&nbsp;&nbsp;<strong class="login-title">Create New Account</strong>
            </div>
            <div class="card-body justify-content-center">
                <form id="register-form" method="post" role="form">
                    <div class="row form-group justify-content-center">
                        <input type="text" name="first_name" id="first_name" tabindex="1" class="form-control"
                            placeholder="First name" value="" autocomplete="off">
                    </div>
                    <div class="row form-group justify-content-center">
                        <input type="text" name="last_name" id="last_name" tabindex="1" class="form-control"
                            placeholder="Last name" value="" autocomplete="off">
                    </div>
                    <div class="row form-group justify-content-center">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control"
                            placeholder="Email Address" value="" autocomplete="off">
                    </div>
                    <div class="row form-group justify-content-center">
                        <input type="password" name="password" id="password2" tabindex="1" class="form-control"
                            placeholder="Password" autocomplete="off">
                    </div>
                    <div class="row form-group justify-content-center">
                        <input type="password" name="confirm-password" id="confirm-password" tabindex="1"
                            class="form-control" placeholder="Confirm Password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <input type="button" name="register-submit" id="register-submit" tabindex="1"
                                class="btn btn-register text-muted font-weight-bold" value="Register Now">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
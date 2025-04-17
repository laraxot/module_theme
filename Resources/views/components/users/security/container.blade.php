<!--extends _pug-includes/layout.pug-->
<section class="py-5">
    <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb ps-0  justify-content-start">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="user-account.html">Account</a></li>
            <li class="breadcrumb-item active">Login &amp; security </li>
        </ol>
        <h1 class="hero-heading mb-0">Login &amp; security</h1>
        <p class="text-muted mb-5">Manage your Login & security and settings here.</p>
        <div class="row">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="text-block">
                    <h3 class="mb-4">Login</h3>
                    <div class="row">
                        <div class="col-sm-8">
                            <h6>Password</h6>
                            <p class="text-sm text-muted">Last updated 3 years ago</p>
                        </div>
                        <div class="col text-end">
                            <button class="btn btn-link ps-0 text-primary collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#updatePassword" aria-expanded="false"
                                aria-controls="updatePassword">Update</button>
                        </div>
                    </div>
                    <div class="collapse" id="updatePassword">
                        <div class="row mt-4">
                            <div class="mb-4 col-12">
                                <label class="form-label" for="password-current">Current Password</label>
                                <input class="form-control" type="password" name="password-current"
                                    id="password-current" />
                            </div>
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="password-new">New Password</label>
                                <input class="form-control" type="password" name="password-new" id="password-new" />
                            </div>
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="password-confirm">Confirm Password</label>
                                <input class="form-control" type="password" name="password-confirm"
                                    id="password-confirm" />
                            </div>
                        </div>
                        <button class="btn btn-outline-primary">Update Password</button>
                    </div>
                </div>
                <div class="text-block">
                    <h3 class="mb-4">Social accounts</h3>
                    <div class="row">
                        <div class="col-sm-8">
                            <h6>Facebook</h6>
                            <p class="text-sm text-muted">Not connected</p>
                        </div>
                        <div class="col text-end"><a class="btn btn-link text-primary ps-0" href="#">Connect</a></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h6>Google</h6>
                            <p class="text-sm">Connected</p>
                        </div>
                        <div class="col text-end"><a class="btn btn-link text-primary ps-0" href="#">Disconnect</a>
                        </div>
                    </div>
                </div>
                <div class="text-block">
                    <h3 class="mb-4">Device history</h3>
                    <div class="d-flex">
                        <div class="icon-rounded bg-secondary-light flex-shrink-0">
                            <!--+svgIcon('imac-screen-1', 'text-secondary w-2rem h-2rem')        -->
                        </div>
                        {{ $slot }}
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-4 ms-lg-auto">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary-light py-4 border-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h4 class="h6 subtitle text-sm text-primary">Let's make your account more secure</h4>
                            </div>
                            <!--+svgIcon('shield-security-1', 'svg-icon svg-icon-light w-3rem h-3rem ms-3 text-primary flex-shrink-0')                    -->
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h6 class="card-text">Your account security: </h6>
                        <p class="card-text mb-4"><span class="badge badge-info-light">Medium</span></p>
                        <p class="text-muted card-text">We’re always working on ways to increase safety in our
                            community. </p>
                        <p class="text-muted card-text">That’s why we look at every account to make sure it’s as secure
                            as possible.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

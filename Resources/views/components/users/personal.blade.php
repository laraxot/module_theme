<!--extends _pug-includes/layout.pug-->
<section class="py-5" id="{{ $attrs['id'] }}">
    <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb ps-0  justify-content-start">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="user-account.html">Account</a></li>
            <li class="breadcrumb-item active">Personal info </li>
        </ol>
        <h1 class="hero-heading mb-0">Personal info</h1>
        <p class="text-muted mb-5">Manage your Personal info and settings here.</p>
        <div class="row">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="text-block">
                    <div class="row mb-3">
                        <div class="col-sm-9">
                            <h5>Personal Details</h5>
                        </div>
                        <div class="col-sm-3 text-end">
                            <button class="btn btn-link ps-0 text-primary collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="false"
                                aria-controls="personalDetails">Update</button>
                        </div>
                    </div>
                    <p class="text-sm text-muted"><i
                            class="fa fa-id-card fa-fw me-2"></i>{{ $attrs['fullname'] }}<br><i
                            class="fa fa-birthday-cake fa-fw me-2"></i>{{ $attrs['birthdate'] }}<br><i
                            class="fa fa-envelope-open fa-fw me-2"></i>{{ $attrs['email'] }}<span
                            class="mx-2"> | </span> <i
                            class="fa fa-phone fa-fw me-2"></i>{{ $attrs['phone'] }}</p>
                    <div class="collapse" id="personalDetails">
                        <form action="#">
                            <div class="row pt-4">
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        value="{{ $attrs['fullname'] }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="date">Date of birth</label>
                                    <input class="form-control" type="text" name="date" id="date"
                                        value="{{ $attrs['birthdate'] }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="email">Email address</label>
                                    <input class="form-control" type="email" name="email" id="email"
                                        value="{{ $attrs['email'] }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="phone">Phone number</label>
                                    <input class="form-control" type="text" name="phone" id="phone"
                                        value="{{ $attrs['phone'] }}" />
                                </div>
                            </div>
                            <button class="btn btn-outline-primary mb-4" type="submit">Save your personal
                                details</button>
                        </form>
                    </div>
                </div>
                <div class="text-block">
                    <div class="row mb-3">
                        <div class="col-sm-9">
                            <h5>Address</h5>
                        </div>
                        <div class="col-sm-3 text-end">
                            <button class="btn btn-link ps-0 text-primary collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#address" aria-expanded="false"
                                aria-controls="address">Change</button>
                        </div>
                    </div>
                    <div class="d-flex text-sm text-muted"> <i class="fa fa-address-book fa-fw flex-shrink-0 me-2"></i>
                        <div class="mt-n1">{{ $attrs['address'] }}<br>{{ $attrs['city'] }},
                            {{ $attrs['state'] }}, {{ $attrs['zip'] }}</div>
                    </div>
                    <div class="collapse" id="address">
                        <form action="#">
                            <div class="row pt-4">
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="street">Street</label>
                                    <input class="form-control" type="text" name="street" id="street"
                                        value="{{ $attrs['address'] }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="apt">Apt. (optional)</label>
                                    <input class="form-control" type="text" name="apt" id="apt"
                                        value="{{ $attrs['apt'] }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="city">City</label>
                                    <input class="form-control" type="text" name="city" id="city"
                                        value="{{ $attrs['city'] }}" />
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="state">State</label>
                                    <select class="selectpicker form-control" name="state" id="state"
                                        data-style="btn-selectpicker">
                                        {{-- <option value="state_0">Alabama </option>
                                        <option value="state_1">Alaska </option>
                                        <option value="state_2">Arizona </option>
                                        <option value="state_3">Arkansas </option>
                                        <option value="state_4" selected="selected">California </option>
                                        <option value="state_5">Colorado </option>
                                        <option value="state_6">Connecticut </option>
                                        <option value="state_7">Delaware </option>
                                        <option value="state_8">Florida </option>
                                        <option value="state_9">Georgia </option>
                                        <option value="state_10">Hawaii </option>
                                        <option value="state_11">Idaho </option>
                                        <option value="state_12">Illinois </option>
                                        <option value="state_13">Indiana </option>
                                        <option value="state_14">Iowa </option>
                                        <option value="state_15">Kansas </option>
                                        <option value="state_16">Kentucky </option>
                                        <option value="state_17">Louisiana </option>
                                        <option value="state_18">Maine </option>
                                        <option value="state_19">Maryland </option>
                                        <option value="state_20">Massachusetts </option>
                                        <option value="state_21">Michigan </option>
                                        <option value="state_22">Minnesota </option>
                                        <option value="state_23">Mississippi </option>
                                        <option value="state_24">Missouri </option>
                                        <option value="state_25">Montana </option>
                                        <option value="state_26">Nebraska </option>
                                        <option value="state_27">Nevada </option>
                                        <option value="state_28">New Hampshire </option>
                                        <option value="state_29">New Jersey </option>
                                        <option value="state_30">New Mexico </option>
                                        <option value="state_31">New York </option>
                                        <option value="state_32">North Carolina </option>
                                        <option value="state_33">North Dakota </option>
                                        <option value="state_34">Ohio </option>
                                        <option value="state_35">Oklahoma </option>
                                        <option value="state_36">Oregon </option>
                                        <option value="state_37">Pennsylvania </option>
                                        <option value="state_38">Rhode Island </option>
                                        <option value="state_39">South Carolina </option>
                                        <option value="state_40">South Dakota </option>
                                        <option value="state_41">Tennessee </option>
                                        <option value="state_42">Texas </option>
                                        <option value="state_43">Utah </option>
                                        <option value="state_44">Vermont </option>
                                        <option value="state_45">Virginia </option>
                                        <option value="state_46">Washington </option>
                                        <option value="state_47">West Virginia </option>
                                        <option value="state_48">Wisconsin </option>
                                        <option value="state_49">Wyoming </option> --}}
                                        {{ $slot }}
                                    </select>
                                </div>
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="zip">ZIP</label>
                                    <input class="form-control" type="text" name="zip" id="zip"
                                        value="{{ $attrs['zip'] }}" />
                                </div>
                            </div>
                            <button class="btn btn-outline-primary">Save address</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-4 ms-lg-auto">
                <div class="card border-0 shadow">
                    <div class="card-header bg-primary-light py-4 border-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h4 class="h6 subtitle text-sm text-primary">What info is shared with others?</h4>
                            </div>
                            <!--+svgIcon('identity-1', 'svg-icon svg-icon-light w-3rem h-3rem ms-3 text-primary flex-shrink-0')                    -->
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted text-sm card-text">Directory only releases contact information for hosts
                            and guests <strong>after a reservation is confirmed</strong>.</p>
                        <p class="text-muted text-sm card-text">Amet nisi eiusmod minim commodo sit voluptate aute ut
                            quis ea veniam sunt proident ex. <strong>Exercitation culpa laboris</strong> consequat
                            fugiat non ipsum veniam Lorem aliqua deserunt tempor elit veniam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @include('layouts.main')
        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @if(Session::has('success'))
                        <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
                        {!! session('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                    @if(Session::has('failed'))
                    <div class="alert {{ Session::get('alert-class', 'alert-danger') }}">
                        {!! session('success') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                    <div class="card">
                        <div class="card-header">{{ __('Vendor Registration') }}</div>
                        <div class="card-body">
                            <form method="post" action="{{ route('register.vendor') }}">
                                @csrf

                                <div class="form-group row mb-2">
                                    <label for="usertype" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

                                    <div class="col-md-6">
                                        <select id="vendor_field" class="form-control @error('vendor_field') is-invalid @enderror" name="vendor_field">
                                            <option value="">Select an option </option>
                                            <option value="Vendor">Vendor</option>
                                            <option value="Customer">Customer</option>
                                        </select>
                                        @error('vendor_field')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                

                                <div class="form-group row mb-2">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            /* $(document).ready(function() {
                $('#vendor_field').change(function() {
                    var selectedOption = $(this).val();
                    if (selectedOption === 'Vendor') {
                        $('.vendor-fields').show();
                    } else {
                        $('.vendor-fields').hide();
                    }
                });
            });
        </script>
         */
      {{--   <!-- Add the class 'vendor-fields' to the additional fields you want to show/hide -->
        <div class="form-group row mb-2 vendor-fields" style="display: none;">
            <!-- Additional fields for Vendor -->
            <!-- Example: -->
            <label for="vendor_field_2" class="col-md-4 col-form-label text-md-right">{{ __('Additional Field') }}</label>
        
            <div class="col-md-6">
                <input id="vendor_field_2" type="text" class="form-control" name="vendor_field_2">
            </div>
        </div> --}}
        


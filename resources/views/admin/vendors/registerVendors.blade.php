@include('layouts.main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registartion') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register.venodr') }}">
                            @csrf
                            <!-- Registrattion inforamtion starts-->
                            <div class="form-group row mb-2 ">
                                <label for="userType" class="col-md-4 col-form-label text-md-right">{{ __('User type') }}</label>
                                <div class="col-md-6">
                                <select id="vendor_field" class="form-control @error('vendor_field') is-invalid @enderror" name="vendor_field">
                                        <option value="">Select an option</option>
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
                           <!-- Registrattion inforamtion ends-->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="submit_simple">
                                        {{ __('Register') }}
                                    </button>
                                    <button type="submit" class="btn btn-primary hide" id="submit_btn_users">
                                        {{ __('Register User') }}
                                    </button>
                                    <button type="submit" class="btn btn-primary hide" id="submit_btn_vendors">
                                        {{ __('Register Vendor') }}
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
        $(document).ready(function(){
            $('#submit_btn_users').hide();
            $('#submit_btn_vendors').hide();
            $('.information_vendors').hide();

            $('#vendor_field').change(function() {
                var selectedOption = $(this).val();
                $('#submit_simple, #submit_btn_vendors, #submit_btn_users ,.information_vendors' ).hide(); // Hide all buttons initially
                if (selectedOption === 'Vendor') {
                    $('#submit_btn_vendors').show();
                    $('.information_vendors').show();
                } else if (selectedOption === 'Customer') {
                    $('#submit_btn_users').show();
                } else {
                    $('#submit_simple').show();
                    $('.information_vendors').hide();
                }
            });

            $('#country_field').change(function(){
                $('#state_field').prop('selectedIndex', 0);
                $('#city    _field').prop('selectedIndex', 0);
                let countryID =$(this).val()
                console.log(countryID);
                $.ajax({
                url :"{{route('state')}}",
                data:{
                    "countryid":countryID,						
                },
                success(request){
                    let options = '<option value=""></option>';
                    request.forEach(function(option) {
                        options += '<option value="' + option.id + '">' + option.name + '</option>';
                    });
                    $('#state_field').html(options);
                   
                }   
          });
     });

     $('#state_field').change(function(){
                let stateID =$(this).val()
                console.log(stateID);
                $.ajax({
                url :"{{route('city')}}",
                data:{
                    "stateid":stateID,						
                },
                success(request){
                    let options = '<option value=""></option>';

                    request.forEach(function(option) {
                        options += '<option value="' + option.id + '">' + option.name + '</option>';
                    });
                    $('#city_field').html(options);
                   
                }   
          });
     });
});
    


    </script>



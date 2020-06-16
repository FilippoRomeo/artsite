<div class="modal hide fade" id="signin_dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ __('Register') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}" id="singinForm">
                    @csrf
                    <div class="form-group row">

                        <!-- name input -->
                        <input placeholder="Name" id="nameSignin" type="text" class="form-control input_box @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('nameSignin')
                        <span class="invalid-feedback" role="alert" style="text-align:center">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <!-- email input -->
                        <input placeholder="E-Mail Address" id="emailSignin" type="email" class="form-control input_box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('emailSignin')
                        <span class="invalid-feedback" role="alert" style="text-align:center">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <!-- password input -->
                        <input placeholder="Password" id="passwordSignin" type="password" class="form-control input_box @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <input placeholder="Confirm Password" id="signin-password-confirm" type="password" class="form-control input_box" name="password_confirmation" required autocomplete="new-password">
                        @error('passwordSignin')
                        <span class="invalid-feedback" role="alert" style="text-align:center">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        @if ( (Route::current()->getName() != 'login' and 'register') and (count($errors) > 0 and !empty('singinForm')))
                        <script>
                            $(document).ready(function() {
                                $('#signin_dialog').modal('show');
                                $('#login_dialog').modal('hide');
                            });
                        </script>
                        @endif

                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="button_box btn-primary">{{ __('Register') }}</button>
                            <button type="button" class="button_box btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#login_dialog">Log in</button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal hide fade" id="login_dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">{{ __('Login') }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input placeholder="E-Mail Address" id="email" type="email" class="form-control input_box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="text-align:center">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input placeholder="Password" id="password" type="password" class="form-control input_box @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert" style="text-align:center">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group text-center">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Recover Password') }}
                        </a>
                        @endif
                     
                        @if ( Route::current()->getName() != 'login' and Route::current()->getName() != 'register' and count($errors) > 0 )
                        <script>
                            $(document).ready(function() {
                                $('#login_dialog').modal('show');
                                $('#signin_dialog').modal('hide');
                            });
                        </script>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="button_box btn-primary">{{ __('Login') }}</button>
                                <button class="button_box btn-secondary" data-toggle="modal" data-dismiss="modal" data-target="#signin_dialog" href="#signin_dialog">Sign in</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


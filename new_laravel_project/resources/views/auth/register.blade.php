<x-layouts.auth>
    <div class="wrapper bg-white">
        <div class="h2 text-center">Creativity</div>
        <div class="h4 text-muted text-center pt-2">Sign up</div>
        <form class="pt-3" action="{{ route('register.store') }}" method="POST">
            @csrf


            <div class="form-group py-2">
                <div class="input-field"> <span class="far fa-user p-2"></span>
                    <input name="name" type="text" placeholder="name " value="{{ old('name') }}">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group py-2">
                <div class="input-field"> <span class="far fa-user p-2"></span>
                    <input name="email" type="email" placeholder="Email Address" value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group py-1 pb-2">
                <div class="input-field"> <span class="fas fa-lock p-2"></span>
                    <input name="password" type="password" placeholder="Enter Password" value="{{ old('password') }}">
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group py-1 pb-2">
                <div class="input-field"> <span class="fas fa-lock p-2"></span>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password">
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex align-items-start">
            </div>
            <button type="submit" class="btn btn-block text-center my-3">Sign up</button>
            <div class="text-center pt-3 text-muted">Not a member? <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
    <script type='text/javascript'></script>

</x-layouts.auth>

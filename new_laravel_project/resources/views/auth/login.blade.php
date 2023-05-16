<x-layouts.auth>

    <div class="wrapper bg-white">
        <div class="h2 text-center">Creativity</div>
        <div class="h4 text-muted text-center pt-2">Enter your login details</div>


        <form action="{{ route('authenticate') }}" method="POST">
            @csrf

            <div class="form-group py-2">
                <div class="input-field"> <span class="far fa-user p-2"></span>
                    <input name="email" type="text" placeholder="Email Address" >
                </div>
            </div>

            <div class="form-group py-1 pb-2">
                <div class="input-field"> <span class="fas fa-lock p-2"></span>
                    <input name="password" type="password" placeholder="Enter your Password" >
                    <button class="btn bg-white text-muted">
                        <span class="far fa-eye-slash"></span>
                    </button>
                </div>
            </div>
            <div class="d-flex align-items-start">
                <div class="remember">
                    <label class="option text-muted"> Remember me
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="ml-auto"> <a href="#" id="forgot">Forgot Password?</a>
                </div>
            </div>
            <button type="submit" class="btn btn-block text-center my-3">Log in </button>
            <div  class="text-center pt-3 text-muted">Not a member? <a href="{{route('register')}}">Sign up</a>
            </div>
        </form>

    </div>
    <script type='text/javascript'></script>


</x-layouts.auth>

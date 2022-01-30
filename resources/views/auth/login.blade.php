
<x-guest-layout>
    <!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


        <style>
            body:before {
                /* font-family: 'Nunito', sans-serif;
                z-index: -1;
                 background-image:url('https://omahgame.com/wp-content/uploads/2021/06/Toko-Komputer-Jogja-Yang-Menyediakan-Perlengkapan-Gaming-800x445.jpghttps://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-bwsIyRE7Ux58Qye57cavqC6wO6BnP_N9EjQDU3--I-Sdkt_zMOMrz95ciOHSccMsKwE&usqp=CAU');
                background-repeat: no-repeat;
                background-size: cover;
                filter: blur(5px); */
                content: "";
                position: fixed;
                z-index: -1;
                background-repeat: no-repeat;
                background-size:cover;
                background-position:center top;
                display: block;
                background-image:url('https://omahgame.com/wp-content/uploads/2021/06/Toko-Komputer-Jogja-Yang-Menyediakan-Perlengkapan-Gaming-800x445.jpg');
                width: 100%;
                height: 100%;
                filter: blur(5px) ;
                -webkit-filter: blur(5px);
                
                
            }
            

            h1 {
                font-size:30px;
                font-weight:bold;
                border:5px #fff solid;
                display:inline-block;
                padding:5px 20px
            }
        </style>
    </head>
    <body>
        
        <x-jet-authentication-card>

            <x-slot name="logo">
            
            </x-slot>
            
            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div><h1 class="text-info"><b><i class="fas fa-desktop"></i> Aksesoris Komputer</h1></div><br><br>

                    <div>
                        <x-jet-label class="fas fa-envelope" for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password" class="fas fa-key" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600 fas fa-user-lock">{{ __(' Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 fas fa-lock" href="{{ route('password.request') }}">
                                {{ __(' Forgot your password?') }}
                            </a>
                        @endif

                        <x-jet-button class="ml-4 bg-info fas fa-sign-in-alt">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>
    
</x-guest-layout>

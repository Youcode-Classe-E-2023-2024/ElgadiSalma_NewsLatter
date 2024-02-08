<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">


        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>

        <div class="h-screen bg-indigo-100 flex justify-center items-center">
            <div class="lg:w-2/5 md:w-1/2 w-2/3">
                <div class="bg-white p-10 rounded-lg shadow-lg min-w-full">
                <form action="{{ route('login') }}" method="POST">

                    @csrf
                    <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Login</h1>

                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="email" id="email" placeholder="@email" />
                        @error('email')
                            <span class="text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
                        <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="password" id="password" placeholder="password" />
                    </div>

                    <div class="flex justify-between pt-5">
                        <label for="remember">
                            <input id="remember" type="checkbox" name="remember">
                            <span class="">Remember Me</span>
                        </label>

                        <a class="no-underline hover:underline text-blue-dark text-mg" href="{{ route('forgot_password') }}">
                            Forgot Your Password?
                        </a>
                    </div>

                    <button type="submit" class="w-full mt-6 bg-purple-400 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Login</button>
                </form>
                
            </div>
        </div>
        </div>

    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

    <div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden bg-gray-200 p-8 sm:p-12">
        <div class="w-full max-w-4xl rounded-md border-2 border-gray-100 bg-white p-14">
        <div class="flex flex-col items-center">
            <h3 class="mt-2 max-w-2xl text-center text-2xl font-bold leading-tight sm:text-3xl md:text-4xl md:leading-tight">Want actionable SEO advice from me? Then join this newsletter</h3>
            <form action="{{ route ('add_subscribe') }}" method="POST" class="mx-auto mt-4  w-full max-w-md flex-col gap-3 sm:flex-row sm:gap-0">
                @csrf
                @error('email')
                    <span class="text-red-500">{{$message}}</span>
                @enderror
                <div class="flex">
                    <input type="email" name="email" id="email" class="grow rounded border-2 border-gray-300 py-3 px-3 focus:border-emerald-500 focus:outline-none sm:rounded-l-md sm:rounded-r-none sm:border-r-0" placeholder="Email Address" required />
                    <button type="submit" class="rounded bg-purple-300 px-5 py-4 font-bold sm:rounded-l-none sm:rounded-r-md">Get First Email</button>  
                </div>

            </form>
        </div>
        </div>
    </div>
    
</body>
</html>

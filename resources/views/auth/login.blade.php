<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="max-h-screen">
<section class="border-red-500 bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl items-center justify-center">
        <div class="md:w-1/2 px-5">
            <h2 class="text-2xl font-bold text-[#002D74]">Login</h2>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <form class="mt-6" action="#" method="POST">
                @csrf
                <div>
                    <label class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" id="" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                  focus:bg-white focus:outline-none" required>
                </div>

                <div class="text-right mt-2">
                    <a href="{{route('forgot')}}" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Forgot Password?</a>
                </div>

                @if ($message = Session::get('error'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <button type="submit" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg
                px-4 py-3 mt-6">Log In</button>
            </form>

            <div class="mt-7 grid grid-cols-3 items-center text-gray-500">
                <hr class="border-gray-500" />
                <p class="text-center text-sm">OR</p>
                <hr class="border-gray-500" />
            </div>

            <div class="text-sm flex justify-between items-center mt-3">
                <p>If you don't have an account...</p>
                <a href="{{route('register')}}" class="py-2 px-5 ml-3 bg-white border rounded-xl hover:scale-110 duration-300 border-blue-400">Register</a>
            </div>
        </div>

        <div class="w-1/2 md:block hidden ">
            <img src="https://images.unsplash.com/photo-1614741118887-7a4ee193a5fa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" class="rounded-2xl" alt="page img">
        </div>

    </div>
</section>
</body>
</html>

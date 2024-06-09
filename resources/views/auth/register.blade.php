<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="max-h-screen">
<section class="border-red-500 bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
        <div class="md:w-1/2 px-5">
            <h2 class="text-2xl font-bold text-[#002D74]">Register</h2>
            <p class="text-sm mt-4 text-[#002D74]">If you have an account, please <a href="{{route('login')}}" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Login</a></p>
            <form class="mt-6" action="#" method="POST">
                @csrf
                <div>
                    <label class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                </div>

                <div>
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                  focus:bg-white focus:outline-none" required>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Confirm Password</label>
                    <input type="password" name="confirmPassword" placeholder="Enter the password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                  focus:bg-white focus:outline-none" required>
                </div>

                @if ($message = Session::get('err'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="text-right mt-2">
                    <a href="{{route('forgot-password')}}" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Forgot Password?</a>
                </div>

                <button type="submit" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg
                px-4 py-3 mt-6">Register</button>
            </form>

        </div>

        <div class="w-1/2 md:block hidden ">
            <img src="https://images.unsplash.com/photo-1614741118887-7a4ee193a5fa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" class="rounded-2xl" alt="page img">
        </div>

    </div>
</section>
</body>
</html>

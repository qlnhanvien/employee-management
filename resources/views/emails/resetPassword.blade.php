<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="max-h-screen">
<section class="border-red-500 bg-gray-200 min-h-screen flex items-center justify-center">
    <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl justify-center items-center">
        <div class="md:w-1/2 px-5">
            <h2 class="text-2xl font-bold text-[#002D74]">Reset Password</h2>
            <p class="text-sm mt-4 text-[#002D74]">Please enter your new password</p>
            <form class="mt-6" action="#" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <label class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" value="{{ $email ?? old('email') }}" readonly placeholder="Enter Email Address"  class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border  focus:outline-none" autofocus autocomplete required>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700">New Password</label>
                    <input type="password" name="password" placeholder="Enter New Password" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
                </div>
                <div class="mt-4">
                    <label class="block text-gray-700">Confirm Password</label>
                    <input type="password" name="confirmPassword" placeholder="Confirm New Password" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
                </div>

                @if ($message = Session::get('err'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <button type="submit" class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg
                px-4 py-3 mt-6">Reset password</button>
            </form>
        </div>

        <div class="w-1/2 md:block hidden ">
            <img src="https://images.unsplash.com/photo-1614741118887-7a4ee193a5fa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" class="rounded-2xl" alt="page img">
        </div>

    </div>
</section>
</body>
</html>

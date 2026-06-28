<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login AstroShoes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-96">

        <h2 class="text-2xl font-bold text-center mb-6">
            Login AstroShoes
        </h2>

        {{-- ERROR LOGIN (email/password salah) --}}
        @error('login_error')
            <p class="text-red-500 text-sm text-center mb-4">
                {{ $message }}
            </p>
        @enderror

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            {{-- EMAIL --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded-xl p-2"
                    required
                >

                @error('email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>

                <input
                    type="password"
                    name="password"
                    class="w-full border border-gray-300 rounded-xl p-2"
                    required
                >

                @error('password')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- BUTTON --}}
            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl"
            >
                Login
            </button>

        </form>

    </div>

</body>
</html>
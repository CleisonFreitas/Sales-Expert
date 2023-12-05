<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('icons/favicon.png') }}">
    <title>Login InterNote</title>
</head>

<body>
    <section class="w-screen h-screen flex">
        <div class="w-full h-full bg-gradient-to-r from-purple-700 to-slate-100 hidden md:flex justify-center items-center">
            <figure>
                <img src={{ asset('image/back-image-removebg.png') }} alt="background">
            </figure>
        </div>
        <div class="box-border w-full h-full bg-gradient-to-r shadow-lg shadow-purple-400 from-slate-100 to-gray-300 flex justify-center items-center px-4 ">
            <form method="POST" action="{{ route('auth.login') }}" class="box-border w-96 h-[380px] rounded-lg px-2 py-4 bg-white flex flex-around flex-col gap-2 shadow-lg shadow-purple-400">
                @csrf
                <figure class="w-full flex justify-center items-center ">
                    <img src={{asset('image/logo-pro-sem_fundo.png')}} class="w-16 h-16 " alt="logo">
                </figure>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="" :errors="$errors" />

                <label for="email" class="text-bold w-full block">Email:</label>
                <input type="text" value="ec2-user@ubuntu.com" name="email" id="email" class="text-gray-700 p-2 shadow focus:border-blue-400 rounded-lg outline-none border border-gray-400 hover:border-blue-400" readonly autofocus>

                <label for="password" class="text-bold w-full block">Senha:</label>
                <input type="password" value="ec2-secret" name="password" id="password" class="p-2 shadow focus:border-blue-400 rounded-lg outline-none border border-gray-400 hover:border-blue-400" readonly>

                <button type="submit" class="mt-2 text-white text-bold bg-gray-800 hover:bg-gray-600 p-2 flex justify-center items-center rounded-lg shadow">Log In</button>
            </form>
        </div>
    </section>

</body>

</html>
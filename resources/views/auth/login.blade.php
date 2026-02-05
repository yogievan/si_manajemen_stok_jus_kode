<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Sistem Informasi Stock Management Jus Kode Jogja</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    {{-- favicon --}}
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

</head>
<body class="bg-white font-sans m-auto">
    <div class="bg-white shadow-sm border-1 border-[#EEEEEE] rounded-full m-3 p-3">
        <header class="flex">
            <div class="flex-none">
                <img src="./assets/logo/logo.jpg" alt="icons" class="w-[45px] rounded-full shadow-md">
            </div>
            <div class="w-64 flex-1 my-auto ml-2 font-bold text-[18px] text-[#565725]">JUS KODE JOGJA</div>
        </header>
    </div>

    <div class="grid grid-cols-2 w-[100%] h-[500px] pt-2 px-3">
        <div class="grid grid-rows-3 rounded-l-[30px] p-3 bg-[#565725] text-white">
            <div></div>
            <div>
                <h1 class="text-4xl font-bold">Let's Get Started</h1>
                <p class="text-wrap mt-1">Sistem stock management untuk Jus Kode Jogja. Dirancang untuk mengelola stok bahan baku. <b> Ayo atur kebutuhan mu!</b> </p>
                <div class="mt-3 hover:underline">
                    <a href="https://juskode.id/" target="_blank">Tentang Jus Kode</a>
                    <i class="fas fa-arrow-circle-right text-[14px] pl-1"></i>
                </div>
            </div>
            <div></div>
        </div>
        @if ($errors->any())
            <div class="my-3 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 h-10" role="alert">
                <i class="fas fa-exclamation-circle mr-5 text-xl"></i>
                <div>
                    @foreach ($errors->all() as $item)
                        {{ $item }}
                    @endforeach
                </div>
            </div>
        @endif
        <div class="bg-white text-[#565725] border border-[#565725] rounded-r-[30px] p-3">
            <div class="m-auto mt-20">
                <div class="mb-10">
                    <h1 class="text-4xl font-bold">Sign Up</h1>
                    <p class="mt-1">Ayo masuk ke akun mu!</p>
                </div>
                <form action="#">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="text-[18px] text-[#565725] font-semibold">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                                <i class="fas fa-user text-[24px] pl-2"></i>
                            </div>
                            <input type="text" name="username" placeholder="Username" class="ps-12 bg-white border border-[#565725] border-1 rounded-full w-full p-2.5 font-normal focus:ring-[#565725] focus:border-[#565725]">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="text-[18px] text-[#565725] font-semibold">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                                <i class="fa-solid fa-lock text-[24px] pl-2"></i>
                            </div>
                            <input type="password" name="password" placeholder="Password" class="ps-12 bg-white border border-[#565725] border-1 rounded-full w-full p-2.5 font-normal focus:ring-[#565725] focus:border-[#565725]">
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="w-full bg-[#565725] text-white p-2.5 rounded-md hover:bg-[#45461a]">Let's Start</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <div class="mx-3 mt-5 bg-[#0F0F0F] rounded-t-[30px]">
        <footer class="text-center p-3 text-white">
            &copy; 2025 Sistem Informasi Stock Management Jus Kode Jogja
        </footer>
   </div>
</body>
</html>
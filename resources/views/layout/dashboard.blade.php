<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('web_title', 'Untitled Page') 
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- fontawesome css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    
    {{-- font poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- flowbite css --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    
</head>
<body>
    <div class="grid grid-cols-4 min-h-screen">

        <!-- SIDEBAR -->
        <aside class="h-screen sticky top-0 p-2 bg-[#565725] mr-1.5">
            <div class="flex p-3 justify-center align-center">
                <div class="flex-none">
                    <img src="{{ asset('assets/logo/logo.jpg') }}" alt="icons" class="w-[70px] rounded-full shadow-md">
                </div>
                <div class="w-64 flex-1 my-auto ml-2 font-bold text-[18px] text-white text-shadow-md">
                    JUS KODE JOGJA
                </div>
            </div>

            <p class="mt-10 text-[#9e9e4e]">Menu</p>
            <p class="mt-3 h-[2px] bg-[#9e9e4e] border-0"></p>

            <nav>
                <ul class="mt-5">
                    @yield('menu')
                </ul>
            </nav>
        </aside>

        <!-- CONTENT -->
        <div class="col-span-3 rounded-[15px] flex flex-col">

            <!-- TOP BAR -->
            <div class="bg-white rounded-[15px] border min-h-15 m-1.5 p-1">
                <div class="flex gap-2">
                    <div class="flex-auto font-bold text-[#565725] ml-3 my-auto text-[20px]">
                        @yield('name_page')
                    </div>

                    <div class="flex-none w-[300px] text-[#565725] m-auto">
                        <div class="grid grid-rows-2 text-right">
                            <div class="text-[14px] font-bold">
                                Nama User Nama User Nama User
                            </div>
                            <div class="text-[10px]">
                                Jabatan User
                            </div>
                        </div>
                    </div>

                    <div class="flex-none w-[40px] my-auto">
                        <i class="fas fa-user-circle text-[40px] text-[#565725]"></i>
                    </div>

                    <div class="flex-none my-auto ml-2 border-l pl-3">
                        <button class="bg-red-600 p-3 rounded-full text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300"
                            onclick="return confirm('Apakah kamu mau Logout?')">
                            <i class="fas fa-power-off w-[25px]"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <main class="flex-1">
                @yield('optional_content')
                @yield('graph_content')

                <div class="p-3 bg-white rounded-[15px] border min-h-screen m-1.5">
                    @yield('content')
                </div>
                
                <!-- FOOTER -->
                <div class="mx-1.5 mt-3 bg-[#0F0F0F] rounded-t-[15px]">
                    @php
                        $year = date('Y');
                    @endphp
                    <footer class="text-center p-1 text-white">
                        &copy; {{ $year }} Sistem Informasi Stock Management Jus Kode Jogja
                    </footer>
                </div>
            </main>
        </div>
    </div>
    {{-- flowbite js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @include('sweetalert::alert')
    <script>
        document.addEventListener('click', function(e){
            const btn = e.target.closest('[data-confirm-delete]');
            if(!btn) return;
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if(result.isConfirmed){
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = btn.href;
                    let csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = "{{ csrf_token() }}";
                    let method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';
                    form.appendChild(csrf);
                    form.appendChild(method);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
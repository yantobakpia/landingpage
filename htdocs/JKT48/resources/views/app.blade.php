<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jeketi</title>
        @vite("resources/css/app.css")
        <link rel="stylesheet" href="{{ asset("js/owlcarousel/assets/owl.carousel.min.css") }}">
        <link rel="stylesheet" href={{ asset("js/owlcarousel/assets/owl.theme.default.min.css") }}>
        <script src="{{ asset("js/jquery-3.7.0.min.js") }}"></script>
        <script src="{{ asset("js/sweetalert2.js") }}"></script>
        <script src="{{ asset("js/owlcarousel/owl.carousel.min.js") }}"></script>
    </head>
    <body>
        <nav class="bg-red-500 border-gray-200">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="" class="flex items-center">
                    <span class="self-center text-2xl text-white font-semibold whitespace-nowrap">JKT48</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="hidden md:block md:w-auto mx-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-red-500">
                        <li>
                            <a href="/" class="block py-2 pl-3 pr-4 text-white bg-red-500rounded md:bg-transparent md:text-white md:p-0" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="/member" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Members</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">About</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Services</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Contact</a>
                        </li>
                    </ul>
                </div>
                <input type="text" id="search-navbar" class="block p-2 pl-4 w-[20%] text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                <button type="button" class="ml-10 border border-white bg-red-500 text-white hover:bg-white hover:text-red-500 hover:ease-in hover:duration-[175ms] focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center mr-3">Login</button>
                <button type="button" class="hidden ml-10 border border-white bg-red-500 text-white hover:bg-white hover:text-red-500 hover:ease-in hover:duration-[175ms] focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center mr-3">Logout</button>
            </div>
        </nav>
        @if(session("message"))
            <script>
                Swal.fire("Berhasil", "{{ session("message") }}", "success");
            </script>
        @endif
        @if($errors->any())
            <script>
                Swal.fire("Peringatan!", "{{ $errors->first() }}", "warning");
            </script>
        @endif
    @if(!str_contains(url()->current(), "admin"))
        <div class="w-10/12 mx-auto min-h-screen">
            @yield("content")
        </div>
        <footer class="bg-red-500 shadow">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="w-full text-center">
                    <a href="/" class="mb-4 sm:mb-0 text-center text-xl text-white font-bold">JKT48</a>
{{--                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-white sm:mb-0">--}}
{{--                        <li>--}}
{{--                            <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="hover:underline">Contact</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
                <span class="block text-sm text-white sm:text-center">© 2023 <a href="#" class="hover:underline">JEKETI™</a>. All Rights Reserved.</span>
            </div>
        </footer>
    @else
        <div class="w-10/12 mx-auto">
            @yield("content")
        </div>
    @endif
    </body>
</html>

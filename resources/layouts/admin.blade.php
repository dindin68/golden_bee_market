<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Golden Bee Market 🐝</title>

    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex flex-col md:flex-row">
        <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 md:relative md:h-screen z-10 w-full md:w-64">
            <div
                class="md:mt-12 md:w-64 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="#"
                            class="block py-1 md:py-3 pl-1 align-middle text-white no-underline border-b-2 border-yellow-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block font-bold">Duyệt
                                Tin 🐝</span>
                        </a>
                    </li>
                    <li class="mr-3 flex-1">
                        <a href="/"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-400 no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                            <span
                                class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Về
                                Trang Chủ 🏠</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
            <div class="bg-gray-800 pt-3">
                <div
                    class="rounded-tl-3xl bg-gradient-to-r from-yellow-400 to-orange-500 p-4 shadow text-2xl text-white font-bold">
                    Hệ Thống Quản Trị Golden Bee 🐝
                </div>
            </div>

            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
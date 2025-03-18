<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>libra.page</title>

    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Figtree', sans-serif;
    background-color: #f9fafb;
}

/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 40px;
    background-color: white;
    border-bottom: 2px solid #e5e7eb;
    position: sticky;
    top: 0;
    z-index: 100;
}

/* Logo */
.logo {
    font-size: 22px;
    font-weight: bold;
    color: #1abc9c;
    font-family: 'Brush Script MT', cursive;
}

/* Navigation Links */
.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-links a {
    text-decoration: none;
    color: #374151;
    font-weight: 500;
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: #1abc9c;
}

/* Authentication Buttons */
.auth-buttons {
    display: flex;
    align-items: center;
    gap: 12px;
}

.auth-buttons button {
    border: none;
    background: none;
    color: #374151;
    font-weight: 500;
    padding: 8px 14px;
    cursor: pointer;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
}

.auth-buttons button:hover {
    background-color: #f3f4f6;
}

.signup {
    background-color: #1abc9c;
    color: white;
    padding: 8px 14px;
    border-radius: 5px;
    font-weight: 600;
    transition: background 0.3s ease-in-out;
}

.signup:hover {
    background-color: #16a085;
}

/* Dropdown Menus */
.dropdown {
    position: relative;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    width: 200px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
}

.dropdown:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
}

/* Profile Section */
.dropdown-toggle {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.dropdown-toggle img {
    border-radius: 50%;
    border: 2px solid #1abc9c;
    width: 36px;
    height: 36px;
}

.dropdown-toggle h2 {
    margin-left: 10px;
    font-size: 14px;
    font-weight: 600;
    color: #374151;
}

/* Responsive Design */
@media (max-width: 768px) {
    .navbar {
        padding: 12px 20px;
    }

    .nav-links {
        display: none; /* Sembunyikan navbar di mobile */
    }

    .auth-buttons {
        gap: 8px;
    }

    .auth-buttons button {
        padding: 6px 10px;
    }
}

    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">libra⚖️</div>
        <ul class="nav-links">
            <li><a href="{{ route('peminjam.dashboard') }}">Home</a></li>
            <li><a href="{{ route('peminjam.books') }}">Book</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        <ul class="ml-auto flex items-center">
                <li class="mr-1 dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;"><path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path></svg>
                    </button>
                    <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                        <form action="" class="p-4 border-b border-b-gray-100">
                            <div class="relative w-full">
                                <input type="text" class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500" placeholder="Search...">
                                <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-900"></i>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="dropdown">
                    <button type="button" class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center  hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path></svg>
                    </button>
                    <div class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full bg-white rounded-md border border-gray-100">
                        <div class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab">
                            <button type="button" data-tab="notification" data-tab-page="notifications" class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active">Notifications</button>
                        </div>
                        <div class="my-2">
                            <ul class="max-h-64 overflow-y-auto" data-tab-for="notification" data-page="notifications">
                                <li>
                                    <a href="#" class="py-2 px-4 flex items-center hover:bg-gray-50 group">
                                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                        <div class="ml-2">
                                            <div class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500">New order</div>
                                            <div class="text-[11px] text-gray-400">from a user</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <button id="fullscreen-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="hover:bg-gray-100 rounded-full" viewBox="0 0 24 24" style="fill: gray;"><path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"></path></svg>
                </button>
                <script>
                    const fullscreenButton = document.getElementById('fullscreen-button');

                    fullscreenButton.addEventListener('click', toggleFullscreen);

                    function toggleFullscreen() {
                        if (document.fullscreenElement) {
                            // If already in fullscreen, exit fullscreen
                            document.exitFullscreen();
                        } else {
                            // If not in fullscreen, request fullscreen
                            document.documentElement.requestFullscreen();
                        }
                    }
                </script>

                <li class="dropdown ml-3">
                    <button type="button" class="dropdown-toggle flex items-center">
                    <div class="flex-shrink-0 w-10 h-10 relative">
                        <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                            @if(Auth::check())
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                                    alt="User Avatar"/>
                            @else
                                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=Guest" alt="Guest Avatar"/>
                            @endif

                            <!-- Efek animasi indikator online -->
                            <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                            <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                        </div>
                    </div>
                        <div class="p-2 md:block text-left">
                            <h2 class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                            <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
                        </div>
                    </button>
                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a role="menuitem" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>


        <div class="auth-buttons">
            <form action="{{ route("logout") }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        </div>

    </nav>
    <main>
        @yield('content') {{-- This is where content from other views will be injected --}}
    </main>

</body>
</html>

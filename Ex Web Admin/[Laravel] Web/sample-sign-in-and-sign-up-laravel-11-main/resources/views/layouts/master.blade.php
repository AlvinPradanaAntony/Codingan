<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>StarCodeKh - CRM Analytics Dashboard</title>
    <link rel="icon" type="image/png" href="{{ URL::to('assets/images/favicon.png') }}">
    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/app.css') }}">
    <!-- Javascript Assets -->
    <script src="{{ URL::to('assets/js/app.js') }}" defer=""></script>
     <!-- message toastr -->
	<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
	<script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="{{ URL::to('assets/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap') }}" rel="stylesheet">
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" && document.documentElement.classList.add("dark");
    </script>
</head>

<body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
        <div class="app-preloader-inner relative inline-block size-48"></div>
    </div>
    <!-- message -->
    {!! Toastr::message() !!}
    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
        <!-- Sidebar -->
        @include('sidebar.sidebar')
        <!-- App Header Wrapper-->
        <nav class="header before:bg-white dark:before:bg-navy-750 print:hidden">
            <!-- App Header  -->
            <div class="header-container relative flex w-full bg-white dark:bg-navy-750 print:hidden">
                <!-- Header Items -->
                <div class="flex w-full items-center justify-between">
                    <!-- Left: Sidebar Toggle Button -->
                    <div class="h-7 w-7">
                        <button class="menu-toggle ml-0.5 flex h-7 w-7 flex-col justify-center space-y-1.5 text-primary outline-none focus:outline-none dark:text-accent-light/80" :class="$store.global.isSidebarExpanded && 'active'" @click="$store.global.isSidebarExpanded = !$store.global.isSidebarExpanded">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                    <!-- Right: Header buttons -->
                    <div class="-mr-1.5 flex items-center space-x-2">
                        <!-- Mobile Search Toggle -->
                        <button @click="$store.global.isSearchbarActive = !$store.global.isSearchbarActive" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 sm:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5.5 text-slate-500 dark:text-navy-100" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>

                        <!-- Main Searchbar -->
                        <template x-if="$store.breakpoints.smAndUp">
                            <div class="flex" x-data="usePopper({placement:'bottom-end',offset:12})" @click.outside="isShowPopper && (isShowPopper = false)">
                                <div class="relative mr-4 flex h-8">
                                    <input placeholder="Search here..." class="form-input peer h-full rounded-full bg-slate-150 px-4 pl-9 text-xs+ text-slate-800 ring-primary/50 hover:bg-slate-200 focus:ring dark:bg-navy-900/90 dark:text-navy-100 dark:placeholder-navy-300 dark:ring-accent/50 dark:hover:bg-navy-900 dark:focus:bg-navy-900" :class="isShowPopper ? 'w-80' : 'w-60'" @focus="isShowPopper= true" type="text" x-ref="popperRef">
                                    <div class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 transition-colors duration-200" fill="currentColor" viewbox="0 0 24 24">
                                            <path
                                                d="M3.316 13.781l.73-.171-.73.171zm0-5.457l.73.171-.73-.171zm15.473 0l.73-.171-.73.171zm0 5.457l.73.171-.73-.171zm-5.008 5.008l-.171-.73.171.73zm-5.457 0l-.171.73.171-.73zm0-15.473l-.171-.73.171.73zm5.457 0l.171-.73-.171.73zM20.47 21.53a.75.75 0 101.06-1.06l-1.06 1.06zM4.046 13.61a11.198 11.198 0 010-5.115l-1.46-.342a12.698 12.698 0 000 5.8l1.46-.343zm14.013-5.115a11.196 11.196 0 010 5.115l1.46.342a12.698 12.698 0 000-5.8l-1.46.343zm-4.45 9.564a11.196 11.196 0 01-5.114 0l-.342 1.46c1.907.448 3.892.448 5.8 0l-.343-1.46zM8.496 4.046a11.198 11.198 0 015.115 0l.342-1.46a12.698 12.698 0 00-5.8 0l.343 1.46zm0 14.013a5.97 5.97 0 01-4.45-4.45l-1.46.343a7.47 7.47 0 005.568 5.568l.342-1.46zm5.457 1.46a7.47 7.47 0 005.568-5.567l-1.46-.342a5.97 5.97 0 01-4.45 4.45l.342 1.46zM13.61 4.046a5.97 5.97 0 014.45 4.45l1.46-.343a7.47 7.47 0 00-5.568-5.567l-.342 1.46zm-5.457-1.46a7.47 7.47 0 00-5.567 5.567l1.46.342a5.97 5.97 0 014.45-4.45l-.343-1.46zm8.652 15.28l3.665 3.664 1.06-1.06-3.665-3.665-1.06 1.06z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot">
                                    <div class="popper-box flex max-h-[calc(100vh-6rem)] w-80 flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark">
                                        <div x-data="{activeTab:'tabAll'}" class="is-scrollbar-hidden flex shrink-0 overflow-x-auto rounded-t-lg bg-slate-100 px-2 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                                            <button @click="activeTab = 'tabAll'" :class="activeTab === 'tabAll' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                All
                                            </button>
                                            <button @click="activeTab = 'tabFiles'" :class="activeTab === 'tabFiles' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                Files
                                            </button>
                                            <button @click="activeTab = 'tabChats'" :class="activeTab === 'tabChats' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                Chats
                                            </button>
                                            <button @click="activeTab = 'tabEmails'" :class="activeTab === 'tabEmails' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                Emails
                                            </button>
                                            <button @click="activeTab = 'tabProjects'" :class="activeTab === 'tabProjects' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                Projects
                                            </button>
                                            <button @click="activeTab = 'tabTasks'" :class="activeTab === 'tabTasks' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                Tasks
                                            </button>
                                        </div>

                                        <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pb-2">
                                            <div class="is-scrollbar-hidden mt-3 flex space-x-4 overflow-x-auto px-3">
                                                <a href="apps-kanban.html" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div class="is-initial rounded-full bg-success text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Kanban
                                                    </p>
                                                </a>
                                                <a href="{ route('home') }}" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div class="is-initial rounded-full bg-secondary text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Analytics
                                                    </p>
                                                </a>
                                                <a href="apps-chat.html" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div class="is-initial rounded-full bg-info text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Chat
                                                    </p>
                                                </a>
                                                <a href="apps-filemanager.html" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div class="is-initial rounded-full bg-error text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Files
                                                    </p>
                                                </a>
                                                <a href="dashboards-crypto-1.html" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div class="is-initial rounded-full bg-secondary text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Crypto
                                                    </p>
                                                </a>
                                                <a href="dashboards-banking-1.html" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div
                                                            class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Banking
                                                    </p>
                                                </a>
                                                <a href="apps-todo.html" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div class="is-initial rounded-full bg-info text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path d="M12.5293 18L20.9999 8.40002"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                <path d="M3 13.2L7.23529 18L17.8235 6"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Todo
                                                    </p>
                                                </a>
                                                <a href="{ route('home') }}" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div class="is-initial rounded-full bg-secondary text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Analytics
                                                    </p>
                                                </a>
                                                <a href="dashboards-orders.html" class="w-14 text-center">
                                                    <div class="avatar size-12">
                                                        <div class="is-initial rounded-full bg-warning text-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5"
                                                                fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                                                        Orders
                                                    </p>
                                                </a>
                                            </div>

                                            <div class="mt-3 flex items-center justify-between bg-slate-100 py-1.5 px-3 dark:bg-navy-800">
                                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                                    Recent
                                                </p>
                                                <a href="#"
                                                    class="text-tiny+ font-medium uppercase text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                                                    View All
                                                </a>
                                            </div>

                                            <div class="mt-1 font-inter font-medium">
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-chat.html">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                        </path>
                                                    </svg>
                                                    <span>Chat App</span>
                                                </a>
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-filemanager.html">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z">
                                                        </path>
                                                    </svg>
                                                    <span>File Manager App</span>
                                                </a>
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-mail.html">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <span>Email App</span>
                                                </a>
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-kanban.html">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
                                                        </path>
                                                    </svg>
                                                    <span>Kanban Board</span>
                                                </a>
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-todo.html">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    <span>Todo App</span>
                                                </a>
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="dashboards-crypto-2.html">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"> </path>
                                                    </svg>

                                                    <span>Crypto Dashboard</span>
                                                </a>
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="dashboards-banking-2.html">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                                        </path>
                                                    </svg>
                                                    <span>Banking Dashboard</span>
                                                </a>
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="{{  route('home')  }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                                    </svg>
                                                    <span>Analytics Dashboard</span>
                                                </a>
                                                <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="dashboards-influencer.html">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <span>Influencer Dashboard</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <!-- Dark Mode Toggle -->
                        <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg x-show="$store.global.isDarkModeEnabled" x-transition:enter="transition-transform duration-200 ease-out absolute origin-top" x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static" class="size-6 text-amber-400" fill="currentColor" viewbox="0 0 24 24">
                                <path d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled" x-transition:enter="transition-transform duration-200 ease-out absolute origin-top" x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static" class="size-6 text-amber-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <!-- Monochrome Mode Toggle -->
                        <button @click="$store.global.isMonochromeModeEnabled = !$store.global.isMonochromeModeEnabled" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <i class="fa-solid fa-palette bg-gradient-to-r from-sky-400 to-blue-600 bg-clip-text text-lg font-semibold text-transparent"></i>
                        </button>

                        <!-- Notification-->
                        <div x-effect="if($store.global.isSearchbarActive) isShowPopper = false" x-data="usePopper({placement:'bottom-end',offset:12})" @click.outside="isShowPopper && (isShowPopper = false)" class="flex">
                            <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="btn relative size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-slate-500 dark:text-navy-100" stroke="currentColor" fill="none" viewbox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.375 17.556h-6.75m6.75 0H21l-1.58-1.562a2.254 2.254 0 01-.67-1.596v-3.51a6.612 6.612 0 00-1.238-3.85 6.744 6.744 0 00-3.262-2.437v-.379c0-.59-.237-1.154-.659-1.571A2.265 2.265 0 0012 2c-.597 0-1.169.234-1.591.65a2.208 2.208 0 00-.659 1.572v.38c-2.621.915-4.5 3.385-4.5 6.287v3.51c0 .598-.24 1.172-.67 1.595L3 17.556h12.375zm0 0v1.11c0 .885-.356 1.733-.989 2.358A3.397 3.397 0 0112 22a3.397 3.397 0 01-2.386-.976 3.313 3.313 0 01-.989-2.357v-1.111h6.75z"> </path>
                                </svg>
                                <span class="absolute -top-px -right-px flex size-3 items-center justify-center">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-secondary opacity-80"></span>
                                    <span class="inline-flex size-2 rounded-full bg-secondary"></span>
                                </span>
                            </button>
                            <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot">
                                <div x-data="{activeTab:'tabAll'}" class="popper-box mx-4 mt-1 flex max-h-[calc(100vh-6rem)] w-[calc(100vw-2rem)] flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark sm:m-0 sm:w-80">
                                    <div class="rounded-t-lg bg-slate-100 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                                        <div class="flex items-center justify-between px-4 pt-2">
                                            <div class="flex items-center space-x-2">
                                                <h3 class="font-medium text-slate-700 dark:text-navy-100">
                                                    Notifications
                                                </h3>
                                                <div class="badge h-5 rounded-full bg-primary/10 px-1.5 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                                    26
                                                </div>
                                            </div>
                                            <button class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="is-scrollbar-hidden flex shrink-0 overflow-x-auto px-3">
                                            <button @click="activeTab = 'tabAll'" :class="activeTab === 'tabAll' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                <span>All</span>
                                            </button>
                                            <button @click="activeTab = 'tabAlerts'" :class="activeTab === 'tabAlerts' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                <span>Alerts</span>
                                            </button>
                                            <button @click="activeTab = 'tabEvents'" :class="activeTab === 'tabEvents' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                <span>Events</span>
                                            </button>
                                            <button @click="activeTab = 'tabLogs'" :class="activeTab === 'tabLogs' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                                <span>Logs</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="tab-content flex flex-col overflow-hidden">
                                        <div x-show="activeTab === 'tabAll'"
                                            x-transition:enter="transition-all duration-300 easy-in-out"
                                            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                            class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary-light/15">
                                                    <i
                                                        class="fa fa-user-edit text-secondary dark:text-secondary-light"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        User Photo Changed
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        John Doe changed his avatar photo
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Mon, June 14, 2021
                                                    </p>
                                                    <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                        <span class="shrink-0">08:00 - 09:00</span>
                                                        <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                        <span class="line-clamp-1">Frontend Conf</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent-light/15">
                                                    <i
                                                        class="fa-solid fa-image text-primary dark:text-accent-light"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Images Added
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        Mores Clarke added new image gallery
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-success/10 dark:bg-success/15">
                                                    <i class="fa fa-leaf text-success"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Design Completed
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        Robert Nolan completed the design of the CRM
                                                        application
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Wed, June 21, 2021
                                                    </p>
                                                    <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                        <span class="shrink-0">16:00 - 20:00</span>
                                                        <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                        <span class="line-clamp-1">UI/UX Conf</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                    <i class="fa fa-project-diagram text-warning"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        ER Diagram
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        Team completed the ER diagram app
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-warning"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        THU, May 11, 2021
                                                    </p>
                                                    <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                        <span class="shrink-0">10:00 - 11:30</span>
                                                        <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                        <span class="line-clamp-1">Interview, Konnor Guzman
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-error/10 dark:bg-error/15">
                                                    <i class="fa fa-history text-error"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Weekly Report
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        The weekly report was uploaded
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div x-show="activeTab === 'tabAlerts'"
                                            x-transition:enter="transition-all duration-300 easy-in-out"
                                            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                            class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary-light/15">
                                                    <i
                                                        class="fa fa-user-edit text-secondary dark:text-secondary-light"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        User Photo Changed
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        John Doe changed his avatar photo
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent-light/15">
                                                    <i
                                                        class="fa-solid fa-image text-primary dark:text-accent-light"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Images Added
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        Mores Clarke added new image gallery
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-success/10 dark:bg-success/15">
                                                    <i class="fa fa-leaf text-success"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Design Completed
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        Robert Nolan completed the design of the CRM
                                                        application
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                    <i class="fa fa-project-diagram text-warning"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        ER Diagram
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        Team completed the ER diagram app
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-error/10 dark:bg-error/15">
                                                    <i class="fa fa-history text-error"></i>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Weekly Report
                                                    </p>
                                                    <div
                                                        class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                        The weekly report was uploaded
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div x-show="activeTab === 'tabEvents'"
                                            x-transition:enter="transition-all duration-300 easy-in-out"
                                            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                            class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Mon, June 14, 2021
                                                    </p>
                                                    <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                        <span class="shrink-0">08:00 - 09:00</span>
                                                        <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                        <span class="line-clamp-1">Frontend Conf</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Wed, June 21, 2021
                                                    </p>
                                                    <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                        <span class="shrink-0">16:00 - 20:00</span>
                                                        <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                        <span class="line-clamp-1">UI/UX Conf</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-warning"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        THU, May 11, 2021
                                                    </p>
                                                    <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                        <span class="shrink-0">10:00 - 11:30</span>
                                                        <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                        <span class="line-clamp-1">Interview, Konnor Guzman
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Mon, Jul 16, 2021
                                                    </p>
                                                    <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                        <span class="shrink-0">06:00 - 16:00</span>
                                                        <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                        <span class="line-clamp-1">Laravel Conf</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex size-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-warning"
                                                        fill="none" viewbox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="1.5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-medium text-slate-600 dark:text-navy-100">
                                                        Wed, Jun 16, 2021
                                                    </p>
                                                    <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                        <span class="shrink-0">15:30 - 11:30</span>
                                                        <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                        <span class="line-clamp-1">Interview, Jonh Doe
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div x-show="activeTab === 'tabLogs'"
                                            x-transition:enter="transition-all duration-300 easy-in-out"
                                            x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                            x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                            class="is-scrollbar-hidden overflow-y-auto px-4">
                                            <div class="mt-8 pb-8 text-center">
                                                <img class="mx-auto w-36" src="assets/images/illustrations/empty-girl-box.svg"
                                                    alt="image">
                                                <div class="mt-5">
                                                    <p
                                                        class="text-base font-semibold text-slate-700 dark:text-navy-100">
                                                        No any logs
                                                    </p>
                                                    <p class="text-slate-400 dark:text-navy-300">
                                                        There are no unread logs yet
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Sidebar Toggle -->
                        <button @click="$store.global.isRightSidebarExpanded = true" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5.5 text-slate-500 dark:text-navy-100" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mobile Searchbar -->
        <div x-show="$store.breakpoints.isXs && $store.global.isSearchbarActive" x-transition:enter="easy-out transition-all" x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in transition-all" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-[100] flex flex-col bg-white dark:bg-navy-700 sm:hidden">
            <div class="flex items-center space-x-2 bg-slate-100 px-3 pt-2 dark:bg-navy-800">
                <button class="btn -ml-1.5 h-7 w-7 shrink-0 rounded-full p-0 text-slate-600 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25"
                    @click="$store.global.isSearchbarActive = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" stroke-width="1.5" viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <input x-effect="$store.global.isSearchbarActive && $nextTick(() => $el.focus() );" class="form-input h-8 w-full bg-transparent placeholder-slate-400 dark:placeholder-navy-300" type="text" placeholder="Search here...">
            </div>

            <div x-data="{activeTab:'tabAll'}" class="is-scrollbar-hidden flex shrink-0 overflow-x-auto bg-slate-100 px-2 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                <button @click="activeTab = 'tabAll'" :class="activeTab === 'tabAll' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    All
                </button>
                <button @click="activeTab = 'tabFiles'" :class="activeTab === 'tabFiles' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Files
                </button>
                <button @click="activeTab = 'tabChats'" :class="activeTab === 'tabChats' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Chats
                </button>
                <button @click="activeTab = 'tabEmails'" :class="activeTab === 'tabEmails' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Emails
                </button>
                <button @click="activeTab = 'tabProjects'" :class="activeTab === 'tabProjects' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Projects
                </button>
                <button @click="activeTab = 'tabTasks'" :class="activeTab === 'tabTasks' ? 'border-primary dark:border-accent text-primary dark:text-accent-light' : 'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                    Tasks
                </button>
            </div>

            <div class="is-scrollbar-hidden overflow-y-auto overscroll-contain pb-2">
                <div class="is-scrollbar-hidden mt-3 flex space-x-4 overflow-x-auto px-3">
                    <a href="apps-kanban.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-success text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Kanban
                        </p>
                    </a>
                    <a href="{{ route('home') }}" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-secondary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Analytics
                        </p>
                    </a>
                    <a href="apps-chat.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-info text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Chat
                        </p>
                    </a>
                    <a href="apps-filemanager.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-error text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Files
                        </p>
                    </a>
                    <a href="dashboards-crypto-1.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-secondary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Crypto
                        </p>
                    </a>
                    <a href="dashboards-banking-1.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Banking
                        </p>
                    </a>
                    <a href="apps-todo.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-info text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Todo
                        </p>
                    </a>

                    <a href="dashboards-orders.html" class="w-14 text-center">
                        <div class="avatar size-12">
                            <div class="is-initial rounded-full bg-warning text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1.5 overflow-hidden text-ellipsis whitespace-nowrap text-xs text-slate-700 dark:text-navy-100">
                            Orders
                        </p>
                    </a>
                </div>

                <div class="mt-3 flex items-center justify-between bg-slate-100 py-1.5 px-3 dark:bg-navy-800">
                    <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                        Recent
                    </p>
                    <a href="#" class="text-tiny+ font-medium uppercase text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                        View All
                    </a>
                </div>

                <div class="mt-1 font-inter font-medium">
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-chat.html">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        <span>Chat App</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-filemanager.html">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z">
                            </path>
                        </svg>
                        <span>File Manager App</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100" href="apps-mail.html">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span>Email App</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="apps-kanban.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
                            </path>
                        </svg>
                        <span>Kanban Board</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="apps-todo.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 13.2L7.23529 18L17.8235 6" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M12.5293 18L20.9999 8.40002" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span>Todo App</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="dashboards-crypto-2.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>

                        <span>Crypto Dashboard</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="dashboards-banking-2.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3">
                            </path>
                        </svg>

                        <span>Banking Dashboard</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6">
                            </path>
                        </svg>

                        <span>Analytics Dashboard</span>
                    </a>
                    <a class="group flex items-center space-x-2 px-2.5 py-2 tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100"
                        href="dashboards-influencer.html">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="size-4.5 text-slate-400 transition-colors group-hover:text-slate-500 group-focus:text-slate-500 dark:text-navy-300 dark:group-hover:text-navy-200 dark:group-focus:text-navy-200"
                            fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>

                        <span>Influencer Dashboard</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Right Sidebar -->
        @include('sidebar.right_sidebar')
        <!-- Main Content Wrapper -->
        <main class="main-content w-full pb-8">
            <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                <div class="col-span-12 lg:col-span-8">
                    <div class="flex items-center justify-between space-x-2">
                        <h2 class="text-base font-medium tracking-wide text-slate-800 line-clamp-1 dark:text-navy-100">
                            Sales Overview
                        </h2>
                        <div x-data="{activeTab:'tabRecent'}" class="is-scrollbar-hidden overflow-x-auto rounded-lg bg-slate-200 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                            <div class="tabs-list flex p-1">
                                <button @click="activeTab = 'tabRecent'" :class="activeTab === 'tabRecent' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 px-3 py-1 text-xs+ font-medium">
                                    Last month
                                </button>
                                <button @click="activeTab = 'tabAll'" :class="activeTab === 'tabAll' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 px-3 py-1 text-xs+ font-medium">
                                    Last year
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:space-x-7">
                        <div class="mt-4 flex shrink-0 flex-col items-center sm:items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-info" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z">
                                </path>
                            </svg>
                            <div class="mt-4">
                                <div class="flex items-center space-x-1">
                                    <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                                        $6,556.55
                                    </p>
                                    <button class="btn size-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-xs text-slate-400 dark:text-navy-300">
                                    this month
                                </p>
                            </div>
                            <div class="mt-3 flex items-center space-x-2">
                                <div class="ax-transparent-gridline w-28">
                                    <div
                                        x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.analyticsSalesThisMonth); $el._x_chart.render() });">
                                    </div>
                                </div>
                                <div class="flex items-center space-x-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-success" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 11l5-5m0 0l5 5m-5-5v12">
                                        </path>
                                    </svg>
                                    <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                        3.2%
                                    </p>
                                </div>
                            </div>
                            <button class="btn mt-8 space-x-2 rounded-full border border-slate-300 px-3 text-xs+ font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5 text-slate-400 dark:text-navy-300" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path>
                                </svg>
                                <span> Download Report</span>
                            </button>
                        </div>
                        <div class="ax-transparent-gridline grid w-full grid-cols-1">
                            <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.analyticsSalesOverview); $el._x_chart.render() });"> </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-4">
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-5 lg:grid-cols-2">
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between space-x-1">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    $67.6k
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary dark:text-accent" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Income</p>
                        </div>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    12.6K
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-success" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                    </path>
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Completed</p>
                        </div>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    143
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-warning" fill="none"
                                    viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Pending</p>
                        </div>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    651
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-info" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                                    </path>
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Dispatch</p>
                        </div>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between space-x-1">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    46k
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-secondary" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Products</p>
                        </div>
                        <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                            <div class="flex justify-between">
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    8.8k
                                </p>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-error" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <p class="mt-1 text-xs+">Customers</p>
                        </div>
                    </div>
                </div>

                <div class="card col-span-12 lg:col-span-8">
                    <div class="flex items-center justify-between py-3 px-4">
                        <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                            Projects Status
                        </h2>
                        <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                    </path>
                                </svg>
                            </button>

                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                                        </li>
                                    </ul>
                                    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                    <ul>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-y-4 pb-3 sm:grid-cols-3">
                        <div class="flex flex-col justify-between border-4 border-transparent border-l-info px-4">
                            <div>
                                <p class="text-base font-medium text-slate-600 dark:text-navy-100"> Web Design</p>
                                <p class="text-xs text-slate-400 dark:text-navy-300"> Design Learn Management System </p>
                                <div class="badge mt-2 bg-info/10 text-info dark:bg-info/15"> UI/UX Design </div>
                            </div>
                            <div>
                                <div class="mt-8">
                                    <p class="font-inter">
                                        <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">%55.</span>
                                        <span class="text-xs">23</span>
                                    </p>
                                    <p class="mt-1 text-xs">June 08, 2021</p>
                                </div>
                                <div class="mt-8 flex items-center justify-between space-x-2">
                                    <div class="flex -space-x-3">
                                        <div class="avatar size-8 hover:z-10">
                                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="{{ URL::to('assets/images/avatar/avatar-16.jpg') }}" alt="avatar">
                                        </div>
                                        <div class="avatar size-8 hover:z-10">
                                            <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                                jd
                                            </div>
                                        </div>
                                        <div class="avatar size-8 hover:z-10">
                                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="{{ URL::to('assets/images/avatar/avatar-20.jpg') }}" alt="avatar">
                                        </div>
                                    </div>
                                    <button
                                        class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"> </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border-4 border-transparent border-l-secondary px-4">
                            <div>
                                <p class="text-base font-medium text-slate-600 dark:text-navy-100">Mobile App</p>
                                <p class="text-xs text-slate-400 dark:text-navy-300">Ecommerce Application</p>
                                <div class="badge mt-2 bg-secondary/10 text-secondary dark:bg-secondary-light/15 dark:text-secondary-light"> Ecommerce</div>
                            </div>
                            <div>
                                <div class="mt-8">
                                    <p class="font-inter">
                                        <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">%14.</span>
                                        <span class="text-xs">84</span>
                                    </p>
                                    <p class="mt-1 text-xs">May 01, 2021</p>
                                </div>
                                <div class="mt-8 flex items-center justify-between space-x-2">
                                    <div class="flex -space-x-3">
                                        <div class="avatar size-8 hover:z-10">
                                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="{{ URL::to('assets/images/avatar/avatar-16.jpg') }}" alt="avatar">
                                        </div>
                                        <div class="avatar size-8 hover:z-10">
                                            <div class="is-initial rounded-full bg-success text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                                uh
                                            </div>
                                        </div>
                                        <div class="avatar size-8 hover:z-10">
                                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="{{ URL::to('assets/images/avatar/avatar-14.jpg') }}" alt="avatar">
                                        </div>
                                    </div>
                                    <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between border-4 border-transparent border-l-warning px-4">
                            <div>
                                <p class="text-base font-medium text-slate-600 dark:text-navy-100">Design System</p>
                                <p class="text-xs text-slate-400 dark:text-navy-300">Create LMS design system on figma</p>
                                <div class="mt-2 flex space-x-1.5">
                                    <div class="badge bg-warning/10 text-warning dark:bg-warning/15">LMS</div>
                                    <div class="badge bg-warning/10 text-warning dark:bg-warning/15">Figma</div>
                                </div>
                            </div>
                            <div>
                                <div class="mt-8">
                                    <p class="font-inter">
                                        <span class="text-2xl font-medium text-slate-600 dark:text-navy-100">%87.</span>
                                        <span class="text-xs">40</span>
                                    </p>
                                    <p class="mt-1 text-xs">September 16, 2021</p>
                                </div>
                                <div class="mt-8 flex items-center justify-between space-x-2">
                                    <div class="flex -space-x-3">
                                        <div class="avatar size-8 hover:z-10">
                                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="assets/images/avatar/avatar-11.jpg" alt="avatar">
                                        </div>
                                        <div class="avatar size-8 hover:z-10">
                                            <div class="is-initial rounded-full bg-error text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                                pm
                                            </div>
                                        </div>
                                        <div class="avatar size-8 hover:z-10">
                                            <img class="rounded-full ring ring-white dark:ring-navy-700" src="assets/images/avatar/avatar-10.jpg" alt="avatar">
                                        </div>
                                    </div>
                                    <button class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-4">
                    <div class="flex items-center justify-between">
                        <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                            Customer Satisfaction
                        </h2>
                        <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                    </path>
                                </svg>
                            </button>

                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                                        </li>
                                    </ul>
                                    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                    <ul>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>
                            <span class="text-3xl text-slate-700 dark:text-navy-100">9.7</span>
                            <span class="text-xs text-success">+2.1%</span>
                        </p>
                        <p class="text-xs+">Performance score</p>
                    </div>
                    <div class="mt-4 flex h-2 space-x-1">
                        <div class="w-5/12 rounded-full bg-primary dark:bg-accent" x-tooltip.primary="'Exellent'"></div>
                        <div class="w-2/12 rounded-full bg-success" x-tooltip.success="'Very Good'"></div>
                        <div class="w-2/12 rounded-full bg-info" x-tooltip.info="'Good'"></div>
                        <div class="w-2/12 rounded-full bg-warning" x-tooltip.warning="'Poor'"></div>
                        <div class="w-1/12 rounded-full bg-error" x-tooltip.error="'Very Poor'"></div>
                    </div>

                    <div class="is-scrollbar-hidden mt-4 min-w-full overflow-x-auto">
                        <table class="w-full font-inter">
                            <tbody>
                                <tr>
                                    <td class="whitespace-nowrap py-2">
                                        <div class="flex items-center space-x-2">
                                            <div
                                                class="size-3.5 rounded-full border-2 border-primary dark:border-accent">
                                            </div>
                                            <p class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                                Exellent
                                            </p>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            1 029
                                        </p>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">42%</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="size-3.5 rounded-full border-2 border-success"></div>
                                            <p class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                                Very Good
                                            </p>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            426
                                        </p>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">18%</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="size-3.5 rounded-full border-2 border-info"></div>
                                            <p class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                                Good
                                            </p>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            326
                                        </p>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">14%</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="size-3.5 rounded-full border-2 border-warning"></div>
                                            <p class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                                Poor
                                            </p>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            395
                                        </p>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">17%</td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="size-3.5 rounded-full border-2 border-error"></div>
                                            <p class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                                Very Poor
                                            </p>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            129
                                        </p>
                                    </td>
                                    <td class="whitespace-nowrap py-2 text-right">9%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-12 gap-4 bg-slate-150 py-5 dark:bg-navy-800 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                <div
                    class="col-span-12 flex flex-col px-[var(--margin-x)] transition-all duration-[.25s] lg:col-span-3 lg:pr-0">
                    <h2 class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100 lg:text-xl">
                        Top Sellers
                    </h2>

                    <p class="mt-3 grow">
                        The top sellers is calculated based on the sales of a product and
                        undergoes hourly updations.
                    </p>

                    <div class="mt-4">
                        <p>Sales Growth</p>
                        <div class="mt-1.5 flex items-center space-x-2">
                            <div class="flex h-7 w-7 items-center justify-center rounded-full bg-success/15 text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewbox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 11l5-5m0 0l5 5m-5-5v12">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-base font-medium text-slate-700 dark:text-navy-100">
                                $2,225.22
                            </p>
                        </div>
                    </div>
                </div>

                <div class="is-scrollbar-hidden col-span-12 flex space-x-4 overflow-x-auto px-[var(--margin-x)] transition-all duration-[.25s] lg:col-span-9 lg:pl-0">
                    <div class="card w-72 shrink-0 space-y-9 rounded-xl p-4 sm:px-5">
                        <div class="flex items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <img class="mask is-squircle" src="assets/images/avatar/avatar-5.jpg" alt="image">
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">StarCodeKh</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300"> Employee </p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                                        2
                                    </div>
                                </div>
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                                        4
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <div>
                                <p class="text-xs+">Sells</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    2 348
                                </p>
                            </div>
                            <div>
                                <p class="text-xs+">Target</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    3 000
                                </p>
                            </div>
                            <div>
                                <p class="text-xs+">Clients</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    78
                                </p>
                            </div>
                        </div>
                        <div class="grow">
                            <div class="flex w-full space-x-1">
                                <div x-tooltip="'Phone Calls'" class="h-2 w-4/12 rounded-full bg-primary dark:bg-accent"></div>
                                <div x-tooltip="'Chats Messages'" class="h-2 w-3/12 rounded-full bg-success"></div>
                                <div x-tooltip="'Emails'" class="h-2 w-5/12 rounded-full bg-info"></div>
                            </div>
                            <div class="mt-2 flex flex-wrap">
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-primary dark:bg-accent"></div>
                                    <div class="flex space-x-1 text-xs leading-6">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Calls</span>
                                        <span>33%</span>
                                    </div>
                                </div>
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-success"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Chat Messages</span>
                                        <span>17%</span>
                                    </div>
                                </div>
                                <div class="mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-info"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Emails</span>
                                        <span>50%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex space-x-2">
                                <img x-tooltip="'Award Level 1'" class="size-6" src="assets/images/awards/award-19.svg" alt="avatar">
                                <img x-tooltip="'Award Level 2'" class="size-6" src="assets/images/awards/award-2.svg" alt="avatar">
                                <img x-tooltip="'Award Level 3'" class="size-6" src="assets/images/awards/award-5.svg" alt="avatar">
                            </div>
                            <button class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card w-72 shrink-0 space-y-9 rounded-xl p-4 sm:px-5">
                        <div class="flex items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <img class="mask is-squircle" src="assets/images/avatar/avatar-18.jpg" alt="image">
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">Konnor Guzman</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">Employee</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                                        3
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <div>
                                <p class="text-xs+">Sells</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">1 451</p>
                            </div>
                            <div>
                                <p class="text-xs+">Target</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">2 000</p>
                            </div>
                            <div>
                                <p class="text-xs+">Clients</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">54</p>
                            </div>
                        </div>
                        <div class="grow">
                            <div class="flex w-full space-x-1">
                                <div x-tooltip="'Phone Calls'"
                                    class="h-2 w-3/12 rounded-full bg-primary dark:bg-accent"></div>
                                <div x-tooltip="'Chats Messages'" class="h-2 w-7/12 rounded-full bg-success"></div>
                                <div x-tooltip="'Emails'" class="size-2/12 rounded-full bg-info"></div>
                            </div>
                            <div class="mt-2 flex flex-wrap">
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-primary dark:bg-accent"></div>
                                    <div class="flex space-x-1 text-xs leading-6">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Calls</span>
                                        <span>24%</span>
                                    </div>
                                </div>
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-success"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Chat Messages</span>
                                        <span>56%</span>
                                    </div>
                                </div>
                                <div class="mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-info"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Emails</span>
                                        <span>20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex space-x-2">
                                <img x-tooltip="'Award Level 1'" class="size-6" src="assets/images/awards/award-1.svg" alt="avatar">
                                <img x-tooltip="'Award Level 2'" class="size-6" src="assets/images/awards/award-6.svg" alt="avatar">
                                <img x-tooltip="'Award Level 3'" class="size-6" src="assets/images/awards/award-9.svg"  alt="avatar">
                            </div>
                            <button class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card w-72 shrink-0 space-y-9 rounded-xl p-4 sm:px-5">
                        <div class="flex items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <img class="mask is-squircle" src="{{ URL::to('assets/images/avatar/avatar-6.jpg') }}" alt="image">
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">Alfredo Elliott</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">Contractors</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                                        4
                                    </div>
                                </div>
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <div>
                                <p class="text-xs+">Sells</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    423
                                </p>
                            </div>
                            <div>
                                <p class="text-xs+">Target</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    500
                                </p>
                            </div>
                            <div>
                                <p class="text-xs+">Clients</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                    16
                                </p>
                            </div>
                        </div>
                        <div class="grow">
                            <div class="flex w-full space-x-1">
                                <div x-tooltip="'Phone Calls'"
                                    class="h-2 w-8/12 rounded-full bg-primary dark:bg-accent"></div>
                                <div x-tooltip="'Chats Messages'" class="size-2/12 rounded-full bg-success"></div>
                                <div x-tooltip="'Emails'" class="size-2/12 rounded-full bg-info"></div>
                            </div>
                            <div class="mt-2 flex flex-wrap">
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-primary dark:bg-accent"></div>
                                    <div class="flex space-x-1 text-xs leading-6">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Calls</span>
                                        <span>60%</span>
                                    </div>
                                </div>
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-success"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Chat Messages</span>
                                        <span>23%</span>
                                    </div>
                                </div>
                                <div class="mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-info"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Emails</span>
                                        <span>17%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex space-x-2">
                                <img x-tooltip="'Award Level 2'" class="size-6" src="assets/images/awards/award-14.svg" alt="avatar">
                                <img x-tooltip="'Award Level 3'" class="size-6" src="assets/images/awards/award-13.svg" alt="avatar">
                            </div>
                            <button class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card w-72 shrink-0 space-y-9 rounded-xl p-4 sm:px-5">
                        <div class="flex items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <img class="mask is-squircle" src="assets/images/avatar/avatar-11.jpg" alt="image">
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">Samantha Shelton</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">Contractors</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </button>
                                    <div class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">2</div>
                                </div>
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <div>
                                <p class="text-xs+">Sells</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">579</p>
                            </div>
                            <div>
                                <p class="text-xs+">Target</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">800</p>
                            </div>
                            <div>
                                <p class="text-xs+">Clients</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">24</p>
                            </div>
                        </div>
                        <div class="grow">
                            <div class="flex w-full space-x-1">
                                <div x-tooltip="'Phone Calls'" class="h-2 w-4/12 rounded-full bg-primary dark:bg-accent"></div>
                                <div x-tooltip="'Chats Messages'" class="h-2 w-4/12 rounded-full bg-success"></div>
                                <div x-tooltip="'Emails'" class="h-2 w-4/12 rounded-full bg-info"></div>
                            </div>
                            <div class="mt-2 flex flex-wrap">
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-primary dark:bg-accent"></div>
                                    <div class="flex space-x-1 text-xs leading-6">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Calls</span>
                                        <span>30%</span>
                                    </div>
                                </div>
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-success"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Chat Messages</span>
                                        <span>36%</span>
                                    </div>
                                </div>
                                <div class="mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-info"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Emails</span>
                                        <span>34%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex space-x-2">
                                <img x-tooltip="'Award Level 2'" class="size-6" src="assets/images/awards/award-15.svg" alt="avatar">
                                <img x-tooltip="'Award Level 3'" class="size-6" src="assets/images/awards/award-13.svg" alt="avatar">
                            </div>
                            <button class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card w-72 shrink-0 space-y-9 rounded-xl p-4 sm:px-5">
                        <div class="flex items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <img class="mask is-squircle" src="assets/images/avatar/avatar-19.jpg" alt="image">
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">Derrick Simmons</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">Employee</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <div>
                                <p class="text-xs+">Sells</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">6 541</p>
                            </div>
                            <div>
                                <p class="text-xs+">Target</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">8 000</p>
                            </div>
                            <div>
                                <p class="text-xs+">Clients</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">145</p>
                            </div>
                        </div>
                        <div class="grow">
                            <div class="flex w-full space-x-1">
                                <div x-tooltip="'Phone Calls'" class="h-2 w-6/12 rounded-full bg-primary dark:bg-accent"></div>
                                <div x-tooltip="'Chats Messages'" class="h-2 w-4/12 rounded-full bg-success"></div>
                                <div x-tooltip="'Emails'" class="size-2/12 rounded-full bg-info"></div>
                            </div>
                            <div class="mt-2 flex flex-wrap">
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-primary dark:bg-accent"></div>
                                    <div class="flex space-x-1 text-xs leading-6">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Calls</span>
                                        <span>55%</span>
                                    </div>
                                </div>
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-success"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Chat Messages</span>
                                        <span>30%</span>
                                    </div>
                                </div>
                                <div class="mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-info"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Emails</span>
                                        <span>15%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex space-x-2">
                                <img x-tooltip="'Award Level 2'" class="size-6" src="assets/images/awards/award-15.svg" alt="avatar">
                                <img x-tooltip="'Award Level 3'" class="size-6" src="assets/images/awards/award-5.svg" alt="avatar">
                                <img x-tooltip="'Award Level 3'" class="size-6" src="assets/images/awards/award-25.svg" alt="avatar">
                            </div>
                            <button class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card w-72 shrink-0 space-y-9 rounded-xl p-4 sm:px-5">
                        <div class="flex items-center justify-between space-x-2">
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <img class="mask is-squircle" src="assets/images/avatar/avatar-7.jpg" alt="image">
                                </div>
                                <div>
                                    <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">Katrina West</p>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">Employee</p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </button>
                                    <div class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">1</div>
                                </div>
                                <div class="relative cursor-pointer">
                                    <button class="btn h-7 w-7 bg-primary/10 p-0 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between space-x-2">
                            <div>
                                <p class="text-xs+">Sells</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">3 481</p>
                            </div>
                            <div>
                                <p class="text-xs+">Target</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">5 000</p>
                            </div>
                            <div>
                                <p class="text-xs+">Clients</p>
                                <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">96</p>
                            </div>
                        </div>

                        <div class="grow">
                            <div class="flex w-full space-x-1">
                                <div x-tooltip="'Phone Calls'" class="h-2 w-1/12 rounded-full bg-primary dark:bg-accent"></div>
                                <div x-tooltip="'Chats Messages'" class="h-2 w-5/12 rounded-full bg-success"></div>
                                <div x-tooltip="'Emails'" class="h-2 w-6/12 rounded-full bg-info"></div>
                            </div>
                            <div class="mt-2 flex flex-wrap">
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-primary dark:bg-accent"></div>
                                    <div class="flex space-x-1 text-xs leading-6">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Calls</span>
                                        <span>9%</span>
                                    </div>
                                </div>
                                <div class="mr-4 mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-success"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Chat Messages</span>
                                        <span>41%</span>
                                    </div>
                                </div>
                                <div class="mb-1 inline-flex items-center space-x-2 font-inter">
                                    <div class="size-2 rounded-full bg-info"></div>
                                    <div class="flex space-x-1 text-xs">
                                        <span class="font-medium text-slate-700 dark:text-navy-100">Emails</span>
                                        <span>50%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <div class="flex space-x-2">
                                <img x-tooltip="'Award Level 2'" class="size-6" src="assets/images/awards/award-1.svg" alt="avatar">
                                <img x-tooltip="'Award Level 3'" class="size-6" src="assets/images/awards/award-24.svg" alt="avatar">
                                <img x-tooltip="'Award Level 3'" class="size-6" src="assets/images/awards/award-30.svg" alt="avatar">
                            </div>
                            <button class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                <div class="card col-span-12 sm:col-span-6">
                    <div class="my-3 flex items-center justify-between px-4 sm:px-5">
                        <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                            Bandwidth Report
                        </h2>
                        <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                    </path>
                                </svg>
                            </button>

                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                                        </li>
                                    </ul>
                                    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                    <ul>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 px-4 sm:gap-5 sm:px-5 lg:grid-cols-2">
                        <div class="rounded-lg border border-slate-150 p-4 dark:border-navy-600">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-2xl font-medium text-slate-700 dark:text-navy-100">393</span>
                                    <span class="text-xs">Mb</span>
                                </div>
                                <p class="text-xs+">HTTP Traffic</p>
                            </div>

                            <div class="progress mt-3 h-1.5 bg-slate-150 dark:bg-navy-500">
                                <div class="is-active relative w-8/12 overflow-hidden rounded-full bg-success"></div>
                            </div>
                            <div class="mt-2 flex justify-between text-xs text-slate-400 dark:text-navy-300">
                                <p>Monthly target</p>
                                <p>17%</p>
                            </div>
                        </div>
                        <div class="rounded-lg border border-slate-150 p-4 dark:border-navy-600">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-2xl font-medium text-slate-700 dark:text-navy-100">293</span>
                                    <span class="text-xs">Mb</span>
                                </div>
                                <p class="text-xs+">SMTP Traffic</p>
                            </div>

                            <div class="progress mt-3 h-1.5 bg-slate-150 dark:bg-navy-500">
                                <div class="relative w-8/12 overflow-hidden rounded-full bg-warning"></div>
                            </div>
                            <div class="mt-2 flex justify-between text-xs text-slate-400 dark:text-navy-300">
                                <p>Monthly target</p>
                                <p>65%</p>
                            </div>
                        </div>
                        <div class="rounded-lg border border-slate-150 p-4 dark:border-navy-600">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-2xl font-medium text-slate-700 dark:text-navy-100">293</span>
                                    <span class="text-xs">Mb</span>
                                </div>
                                <p class="text-xs+">FTP Traffic</p>
                            </div>

                            <div class="progress mt-3 h-1.5 bg-slate-150 dark:bg-navy-500">
                                <div class="relative w-5/12 overflow-hidden rounded-full bg-secondary"></div>
                            </div>
                            <div class="mt-2 flex justify-between text-xs text-slate-400 dark:text-navy-300">
                                <p>Monthly target</p>
                                <p>79%</p>
                            </div>
                        </div>
                        <div class="rounded-lg border border-slate-150 p-4 dark:border-navy-600">
                            <div class="flex justify-between">
                                <div>
                                    <span class="text-2xl font-medium text-slate-700 dark:text-navy-100">36</span>
                                    <span class="text-xs">Mb</span>
                                </div>
                                <p class="text-xs+">POP3 Traffic</p>
                            </div>

                            <div class="progress mt-3 h-1.5 bg-slate-150 dark:bg-navy-500">
                                <div class="is-active relative w-4/12 overflow-hidden rounded-full bg-slate-500 dark:bg-navy-400"> </div>
                            </div>
                            <div class="mt-2 flex justify-between text-xs text-slate-400 dark:text-navy-300">
                                <p>Monthly target</p>
                                <p>79%</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex grow items-center justify-between px-4 sm:px-5">
                        <div class="flex items-center space-x-2">
                            <p class="text-xs+">Performance</p>
                            <p class="text-slate-800 dark:text-navy-100">3.2%</p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-success" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 11l5-5m0 0l5 5m-5-5v12">
                                </path>
                            </svg>
                        </div>
                        <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">Download Report</a>
                    </div>

                    <div class="ax-transparent-gridline ax-rounded-b-lg">
                        <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.analyticsBandwidth); $el._x_chart.render() });"></div>
                    </div>
                </div>
                <div class="card col-span-12 pb-4 sm:col-span-6">
                    <div class="my-3 flex items-center justify-between px-4 sm:px-5">
                        <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                            Users Activity
                        </h2>
                        <div x-data="usePopper({placement:'bottom-end',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                    </path>
                                </svg>
                            </button>

                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another Action</a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something else</a>
                                        </li>
                                    </ul>
                                    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                    <ul>
                                        <li>
                                            <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated Link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ol class="timeline line-space px-4 [--size:1.5rem] sm:px-5">
                        <li class="timeline-item">
                            <div class="timeline-item-point rounded-full border border-current bg-white text-secondary dark:bg-navy-700 dark:text-secondary-light">
                                <i class="fa fa-user-edit text-tiny"></i>
                            </div>
                            <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                                <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                    <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                                        User Photo Changed
                                    </p>
                                    <span class="text-xs text-slate-400 dark:text-navy-300">12 minute ago</span>
                                </div>
                                <p class="py-1">John Doe changed his avatar photo</p>
                                <div class="avatar mt-2 size-16">
                                    <img class="mask is-squircle" src="assets/images/avatar/avatar-19.jpg" alt="avatar">
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-item-point rounded-full border border-current bg-white text-success dark:bg-navy-700">
                                <i class="fa fa-leaf text-tiny"></i>
                            </div>
                            <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                                <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                    <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                                        Design Completed
                                    </p>
                                    <span class="text-xs text-slate-400 dark:text-navy-300">3 hours ago</span>
                                </div>
                                <p class="py-1">
                                    Robert Nolan completed the design of the CRM application
                                </p>
                                <a href="#" class="inline-flex items-center space-x-1 pt-2 text-slate-600 transition-colors hover:text-primary dark:text-navy-100 dark:hover:text-accent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewbox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <span>File_final.fig</span>
                                </a>
                                <div class="pt-2">
                                    <a href="#" class="tag rounded-full border border-secondary/30 bg-secondary/10 text-secondary hover:bg-secondary/20 focus:bg-secondary/20 active:bg-secondary/25 dark:border-secondary-light/30 dark:bg-secondary-light/10 dark:text-secondary-light dark:hover:bg-secondary-light/20 dark:focus:bg-secondary-light/20 dark:active:bg-secondary-light/25">
                                        UI/UX
                                    </a>
                                    <a href="#" class="tag rounded-full border border-info/30 bg-info/10 text-info hover:bg-info/20 focus:bg-info/20 active:bg-info/25">
                                        CRM
                                    </a>
                                    <a href="#" class="tag rounded-full border border-success/30 bg-success/10 text-success hover:bg-success/20 focus:bg-success/20 active:bg-success/25">
                                        Dashboard
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-item-point rounded-full border border-current bg-white text-warning dark:bg-navy-700">
                                <i class="fa fa-project-diagram text-tiny"></i>
                            </div>
                            <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                                <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                    <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                                        ER Diagram
                                    </p>
                                    <span class="text-xs text-slate-400 dark:text-navy-300">a day ago</span>
                                </div>
                                <p class="py-1">Team completed the ER diagram app</p>
                                <div>
                                    <p class="text-xs text-slate-400 dark:text-navy-300"> Members:</p>
                                    <div class="mt-2 flex justify-between">
                                        <div class="flex flex-wrap -space-x-2">
                                            <div class="avatar h-7 w-7 hover:z-10">
                                                <img class="rounded-full ring ring-white dark:ring-navy-700" src="assets/images/avatar/avatar-16.jpg" alt="avatar">
                                            </div>
                                            <div class="avatar h-7 w-7 hover:z-10">
                                                <div class="is-initial rounded-full bg-info text-xs+ uppercase text-white ring ring-white dark:ring-navy-700">
                                                    jd
                                                </div>
                                            </div>
                                            <div class="avatar h-7 w-7 hover:z-10">
                                                <img class="rounded-full ring ring-white dark:ring-navy-700" src="assets/images/avatar/avatar-20.jpg" alt="avatar">
                                            </div>
                                            <div class="avatar h-7 w-7 hover:z-10">
                                                <img class="rounded-full ring ring-white dark:ring-navy-700" src="assets/images/avatar/avatar-8.jpg" alt="avatar">
                                            </div>
                                            <div class="avatar h-7 w-7 hover:z-10">
                                                <img class="rounded-full ring ring-white dark:ring-navy-700" src="assets/images/avatar/avatar-5.jpg" alt="avatar">
                                            </div>
                                        </div>
                                        <button class="btn h-7 w-7 rounded-full bg-slate-150 p-0 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 rotate-45" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-item-point rounded-full border border-current bg-white text-error dark:bg-navy-700">
                                <i class="fa fa-history text-tiny"></i>
                            </div>
                            <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                                <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                                    <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0"> Weekly Report</p>
                                    <span class="text-xs text-slate-400 dark:text-navy-300">a day ago</span>
                                </div>
                                <p class="py-1">The weekly report was uploaded</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </main>
    </div>

    <div id="x-teleport-target"></div>
    <script> window.addEventListener("DOMContentLoaded", () => Alpine.start());</script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=source-code-pro:400,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-code antialiased px-12 py-12 bg-black text-white">
    <!-- Page Content -->
    <main class="flex flex-col md:flex-row">
        <div class="grow">
            {{ $slot }}

            @if(request()->route()->getName() != 'home')
                <div class="pt-12">
                    <a class="border-2 border-dashed px-3 py-2 hover:border-aoc-green hover:text-aoc-green inline-block" href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
        <div class="pl-0 md:pl-12 mt-12 md:mt-0">
<pre class="text-aoc-green text-[10px] md:text-base">
           *             ,
                   _/^\_
                  <     >
 *                 /.-.\         *
          *        `/&\`                   *
                  ,@.*;@,
                 /_o.I %_\    *
    *           (`'--:o(_@;
               /`;--.,__ `')             *
              ;@`o % O,*`'`&\
        *    (`'--)_@ ;o %'()\      *
             /`;--._`''--._O'@;
            /&*,()~o`;-.,_ `""`)
 *          /`,@ ;+& () o*`;-';\
           (`""--.,_0 +% @' &()\
           /-.,_    ``''--....-'`)  *
      *    /@%;o`:;'--,.__   __.'\
          ;*,&(); @ % &^;~`"`o;@();         *
          /(); o^~; & ().o@*&`;&%O\
          `"="==""==,,,.,="=="==="`
       __.----.(\-''#####---...___...-----._
     '`         \)_`"""""`
             .--' ')
           o(  )_-\
             `"""` `
</pre>
        </div>
    </main>
</body>
</html>

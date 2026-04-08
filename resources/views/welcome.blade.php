<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <title>Registro para sistema de clientes</title>
      @if (Route::has('login'))
            <nav>
                @auth
                    <a
                     href="{{ url('/dashboard') }}"
                     class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal"
                    >
                    Dashboard
                    </a>
                    @else
                        <a
                         href="{{ route('login') }}"
                         class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal"
                        >
                            Iniciar Sesión
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                                Registrarse 
                            </a>
                        @endif
                @endauth
            </nav>
        @endif
 </body>
</html>
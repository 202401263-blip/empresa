@extends('layouts.guest')

@section('title', 'Iniciar sesión')

@section('content')
<main class="relative flex min-h-screen items-center justify-center p-4 md:p-8">
    <div class="w-full max-w-7xl overflow-hidden rounded-3xl border border-white/10 bg-slate-900/80 shadow-2xl shadow-black/50 backdrop-blur-sm transition duration-300 hover:-translate-y-1 hover:shadow-indigo-950/40">
        <div class="grid min-h-[760px] grid-cols-1 lg:grid-cols-2">
            <section class="relative hidden overflow-hidden lg:flex">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(59,130,246,0.35),transparent_50%),radial-gradient(circle_at_75%_30%,rgba(99,102,241,0.32),transparent_45%),linear-gradient(135deg,#020617_0%,#0f172a_55%,#111827_100%)]"></div>
                <div class="absolute inset-y-0 right-0 w-px bg-gradient-to-b from-transparent via-white/20 to-transparent"></div>
                <div class="relative z-10 flex h-full flex-col justify-between p-12">
                    <div class="inline-flex w-fit items-center gap-3 rounded-xl border border-white/20 bg-white/10 px-4 py-2 shadow-lg">
                        <div class="h-7 w-7 rounded-lg bg-indigo-500/20 ring-1 ring-indigo-300/50"></div>
                        <span class="text-lg font-semibold">Constructora OS</span>
                    </div>
                    <div class="max-w-lg space-y-5">
                        <h1 class="text-4xl font-extrabold leading-tight text-white xl:text-5xl">
                            Masterizando la Logística de Construcción
                        </h1>
                        <p class="text-lg text-slate-200/85">
                            Plataforma empresarial para coordinar proyectos, costos y operaciones con trazabilidad completa.
                        </p>
                    </div>
                    <p class="text-sm text-slate-300/80">© {{ now()->year }} Constructora. Todos los derechos reservados.</p>
                </div>
            </section>

            <section class="flex items-center justify-center bg-slate-950/70 px-6 py-10 md:px-10">
                <div class="w-full max-w-md">
                    <div class="mb-8 space-y-2">
                        <h2 class="text-3xl font-bold text-white">Bienvenido de nuevo</h2>
                        <p class="text-sm text-slate-400">Ingrese sus credenciales para acceder al panel.</p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 rounded-xl border border-rose-500/30 bg-rose-500/10 px-4 py-3 text-sm text-rose-200">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                        @csrf

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-200">Usuario o correo</label>
                            <div class="group flex items-center rounded-xl border border-slate-700 bg-slate-900/70 px-3 transition focus-within:border-indigo-400 focus-within:ring-2 focus-within:ring-indigo-500/40">
                                <svg class="h-4 w-4 text-slate-500 transition group-focus-within:text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.75 6.75a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.1a7.5 7.5 0 0 1 15 0"></path>
                                </svg>
                                <input
                                    type="text"
                                    name="login"
                                    value="{{ old('login') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    class="w-full bg-transparent px-3 py-3 text-sm text-slate-100 placeholder:text-slate-500 focus:outline-none"
                                    placeholder="usuario o correo">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-slate-200">Contraseña</label>
                            <div class="group flex items-center rounded-xl border border-slate-700 bg-slate-900/70 px-3 transition focus-within:border-indigo-400 focus-within:ring-2 focus-within:ring-indigo-500/40">
                                <svg class="h-4 w-4 text-slate-500 transition group-focus-within:text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16.5 10.5V7.875a4.125 4.125 0 0 0-8.25 0V10.5m-1.5 0h11.25A1.5 1.5 0 0 1 19.5 12v7.5a1.5 1.5 0 0 1-1.5 1.5H6A1.5 1.5 0 0 1 4.5 19.5V12a1.5 1.5 0 0 1 1.5-1.5Z"></path>
                                </svg>
                                <input
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    class="w-full bg-transparent px-3 py-3 text-sm text-slate-100 placeholder:text-slate-500 focus:outline-none"
                                    placeholder="••••••••">
                            </div>
                        </div>

                        <label class="inline-flex cursor-pointer items-center gap-2 text-sm text-slate-400">
                            <input
                                class="h-4 w-4 rounded border-slate-600 bg-slate-800 text-indigo-500 focus:ring-indigo-500/60"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1">
                            Mantener sesión iniciada
                        </label>

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-900/40 transition duration-200 hover:-translate-y-0.5 hover:bg-indigo-400 hover:shadow-indigo-700/50 active:translate-y-0">
                            Ingresar al sistema
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

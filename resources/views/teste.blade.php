<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Teste de Relacionamentos</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-violet-50 via-white to-purple-50 text-base-content">

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 sm:py-10 lg:px-8">

        {{-- Cabeçalho --}}
        <header
            class="mb-8 overflow-hidden rounded-3xl border border-violet-100
                   bg-white p-6 shadow-sm sm:mb-10 sm:p-8"
        >

            <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                <div class="max-w-2xl">

                    <span
                        class="badge badge-primary badge-outline mb-4 px-4 py-3
                               font-medium"
                    >
                        Laravel + MySQL
                    </span>

                    <h1
                        class="text-3xl font-bold tracking-tight text-slate-800
                               sm:text-4xl lg:text-5xl"
                    >
                        Teste de Relacionamentos
                    </h1>

                    <p class="mt-3 text-base leading-relaxed text-slate-500 sm:text-lg">
                        Visualização dos relacionamentos entre usuários,
                        perfis, posts e tags.
                    </p>

                </div>

                <a
                    href="/teste/gerar"
                    class="btn btn-primary rounded-xl px-6 shadow-md
                           shadow-primary/20 transition-all duration-200
                           hover:-translate-y-0.5 hover:shadow-lg
                           sm:w-auto"
                >
                    Gerar dados de teste
                </a>

            </div>

        </header>


        {{-- Usuários --}}
        @forelse ($users as $user)

            <section
                class="mb-8 overflow-hidden rounded-3xl border border-violet-100
                       bg-white shadow-sm transition-shadow duration-200
                       hover:shadow-md sm:mb-10"
            >

                {{-- Informações do usuário --}}
                <div class="p-6 sm:p-8">

                    <div
                        class="flex flex-col gap-5 sm:flex-row
                               sm:items-center sm:justify-between"
                    >

                        <div class="flex items-center gap-4">

                            {{-- Avatar --}}
                            <div class="avatar placeholder">

                                <div
                                    class="w-14 rounded-2xl bg-violet-100
                                           text-primary sm:w-16"
                                >
                                    <span class="text-xl font-bold sm:text-2xl">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </span>
                                </div>

                            </div>

                            {{-- Dados --}}
                            <div>

                                <h2
                                    class="text-xl font-bold text-slate-800
                                           sm:text-2xl"
                                >
                                    {{ $user->name }}
                                </h2>

                                <p class="mt-1 text-sm text-slate-500 sm:text-base">
                                    {{ $user->email }}
                                </p>

                            </div>

                        </div>

                        <span class="badge badge-primary badge-outline w-fit">
                            Usuário
                        </span>

                    </div>

                </div>


                {{-- Separador --}}
                <div class="px-6 sm:px-8">
                    <div class="h-px bg-violet-100"></div>
                </div>


                {{-- Relacionamentos --}}
                <div class="grid grid-cols-1 gap-6 p-6 sm:gap-8 sm:p-8 lg:grid-cols-2">


                    {{-- Perfil --}}
                    <div
                        class="overflow-hidden rounded-2xl border border-violet-100
                               bg-violet-50/40"
                    >

                        {{-- Título --}}
                        <div
                            class="flex items-center justify-between
                                   border-b border-violet-100 bg-violet-50
                                   px-5 py-4"
                        >

                            <h3 class="font-bold text-slate-800">
                                Perfil
                            </h3>

                            <span class="badge badge-primary badge-outline">
                                1 : 1
                            </span>

                        </div>


                        <div class="p-5">

                            @if ($user->profile)

                                <div class="space-y-5">

                                    <div>
                                        <p
                                            class="mb-1 text-xs font-semibold
                                                   uppercase tracking-wider
                                                   text-violet-500"
                                        >
                                            Bio
                                        </p>

                                        <p class="text-sm leading-relaxed text-slate-600">
                                            {{ $user->profile->bio }}
                                        </p>
                                    </div>


                                    <div class="h-px bg-violet-100"></div>


                                    <div>
                                        <p
                                            class="mb-1 text-xs font-semibold
                                                   uppercase tracking-wider
                                                   text-violet-500"
                                        >
                                            Telefone
                                        </p>

                                        <p class="text-sm text-slate-600">
                                            {{ $user->profile->telefone }}
                                        </p>
                                    </div>

                                </div>

                            @else

                                <div class="alert alert-warning">
                                    <span>
                                        Este usuário não possui perfil.
                                    </span>
                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- Posts --}}
                    <div
                        class="overflow-hidden rounded-2xl border border-violet-100
                               bg-violet-50/40"
                    >

                        {{-- Título --}}
                        <div
                            class="flex items-center justify-between
                                   border-b border-violet-100 bg-violet-50
                                   px-5 py-4"
                        >

                            <h3 class="font-bold text-slate-800">
                                Posts
                            </h3>

                            <span class="badge badge-secondary badge-outline">
                                1 : N
                            </span>

                        </div>


                        <div class="p-5">

                            @forelse ($user->posts as $post)

                                <article
                                    class="rounded-xl border border-violet-100
                                           bg-white p-5 shadow-sm
                                           transition-all duration-200
                                           hover:-translate-y-0.5 hover:shadow-md"
                                >

                                    <h4
                                        class="text-lg font-bold text-slate-800"
                                    >
                                        {{ $post->titulo }}
                                    </h4>

                                    <p
                                        class="mt-2 text-sm leading-relaxed
                                               text-slate-500"
                                    >
                                        {{ $post->conteudo }}
                                    </p>


                                    {{-- Tags --}}
                                    <div class="mt-5">

                                        <div
                                            class="mb-2 flex flex-wrap
                                                   items-center gap-2"
                                        >

                                            <span
                                                class="text-xs font-semibold
                                                       uppercase tracking-wider
                                                       text-violet-500"
                                            >
                                                Tags
                                            </span>

                                            <span
                                                class="badge badge-outline badge-sm"
                                            >
                                                N : M
                                            </span>

                                        </div>


                                        <div class="flex flex-wrap gap-2">

                                            @forelse ($post->tags as $tag)

                                                <span
                                                    class="badge border-violet-200
                                                           bg-violet-50
                                                           text-violet-700"
                                                >
                                                    {{ $tag->nome }}
                                                </span>

                                            @empty

                                                <span
                                                    class="text-sm italic
                                                           text-slate-400"
                                                >
                                                    Sem tags
                                                </span>

                                            @endforelse

                                        </div>

                                    </div>

                                </article>

                            @empty

                                <div class="alert alert-info">
                                    <span>
                                        Este usuário não possui posts.
                                    </span>
                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>

            </section>

        @empty

            {{-- Nenhum usuário --}}
            <section
                class="rounded-3xl border border-violet-100 bg-white
                       px-6 py-16 text-center shadow-sm sm:px-10"
            >

                <div class="mx-auto max-w-md">

                    <div
                        class="mx-auto mb-6 flex h-16 w-16 items-center
                               justify-center rounded-2xl bg-violet-100
                               text-primary"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-8 w-8"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.8"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 7h16M4 12h16M4 17h10"
                            />
                        </svg>
                    </div>

                    <h2 class="text-2xl font-bold text-slate-800">
                        Nenhum usuário encontrado
                    </h2>

                    <p class="mt-3 leading-relaxed text-slate-500">
                        Gere alguns dados de teste para visualizar
                        os relacionamentos.
                    </p>

                    <a
                        href="/teste/gerar"
                        class="btn btn-primary mt-6 rounded-xl px-6
                               shadow-md shadow-primary/20
                               transition-all duration-200
                               hover:-translate-y-0.5 hover:shadow-lg"
                    >
                        Gerar dados de teste
                    </a>

                </div>

            </section>

        @endforelse


        {{-- Rodapé --}}
        <footer class="mt-10 pb-4 text-center">

            <p class="text-sm text-slate-400">
                Laravel ORM Relationships
            </p>

        </footer>

    </main>

</body>

</html>
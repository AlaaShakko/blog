<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 ">
            <x-panel>
            <h1 class="text-center font-bold text-xl"> LOG IN </h1>

                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    {{--EMAIL INPUT--}}
                    <x-form.input name="email" type="email"></x-form.input>

                    {{--PASSWORD--}}
                    <x-form.input name="password" type="password"></x-form.input>

                    <div class="mb-6">
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                            Log In
                        </button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>

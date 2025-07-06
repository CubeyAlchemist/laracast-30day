<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>

    <form method="POST" action="/login">
        <!-- csrf expands to hidden input for validation token used to prevent some malicious mitm attacks
            Will return an error (419 - Page Expired) if tokens do not match or are missing -->
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field> <!-- email input -->
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" required/>
                            <x-form-error name="email"/>
                        </div>
                    </x-form-field>
                    <x-form-field> <!-- password input -->
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" required/>
                            <x-form-error name="password"/>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Log In</x-form-button>
        </div>
    </form>

</x-layout>
<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/register">
        <!-- csrf expands to hidden input for validation token used to prevent some malicious mitm attacks
            Will return an error (419 - Page Expired) if tokens do not match or are missing -->
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field> <!-- fisrt_name input -->
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="first_name" id="first_name" required/>
                            <x-form-error name="first_name"/>
                        </div>
                    </x-form-field>
                    <x-form-field> <!-- last_name input -->
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="text" name="last_name" id="last_name" required/>
                            <x-form-error name="last_name"/>
                        </div>
                    </x-form-field>
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
                    <x-form-field> <!-- confirm password input -->
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input type="password" name="password_confirmation" id="password_confirmation" required/>
                            <x-form-error name="password_confirmation"/>
                        </div>
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button>Register</x-form-button>
        </div>
    </form>

</x-layout>
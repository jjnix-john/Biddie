<x-guest-layout>
    <div class="biddie-auth-bg">
        <div class="biddie-auth-overlay">
            <div class="biddie-auth-card">

                <!-- Biddie Branding -->
                <div class="mb-6 text-center">
                    <div class="biddie-logo">Biddie</div>
                    <div class="biddie-tagline">
                        Create your account and start bidding today.
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Full Name -->
                    <div>
                        <x-input-label for="name" value="Full Name" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" placeholder="Juan Dela Cruz" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" value="Email Address" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autocomplete="username" placeholder="you@biddie.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" placeholder="Minimum 8 characters" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" value="Confirm Password" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Re-enter your password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-6">
                        <a class="auth-link" href="{{ route('login') }}">
                            Already have a Biddie account?
                        </a>

                        <x-primary-button class="w-full sm:w-auto">
                            Create Account
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>
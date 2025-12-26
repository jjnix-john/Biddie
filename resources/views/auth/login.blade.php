<x-guest-layout>
    <div class="biddie-auth-bg">
        <div class="biddie-auth-overlay">
            <div class="biddie-auth-card">

                <!-- Branding -->
                <div class="mb-6">
                    <div class="biddie-logo">Biddie</div>
                    <div class="biddie-tagline">
                        Bid smart. Trade fast. Win more.
                    </div>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" value="Email Address" />
                        <x-text-input
                            id="email"
                            class="block mt-1 w-full"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            placeholder="you@biddie.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" value="Password" />
                        <x-text-input
                            id="password"
                            class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember -->
                    <div class="flex items-center mt-4">
                        <input id="remember_me" type="checkbox" class="rounded text-indigo-600">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">
                            Keep me signed in
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-6">
                        <a class="auth-link" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>

                        <x-primary-button>
                            Log in
                        </x-primary-button>
                    </div>
                </form>

                <p class="mt-6 text-center text-sm text-gray-600">
                    New to Biddie?
                    <a href="{{ route('register') }}" class="auth-link">
                        Create an account
                    </a>
                </p>

            </div>
        </div>
    </div>
</x-guest-layout>

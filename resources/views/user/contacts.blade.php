@extends('layouts.main')

@section('title', 'Contact Us')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-10 max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-white mb-6">Contact Us</h1>
            <p class="text-gray-200 leading-relaxed mb-6">
                For any inquiries or support, please reach out using one of the options below.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6">
                    <h2 class="text-xl font-semibold text-white mb-4">Support</h2>
                    <ul class="text-gray-200 space-y-3">
                        <li>
                            <span class="font-semibold">Email:</span>
                            <a href="mailto:contact@biddie.com"
                                class="text-indigo-200 hover:text-white">contact@biddie.com</a>
                        </li>
                        <li>
                            <span class="font-semibold">Phone:</span>
                            <span>+1 (555) 123-4567</span>
                        </li>
                        <li>
                            <span class="font-semibold">Address:</span>
                            <span>123 Biddie Street, Auction City, USA</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6">
                    <h2 class="text-xl font-semibold text-white mb-4">Send a message</h2>
                    <form class="space-y-4">
                        <input type="text" placeholder="Your name"
                            class="input input-bordered w-full bg-white/20 text-white" />
                        <input type="email" placeholder="Your email"
                            class="input input-bordered w-full bg-white/20 text-white" />
                        <textarea placeholder="Your message"
                            class="textarea textarea-bordered w-full bg-white/20 text-white" rows="4"></textarea>
                        <button type="submit" class="btn btn-primary w-full">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
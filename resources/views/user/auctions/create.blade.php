@extends('layouts.main')

@section('title', 'Create Auction Item')

@section('content')
    <section class="mt-10 px-6 lg:px-8">
        <div class="overlay rounded-3xl p-10 max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-white mb-6">Add Your Item for Auction</h1>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action="{{ route('auctions.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="label"><span class="label-text text-white">Title</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="input input-bordered w-full bg-white/20 text-white" />
                    @error('title')<p class="text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="label"><span class="label-text text-white">Description</span></label>
                    <textarea name="description" rows="4"
                        class="textarea textarea-bordered w-full bg-white/20 text-white">{{ old('description') }}</textarea>
                    @error('description')<p class="text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="label"><span class="label-text text-white">Category</span></label>
                    <select name="category_id" required class="select select-bordered w-full bg-white/20 text-white">
                        <option value="">Choose category</option>
                        @foreach(App\Models\Categories::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<p class="text-red-400">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="label"><span class="label-text text-white">Starting Price</span></label>
                    <input type="number" name="starting_price" value="{{ old('starting_price') }}" min="0.01" step="0.01"
                        required class="input input-bordered w-full bg-white/20 text-white" />
                    @error('starting_price')<p class="text-red-400">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="label"><span class="label-text text-white">Start Date</span></label>
                        <input type="datetime-local" name="start_time" value="{{ old('start_time') }}"
                            class="input input-bordered w-full bg-white/20 text-white" />
                        @error('start_time')<p class="text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="label"><span class="label-text text-white">End Date</span></label>
                        <input type="datetime-local" name="end_time" value="{{ old('end_time') }}"
                            class="input input-bordered w-full bg-white/20 text-white" />
                        @error('end_time')<p class="text-red-400">{{ $message }}</p>@enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-full">List Item</button>
            </form>
        </div>
    </section>
@endsection
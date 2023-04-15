@auth
                <x-panel>
                    <form action="/posts/{{$post->slug}}/comments" method="post" >
                        @csrf
                        <header class="flex items-center">
                            <img src="https://i.pravatar.cc/40?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
                            <h2 class="ml-4">
                                Want to participate?
                            </h2>
                        </header>
                        <div class="mt-4">
                            <textarea name="body" id="" cols="30" rows="5" class="w-full text-sm focus:outline-none focus:ring" placeholder="Quick, thing of something to say!"></textarea>
                        </div>
                        @error('body')
                            <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">{{$message}}</span>
                        @enderror
                        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                            <x-submit-button>
                                Post
                            </x-submit-button>
                        </div>
                    </form>
                </x-panel>
            @endauth

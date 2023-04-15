
<footer class="w-full border-t bg-white pb-12">

    <div class="w-full container mx-auto flex flex-col items-center">
        <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
            <a href="#" class="uppercase px-3">About Us</a>
            <a href="#" class="uppercase px-3">Privacy Policy</a>
            <a href="#" class="uppercase px-3">Terms & Conditions</a>
            <a href="#" class="uppercase px-3">Contact Us</a>
        </div>
        {{-- Subscribe --}}
        <!-- start -->
        <div class="container flex flex-col justify-center items-center mx-auto my-8 py-16">

            <!-- Card -->
            <div class="bg-white -mt-24 shadow-md rounded-lg overflow-hidden">
                <div class="items-center justify-between py-10 px-5 bg-white shadow-2xl rounded-lg mx-auto text-center">
                    <div class="px-2 -mt-6">
                        <div class="text-center">
                            <h1 class="font-normal text-3xl text-grey-800 font-medium leading-loose my-3 w-full">Get the
                                Latest Information</h1>
                            <div class="w-full text-center">
                                <form action="/newsletter" method="POST">
                                    @csrf
                                    <div class="max-w-sm mx-auto p-1 pr-0 flex items-center">
                                        <input type="email" name="email" placeholder="yourmail@example.com"
                                            class="flex-1 appearance-none rounded shadow p-3 text-grey-dark mr-2 focus:outline-none">
                                        <x-submit-button>
                                            Subscribe
                                        </x-submit-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @error('email')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end -->
        <div class="uppercase pb-6">&copy; made with 💖 by ahmad sabri & mohamed hannan & mohamed mahfouz</div>
    </div>
</footer>

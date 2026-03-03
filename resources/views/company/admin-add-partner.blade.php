<x-layout-admin>

    <div class="flex justify-center mb-20">

        <div class="w-5/6">

            <a href="{{ url('/all-partners') }}" class="mt-5 ml-5 inline-block border-2 font-bold 
border-black text-white bg-black py-1 px-2 rounded-xl uppercase hover:text-white 
shadow-lg">
                <i class="fa-solid fa-arrow-left"></i> Back to all Partners
            </a>

            <!-- PARTNER ADD FORM -->
            <div class="m-5">

                <header class="text-center mt-10 mb-5">

                    <h1 class="text-3xl font-bold uppercase">
                        Partner Information
                    </h1>

                </header>

                <div class="flex justify-center">

                    <div class="w-3/4 border-black border-4 rounded-2xl text-black overflow-hidden 
                flex flex-col mb-10 p-3">

                        <div class="text-2xl font-bold text-center border-b-2 text-center mb-10 p-3">

                            General Information

                        </div>

                        <form method="POST" action="{{ url('/all-partners') }}">

                            @csrf
                            <div>

                                <ul class="border border-gray-200 mb-5 p-5">

                                    <li class="mb-5 p-3">
                                        <label for="partner_name" class="inline-block text-lg mb-2 font-bold">
                                            Partner Name
                                        </label>

                                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                            name="partner_name" value="{{old('partner_name')}}" />

                                        @error('partner_name')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </li>

                                    <li class="mb-5 p-3">
                                        <label for="email" class="inline-block text-lg mb-2 font-bold">
                                            Partner Email
                                        </label>

                                        <input type="email" class="border border-gray-200 rounded p-2 w-full"
                                            name="email" value="{{old('email')}}" />

                                        @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </li>

                                    <li class="mb-5 p-3">
                                        <label for="partner_address" class="inline-block text-lg mb-2 font-bold">
                                            Partner Address
                                        </label>

                                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                            name="partner_address" value="{{old('partner_address')}}" />

                                        @error('partner_address')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror
                                    </li>

                                    <li class="mb-5 p-3">
                                        <label for="partner_nationality" class="inline-block text-lg mb-2 font-bold">
                                            Partner Location
                                        </label>

                                        <select name="partner_nationality" id="partner_nationality"
                                            class="border border-gray-200 rounded p-2 w-full" required>

                                            <option value="">-- Select Location --</option>
                                            <option value="Myanmar" @selected(old('partner_nationality')=='Myanmar' )>
                                                Myanmar
                                            </option>
                                            <option value="Philippines"
                                                @selected(old('partner_nationality')=='Philippines' )>
                                                Philippines</option>
                                            <option value="Thailand" @selected(old('partner_nationality')=='Thailand' )>
                                                Thailand
                                            </option>
                                            <option value="Vietnam" @selected(old('partner_nationality')=='Vietnam' )>
                                                Vietnam
                                            </option>
                                            <option value="Indonesia" @selected(old('partner_nationality')=='Indonesia'
                                                )>
                                                Indonesia
                                            </option>
                                            <option value="Cambodia" @selected(old('partner_nationality')=='Cambodia' )>
                                                Cambodia
                                            </option>
                                            <option value="Laos" @selected(old('partner_nationality')=='Laos' )>Laos
                                            </option>

                                        </select>
                                    </li>

                                    <li class="mb-5 p-3">
                                        <label for="password" class="inline-block text-lg mb-2 font-bold">
                                            Partner Password
                                        </label>

                                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                                            name="password" />

                                        @error('password')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                        @enderror

                                    </li>

                                </ul>

                            </div>

                            <div class="flex justify-center">
                                <button class="transition duration-300 bg-blue-700 text-white rounded py-2 px-4 
                                hover:bg-blue-500">
                                    Register
                                </button>
                            </div>


                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layout-admin>

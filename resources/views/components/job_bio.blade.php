<section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Bio Data</h2>


    <form action="{{ route('bio_job_post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="photo">Passport Photo</label>
                <input type="file" name="photo"
                    class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300 @error('lgco') border-red-500 @enderror" />
                <sup style="color: red">*A clear passport</sup>
                @error('photo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="surname">Surname</label>
                <input id="surname" name="surname" value="{{ old('surname') }}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('surname') border-red-500 @enderror">
                @error('surname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="first_name">First Name</label>
                <input id="first_name" name="first_name" value="{{ old('first_name') }}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('first_name') border-red-500 @enderror">
                @error('first_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="other_name">Other Name</label>
                <input id="other_name" name="other_name" value="{{ old('other_name') }}" type="text"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('other_name') border-red-500 @enderror">
                @error('other_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="phone">Phone number</label>
                <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('phone') border-red-500 @enderror">
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="cos">Course of study</label>
                <input id="cos" name="cos" type="text" value="{{ old('cos') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('cos') border-red-500 @enderror">
                @error('cos')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="lga">Local Government</label>
                <select id="lga" name="lga"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('cw') border-red-500 @enderror">
                    <option value="">Select a local government</option>

                    <option value="1">
                        Makurdi
                    </option>
                    <option value="2">
                        Guma
                    </option>
                </select>
                @error('lga')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="cw">Council ward</label>
                <input id="cw" name="cw" type="text" value="{{ old('cw') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('cw') border-red-500 @enderror">
                @error('cw')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div>
                <label class="text-gray-700 dark:text-gray-200" for="fbp">Facebook profile</label>
                <input id="fbp" name="fbp" type="text" value="{{ old('fbp') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('fbp') border-red-500 @enderror">
                @error('fbp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="lkp">LinkedIn profile</label>
                <input id="lkp" name="lkp" type="text" value="{{ old('lkp') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('lkp') border-red-500 @enderror">
                @error('lkp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="xp">X profile</label>
                <input id="xp" name="xp" type="text" value="{{ old('xp') }}"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring @error('xp') border-red-500 @enderror">
                @error('xp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="ucv">Updated Resumè/CV</label>
                <input type="file" name="ucv" id="ucv"
                    class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300 @error('ucv') border-red-500 @enderror">
                @error('ucv')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX. Max size: 5MB</p>
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="passport">ID</label>
                <input type="file" name="passport" id="passport"
                    class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300 @error('passport') border-red-500 @enderror">
                @error('passport')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-gray-500 mt-1">Accepted formats: JPG, JPEG, PNG. Max size: 2MB. International
                    Passport preferred.</p>
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="lgco">Local Government Certificate of
                    Origin</label>
                <input type="file" name="lgco" id="lgco"
                    class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300 @error('lgco') border-red-500 @enderror">
                @error('lgco')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, JPG, JPEG, PNG. Max size: 3MB. Issued by
                    your respective local government area.</p>
            </div>
        </div>
        <br>
        <x-button>
            Save
        </x-button>
    </form>
</section>

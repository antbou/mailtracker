

<div class="mt-10 sm:mt-0">
    <div class="md:grid md:grid-cols-5 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-start-2 col-span-3">

            <form action="{{ route('tracker.update', ['tracker' => $tracker]) }}" method="POST">
                @csrf
                @method('PUT')
              <div class="shadow overflow-hidden sm:rounded-md">

                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <div class="px-4 sm:px-0">
                          <h3 class="text-lg font-medium leading-6 text-gray-900">Créer votre tracker !</h3>
                          <p class="mt-1 text-sm text-gray-600">
                            Entrer les informations suivantes afin de mieux retrouver votre tracker !
                          </p>
                        </div>
                      </div>
                    <div class="col-span-6 sm:col-span-6">
                      <label for="object" class="block text-sm font-medium text-gray-700">Objet</label>
                      <input type="text" value="{{$tracker->title}}" name="object" id="object" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      @error('object')
                        <div class="block text-sm font-medium text-red-400">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                      <label for="email-address" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                      <input type="text" value="{{$tracker->email}}" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      @error('email-address')
                        <div class="block text-sm font-medium text-red-400">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Enregistrer
                  </button>
                </div>
              </div>
            </form>
          </div>

    </div>
</div>



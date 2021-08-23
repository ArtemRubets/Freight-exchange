@extends('layouts/app')

@section('content')
    <div class="container mx-auto px-32 my-3">
        <h1 class="font-serif text-2xl">{{ env('APP_NAME') }}</h1>

        <button
            class="bg-blue-500 text-white font-bold uppercase text-sm my-3 px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150"
            type="button" onclick="toggleModal('modal-id')">
            Додати
        </button>
        <div class="@if(!$errors->any()) hidden @endif overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
            id="modal-id">
            <div class="relative w-auto my-6 mx-auto max-w-3xl">
                <!--content-->
                <div
                    class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                        <h3 class="text-3xl font-semibold">
                            Додати маршрут
                        </h3>
                        <button
                            class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                            onclick="toggleModal('modal-id')">
          <span
              class="p-1 ml-auto bg-transparent border-0 text-black float-right text-3xl leading-none font-semibold outline-none focus:outline-none">
            ×
          </span>
                        </button>
                    </div>
                    <!--body-->
                    <form action="{{ route('create-load') }}" method="POST">
                        @csrf
                        <div class="relative p-6 flex-auto">
                            <div class="my-4 text-blueGray-500 text-lg leading-relaxed">
                                <div class="mt-10 sm:mt-0">
                                    <div class="md:grid md:grid-cols-2 md:gap-6">
                                        <div class="mt-5 md:mt-0 md:col-span-2">

                                            <div>
                                                <div class="px-4 py-5 bg-white sm:p-6">
                                                    <div class="grid grid-cols-6 gap-6">
                                                        <div class="col-span-12">
                                                            @error('load_name')
                                                            <div class="text-xs text-red-600">
                                                                <ul>
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                            @enderror
                                                            <label for="load-name"
                                                                   class="block text-sm font-medium text-gray-700">Назва</label>
                                                            <input type="text" name="load_name" id="load-name"
                                                                   value="{{ old('load_name') }}"
                                                                   class="mt-1 p-2 block border shadow-sm w-full sm:text-sm rounded-md"/>
                                                        </div>

                                                        <div class="col-span-6">
                                                            @error('from')
                                                            <div class="text-xs text-red-600">
                                                                <ul>
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                            @enderror
                                                            <label for="from"
                                                                   class="block text-sm font-medium text-gray-700">Звідки</label>
                                                            <input type="text" name="from" id="from"
                                                                   value="{{ old('from') }}"
                                                                   class="mt-1 p-2 block w-full border shadow-sm sm:text-sm rounded-md"/>
                                                        </div>

                                                        <div class="col-span-6">
                                                            @error('to')
                                                            <div class="text-xs text-red-600">
                                                                <ul>
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                            @enderror
                                                            <label for="to"
                                                                   class="block text-sm font-medium text-gray-700">Куди</label>
                                                            <input type="text" name="to" id="to" value="{{ old('to') }}"
                                                                   class="mt-1 p-2 block w-full border shadow-sm sm:text-sm rounded-md"/>
                                                        </div>

                                                        <div class="col-span-6">
                                                            @error('date_picker')
                                                            <div class="text-xs text-red-600">
                                                                <ul>
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                            @enderror
                                                            <label for="date-picker"
                                                                   class="block text-sm font-medium text-gray-700">Дата:</label>

                                                            <input type="date" id="date-picker"
                                                                   class="mt-1 p-2 block w-full border shadow-sm sm:text-sm rounded-md"
                                                                   name="date_picker"
                                                                   value="{{Carbon\Carbon::today()->toDateString()}}"
                                                                   min="{{Carbon\Carbon::today()->toDateString()}}"
                                                                   max="{{Carbon\Carbon::now()->addMonth(3)->toDateString()}}">
                                                        </div>

                                                        <div class="col-span-6">
                                                            @error('weight')
                                                            <div class="text-xs text-red-600">
                                                                <ul>
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                            </div>
                                                            @enderror
                                                            <label for="weight"
                                                                   class="block text-sm font-medium text-gray-700">Вага</label>
                                                            <input type="text" name="weight" id="weight"
                                                                   value="{{ old('weight') }}"
                                                                   class="mt-1 p-2 block w-full border shadow-sm sm:text-sm rounded-md"/>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--footer-->
                        <div
                            class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                            <button
                                class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button" onclick="toggleModal('modal-id')">
                                Закрити
                            </button>
                            <button
                                class="text-white bg-green-500 hover:bg-green-600 rounded font-bold uppercase px-6 py-3 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="submit">
                                Додати
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="@if(!$errors->any()) hidden @endif opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

        @if(session()->has('message'))
            <div id="alert"
                class="text-white px-6 py-4 border-0 rounded relative mb-4 @if(session('status') == true) bg-green-500 @else bg-red-500 @endif">
            <span class="text-xl inline-block mr-5 align-middle">
                @if(session('status') == true)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
</svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd"
        d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z"
        clip-rule="evenodd"/>
</svg>
                @endif
            </span>
                <span class="inline-block align-middle mr-8">
                <b class="capitalize">{{ session('message') }}</b>
            </span>
                <button onclick="closeAlert()"
                    class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                    <span id="close">×</span>
                </button>
            </div>
        @endif

        <p>Всього: {{ $loads->count() }} вантажів</p>


        <div class="shadow-md my-3">
            @foreach($loads as $load)
                <div class="tab w-full overflow-hidden border-t">
                    <input class="absolute opacity-0" id="tab-single-{{ $loop->iteration }}" type="radio" name="tabs2">
                    <label class="block leading-normal cursor-pointer" for="tab-single-{{ $loop->iteration }}">
                        <table class="w-full">
                            <tbody>
                            <tr class="text-sm text-gray-600">
                                <td class="p-2 w-1/4">{{ $load->point->date }}</td>
                                <td class="p-2 w-1/4">{{ $load->point->from }}-{{ $load->point->to }}</td>
                                <td class="p-2 w-1/4">{{ $load->name }}</td>
                                <td class="p-2 w-1/4">{{ $load->weight }} т</td>
                            </tr>
                            </tbody>
                        </table>
                    </label>
                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto,
                            explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta
                            molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
                    </div>
                </div>
            @endforeach

        </div>


    </div>

    @push('scripts')
        <script>
        /* Optional Javascript to close the radio button version by clicking it again */
        var myRadios = document.getElementsByName('tabs2');
        var setCheck;
        var x = 0;
        for (x = 0; x < myRadios.length; x++) {
            myRadios[x].onclick = function () {
                if (setCheck != this) {
                    setCheck = this;
                } else {
                    this.checked = false;
                    setCheck = null;
                }
            };
        }

        function closeAlert(){
            let alert = document.getElementById('alert');
            alert.style.display = 'none';
        }

        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>
    @endpush

@endsection

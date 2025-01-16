@extends('layouts.app')

@section('content')
<div class="relative md:ml-52 bg-blueGray-50">
    <nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
    <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold">List Pengaduan</a>
        <ul class="flex-col md:flex-row list-none items-center hidden md:flex">
            <p class="text-white mr-4 text-sm">halo, {{Auth::user()->name}}</p>
            <a class="text-blueGray-500 block" href="#" onclick="openDropdown(event,'user-dropdown')">
                <div class="items-center flex">
                    <span
                        class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                        <img alt="..." class="w-full rounded-full align-middle border-none shadow-lg h-full"
                            src="{{asset('img/profile_default.png')}}" />
                    </span>
                </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
                style="min-width: 12rem;" id="user-dropdown">

                {{-- <div class="h-0 my-2 border border-solid border-blueGray-100"></div> --}}

                <a class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </ul>
    </div>
</nav>

<!-- Header -->
<div class="relative bg-blue-900 md:pt-32 pb-10 pt-12">
    <div class="px-4 md:px-10 mx-auto w-full">
        <div>
        </div>
    </div>
</div>

<div class="px-4 md:px-10 mx-auto w-full -m-24">
    <div class="flex flex-wrap mt-4">
        <div class="w-full mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg">
                <div class="flex gap-6">
                    <input type="text" class="rounded w-full md:w-48 lg:w-56  ml-5 mt-5  " id="Input" onkeyup="myFunction()" placeholder="Search for Masyarakat" title="Type Name or NIK or email" >
                    {{-- <a class="bg-blue-900 mt-5 text-white p-3 rounded-lg ml-auto mr-5" href="{{Route('admin.masyarakat.create')}}">Tambah Masyarakat</a> --}}
                </div>

                <div class="block w-full overflow-x-auto rounded-lg px-2">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-3/12">
                                    Name
                                </th>
                                <th class="px-2 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-3/12">
                                    NIK
                                </th>
                                <th class=" bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-2/12">
                                    Nomor Telpon
                                </th>
                                <th class="px-5 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-2/12">
                                    Email
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-1/12">
                                    Role
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left w-1/12">
                                    
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                {{-- @if ($pengaduan) --}}
                <div class="block w-full overflow-x-auto overflow-y-scroll max-h-[32rem] rounded-lg p-2">
                    <!-- Projects table -->
                    <table class="items-center w-full bg-transparent border-collapse" id="Table">
                        <div>
                            <tbody class="overflow-y-scroll">
                                @foreach ($masyarakat as $item)
                                <tr class="">
                                    <td class="border-t-2 pl-4 align-middle text-sm whitespace-nowrap py-3 text-blue-900 font-medium w-3/12">
                                        {{$item->name}} <p class="hidden">{{$item->nik}}{{$item->email}}</p>
                                    </td>
                                    <td class="border-t-2 pl-2 align-middle text-sm whitespace-nowrap py-3 font-mediumtext-left w-3/12 truncate">
                                        {{$item->nik}}
                                    </td>
                                    <td class="border-t-2 pr-5 align-middle text-sm whitespace-nowrap py-3 text-left w-2/12">
                                        {{$item->telp}}
                                    </td>
                                    <td class="border-t-2 pl-6 align-middle text-sm whitespace-nowrap py-3 text-left w-2/12 ">
                                        {{$item->email}}
                                    </td>
                                    <td class="border-t-2 px-6 align-middle text-sm whitespace-nowrap py-3 text-left w-1/12">
                                        {{$item->role}}
                                    </td>
                                    <td class="border-t-2 px-6 align-middle text-sm whitespace-nowrap py-3 text-left w-1/12 flex gap-2">
                                        <a href="{{route('admin.petugas.edit', $item->id)}}" class="text-xs bg-blue-900 p-2 text-white rounded-md"><i class="fas fa-pencil-alt"></i></a>
                                        {{-- <a href="{{route('admin.petugas.show', $item->id)}}" class="text-xs bg-blue-900 p-2 text-white rounded-md"><i class="fas fa-eye"></i></a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
                </div>
                {{-- @endif --}}
            </div>
        </div>

    </div>
    {{-- <div class="block py-4 pt-auto">
        <div class="container mx-auto px-4">
            <hr class="mb-4 border-b-1 border-blueGray-200" />
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4">
                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                        Copyright © <span id="javascript-date"></span>
                        <a href="https://www.creative-tim.com"
                            class="text-blueGray-500 hover:text-blueGray-700 text-sm font-semibold py-1">
                            Creative Tim
                        </a>
                    </div>
                </div>
                <div class="w-full md:w-8/12 px-4">
                    <ul class="flex flex-wrap list-none md:justify-end  justify-center">
                        <li>
                            <a href="https://www.creative-tim.com"
                                class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/presentation"
                                class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com"
                                class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/creativetimofficial/tailwind-starter-kit/blob/main/LICENSE.md"
                                class="text-blueGray-600 hover:text-blueGray-800 text-sm font-semibold block py-1 px-3">
                                MIT License
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
</div>
</div>
@endsection

@section('js')
<script src="{{ asset('view/searchFilter.js') }}"></script>
@endsection
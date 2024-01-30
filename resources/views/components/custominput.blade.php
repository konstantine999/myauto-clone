<form action="{{route('car.search')}}" method="POST">
    @csrf
    <input name="search" type="text" id="search_input" placeholder="ძიება" class="w-[326px] bg-gray-100 border-gray-300 border-[1px] rounded-xl pl-[20px]">
    <button type="submit">search</button>
</form>

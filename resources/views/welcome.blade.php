<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>YourAuto</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased bg-gray-100">
        <div class="flex justify-center w-full gap-[40px] mt-10 flex-wrap">
            @foreach ($cars as $car)
                <div class="flex-col w-[229px] bg-white rounded-2xl cursor-pointer">
                    <div class="w-full h-[171.5px]">
                        <img src="https://static.my.ge/myauto/photos/0/7/8/2/0/large/100028701_1.jpg?v=6" alt="Toyota RAV 4" class="w-full h-full rounded-t-3xl object-cover">
                    </div>
                    <div class="w-3/4 mx-auto">
                            <p class="text-gray-400 text-[12px] pb-2 mt-6">თბილისი</p>
                            <div class="mb-4">
                                <span>{{ $car->manufacture_year }} - </span>
                                <span>{{ $car->manufacturer->name }}</span>
                                <span>{{ $car->model->name }}</span>
                            </div>
{{--                        <p>{{ $car->transmission->name }}</p>--}}
                             <p>{{ $car->price }} $</p>
{{--                        <p>{{ $car->color->name }}</p>--}}
{{--                        <p>{{ $car->interiorMaterial->name }}</p>--}}
                            <div class="bg-gray-200 h-[1px] mt-3"></div>
                            <div class="mt-3 pb-4 flex gap-2">
                                <span class="bg-gray-200 text-[12px] rounded-xl px-2 py-1">{{ $car->category->name }}</span>
                                <span class="bg-gray-200 text-[12px] rounded-xl px-2 py-1">{{ $car->fuelType->name }}</span>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>

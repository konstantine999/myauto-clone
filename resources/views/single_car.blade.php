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
    <div class="max-w-[700px] mx-auto mt-[100px]">
        <div class="flex gap-[7px] items-center">
            <span class="text-black font-medium text-[24px]">{{ $car->manufacturer->name }}</span>
            <span class="text-black font-medium text-[24px]">{{ $car->model->name  }}</span>
            <span class="ml-12px text-gray-500 text-[24px]">{{ $car->manufacture_year }}</span>
        </div>
        <div class="flex items-center mt-[10px]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-[14px] h-[14px] mr-8px"><mask id="a"><circle cx="256" cy="256" r="256" fill="#fff"></circle></mask><g mask="url(#a)"><path fill="#fff" d="M0 0h222.6l31 23.4L289.4 0H512v222.6l-21.5 31 21.5 35.8V512H289.4l-34.2-20.5-32.6 20.5H0V289.4l22.7-32.6L0 222.6z"></path><path fill="#d80027" d="M222.6 0v222.6H0v66.8h222.6V512h66.8V289.4H512v-66.8H289.4V0z"></path><path fill="#d80027" d="M155.8 122.4V89h-33.4v33.4H89v33.4h33.4v33.4h33.4v-33.4h33.4v-33.4zm233.8 0V89h-33.4v33.4h-33.4v33.4h33.4v33.4h33.4v-33.4H423v-33.4zM155.8 356.2v-33.4h-33.4v33.4H89v33.4h33.4V423h33.4v-33.4h33.4v-33.4zm233.8 0v-33.4h-33.4v33.4h-33.4v33.4h33.4V423h33.4v-33.4H423v-33.4z"></path></g></svg>
            <span class="ml-12px text-gray-500 text-[14px] ml-[15px]">თბილისი</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" class="ml-8" height="16" viewBox="0 0 16 16"><path fill="#7a8290" d="M-76.17 1180.835a10.188 10.188 0 0 1-1.773-2.738.8.8 0 0 1 0-.594 10.19 10.19 0 0 1 1.773-2.738A7.893 7.893 0 0 1-70.2 1172a7.893 7.893 0 0 1 5.97 2.766 10.19 10.19 0 0 1 1.773 2.738.8.8 0 0 1 0 .594 10.188 10.188 0 0 1-1.773 2.738 7.893 7.893 0 0 1-5.97 2.765 7.892 7.892 0 0 1-5.97-2.766zm1.223-5.037a9.084 9.084 0 0 0-1.372 2 9.072 9.072 0 0 0 1.372 2A6.244 6.244 0 0 0-70.2 1182c3.734 0 5.62-3.2 6.119-4.2a9.037 9.037 0 0 0-1.372-2 6.245 6.245 0 0 0-4.747-2.2 6.245 6.245 0 0 0-4.747 2.2zm1.947 2a2.8 2.8 0 0 1 2.8-2.8 2.8 2.8 0 0 1 2.8 2.8 2.8 2.8 0 0 1-2.8 2.8 2.8 2.8 0 0 1-2.8-2.798zm1.6 0a1.2 1.2 0 0 0 1.2 1.2 1.2 1.2 0 0 0 1.2-1.2 1.2 1.2 0 0 0-1.2-1.2 1.2 1.2 0 0 0-1.2 1.202z" transform="translate(-542 -324) translate(620.2 -845.8)"></path></svg>
            <span class="ml-12px text-gray-500 text-[14px] ml-[7px]">562 ნახვა</span>
        </div>
        <div class="h-[517px] mt-[30px]">
            <img src="{{$carMedia}}" alt="Toyota RAV 4" class="w-full h-full rounded-3xl object-cover">
        </div>
        <div class="min-h-[200px] mt-[40px] bg-white rounded-2xl cursor-pointer">
            <h4 class="text-gray-800 font-medium font-size-14 font-size-sm-16 pt-4 pl-4">დეტალური აღწერა</h4>
            <div class="bg-gray-200 h-[1px] mt-3"></div>
            <p class="pt-4 pl-4 text-[14px] text-gray-500">{{ $car->description }}</p>
        </div>
        <div class="min-h-[200px] mt-[40px] w-3/4 bg-white rounded-2xl cursor-pointer">
            <h4 class="text-gray-800 font-medium font-size-14 font-size-sm-16 pt-4 pl-4">ძირითადი პარამეტრები</h4>
            <div class="bg-gray-200 h-[1px] mt-3"></div>
            <div class="w-1/2">
                <div class="flex justify-between pt-4 pl-4">
                    <span class="text-[14px] text-gray-500">მწარმოებელი</span>
                    <span>{{ $car->manufacturer->name }}</span>
                </div>
                <div class="flex justify-between pt-4 pl-4">
                    <span class="text-[14px] text-gray-500">მოდელი</span>
                    <span>{{ $car->model->name }}</span>
                </div>
                <div class="flex justify-between pt-4 pl-4">
                    <span class="text-[14px] text-gray-500">წელი</span>
                    <span>{{ $car->manufacture_year }}</span>
                </div>
                <div class="flex justify-between pt-4 pl-4">
                    <span class="text-[14px] text-gray-500">კატეგორია</span>
                    <span>{{ $car->category->name }}</span>
                </div>
                <div class="flex justify-between pt-4 pl-4">
                    <span class="text-[14px] text-gray-500">გარბენი</span>
                    <span>{{ $car->mileage }} km</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

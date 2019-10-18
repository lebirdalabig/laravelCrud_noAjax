<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.template')
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Midterm CRUD
                </div>
                <div>
                    <a href="{{ url('/products') }}"><span style="font-size: 10vh;">Click Me!</span></a>
                </div>
            </div>
        </div>
    </body>
</html>
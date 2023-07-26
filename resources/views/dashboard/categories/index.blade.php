<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="{{ asset('build/noty/noty.css') }}">
    <script src="{{ asset('build/noty/noty.min.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"

    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
        @include('layouts.navigation')


    <div style="margin-left: 30%; margin-right: 30%; margin-top: 10%">
        @include('partial._session')
        <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>add</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#.</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>


                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn bti-sm btn-outline-secondary"><i class="fa fa-edit"></i> Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn bti-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

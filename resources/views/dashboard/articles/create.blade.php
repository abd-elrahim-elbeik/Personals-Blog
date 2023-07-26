<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>


    <div style="margin-left: 30%; margin-right: 30%; margin-top: 7%">
        @include('partial._errors')
        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputName"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Body</label>
                <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control image">
            </div>

            <div class="form-group">
                <img src="{{ asset('uploads/default.jpg') }}" style="width: 150px"
                    class="img-thumbnail image-preview" alt="">
            </div>

            <div class="form-group">
                <label>الأقسام</label>
                <select name="category_id" class="form-control">
                    <option value="">جميع الأقسام</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div><br>
            <label>التاق</label><br>
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input name="tags[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{ $tag->id }}">
                    <label class="form-check-label" for="inlineCheckbox1">{{ $tag->name }}</label>
                </div>
            @endforeach

            <br><br>



            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

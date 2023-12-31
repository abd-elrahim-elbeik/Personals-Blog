<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  </head>
  <body>


    <div style="margin-left: 30%; margin-right: 30%; margin-top: 15%">
        @include('partial._errors')
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input name="name" type="text" class="form-control" id="exampleInputEmail1" value="{{ $category->name }}" >
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>

          </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

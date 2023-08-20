 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 </head>
 <body>
    @if(session('success') != null)
       {{session('success')}}
    @endif
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            <form action="{{ url('/imageadd') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-sm-6 mb-3">
                  <label for="name" class="form-label">Image Title</label>
                  <input type="text" name="title" class="form-control" id="name"  placeholder="Type here..."/>

                </div>
                <div class="col-sm-6 mb-3">
                  <label for="name" class="form-label">Image Slug</label>
                  <input type="text" name="slug" class="form-control" id="name" placeholder="Type here..."/>

                </div>
                <div class="col-sm-6 mb-3 selectsearch">
                  <label for="category_id" class="form-label">Select Category</label>
                  <select name="category_id" id="category_id" class="selectpicker" data-live-search="true">
                        <option value="">Select a category</option>
                        <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                  </select>
                </div>

                <div class="col-sm-6 mb-3 selectsearch">
                  <label for="mainpost" class="form-label">Select Post</label>
                  <select name="mainpost" id="mainpost" class="selectpicker" data-live-search="true">
                      <option value="">Select a post</option>
                      <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                  </select>
                </div>
                <div class="col-sm-6 mb-3 selectsearch">
                  <label for="post_id" class="form-label">Select Multiple Tags</label>
                  <select name="post_id[]" id="post_id" class="selectpicker" data-live-search="true" multiple>

                      <option value="1">data1</option>
                      <option value="2">data2</option>
                      <option value="3">data3</option>
                      <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                        <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                        <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                        <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                        <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                        <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                        <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                        <option value="1">data1</option>
                        <option value="2">data2</option>
                        <option value="3">data3</option>
                  </select>
                  @error('post_id')
                      <div class="error">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-sm-6 mb-3">
                  <label for="name" class="form-label">Select Multiple Images</label>
                  <input class="form-control" name="images[]" type="file" id="formFile" multiple>

                </div>



                </div>

              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
 </body>
 </html>


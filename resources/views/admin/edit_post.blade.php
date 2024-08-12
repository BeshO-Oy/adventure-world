<!DOCTYPE html>
<html>
  <head>
  <base href="/public">
    @include('admin.css')

    <style type="text/css">
      .post_title{
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        padding: 30px;
        color: white;
        margin-top: 20px;
        margin-left: 20px;
      }

      .div_center{
        text-align: center;
        padding: 30px;
      }

      label
      {
        display: inline-block;
        /*  make all label start from the same position */
        format: left;
        width: 200px;
      }

      .update_btn{
        padding: 10px;
        background-color: green;
        color: white;
        border: 2px solid white;
        border-radius: 30px;
        text-align: center;
        width: 90px;
        cursor: pointer;
        font-size: 15px;
        font-weight: bold;
      }

        .update_btn:hover{
            background-color: black;
            color: white;
        }
    </style>


  </head>
  <body>

    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

        <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
        @endif

            <h1 class="post_title">Edit Post</h1>

            <form action="{{url('update_post',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="div_center">

            <div>

                <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">

                    <div>
                        <label>Post Title</label>
                        <input type="text" name="title" value="{{$post->title}}">
                    </div>

                    <div>
                        <label>Post Description</label>
                        <textarea  name="description" >{{$post->description}}</textarea>
                    </div>

                    <div>
                        <label>Old Image</label>
                        <img src="/postimage/{{$post->image}}" width="150px" height="120px">
                        <br><br>
                    </div>

                    <div>
                        <label>Update Image</label>
                        <input type="file" name="image" >
                    </div>
                    <br><br><br>

                    <div>
                        <button class="update_btn">Update</button>
                    </div>
                </div>

                </form>

        </div>

        @include('admin.footer')
  </body>
</html>

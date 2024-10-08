<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')

    <style type="text/css">

    .title{
        color: white;
        padding-top:25px;
        font-size:25px;
    }
    label{
        display: inline-block;
        width: 200px;
    }

    </style>

  </head>
  <body>

    @include('admin.sidebar')

      <!-- partial -->

      @include('admin.navbar')

        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" aria-hidden="true" data-dismiss="alert">x</button>

                    {{session()->get('message')}}

                </div>

                @endif

            <div class="container" align="center">

                <h1 class="title">Add Product</h1>

                <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                <div style="padding: 15px;">
                    <label>Product Title</label>
                    <input style="color: black;" type="text" name="title" placeholder="Give a product title" required>
                </div>

                <div style="padding: 15px;">
                    <label>Price</label>
                    <input style="color: black;" type="number" name="price" placeholder="Give a price" required>
                </div>

                <div style="padding: 15px;">
                    <label>Description</label>
                    <input style="color: black;" type="text" name="description" placeholder="Give a description" required>
                </div>

                <div style="padding: 15px;">
                    <label>Quantity</label>
                    <input style="color: black;" type="text" name="quantity" placeholder="Product Quantity" required>
                </div>

                <div style="padding: 15px;">

                    <input type="file" name="file">
                </div>

                <div style="padding: 15px;">
                    <input class="btn btn-success" type="submit" >
                </div>

                </form>

            </div>












            </div>
        </div>

    <!-- container-scroller -->

    @include('admin.script')

  </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.css')

</head>

<body>

    @include('admin.sidebar')

    <!-- partial -->

    @include('admin.navbar')

    <!-- partial -->

    <div class="main-panel">
        <div class="content-wrapper">

            @if (session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" aria-hidden="true" data-dismiss="alert">x</button>

                    {{ session()->get('message') }}

                </div>
            @endif

            <div align="center" style="padding-bottom: 30px;">

                <table>

                    <tr style="background-color: gray">
                        <th style="padding: 20px;">Title</th>
                        <th style="padding: 20px;">Description</th>
                        <th style="padding: 20px;">Quantity</th>
                        <th style="padding: 20px;">Price</th>
                        <th style="padding: 20px;">Image</th>
                        <th style="padding: 20px;">Update</th>
                        <th style="padding: 20px;">Delete</th>
                    </tr>

                    @foreach ($data as $product)
                        <tr align="center" style="background-color:brown">
                            <td style="padding: 20px;">{{ $product->title }}</td>
                            <td style="padding: 20px;">{{ $product->description }}</td>
                            <td style="padding: 20px;">{{ $product->quantity }}</td>
                            <td style="padding: 20px;">{{ $product->price }}</td>
                            <td>
                                <img style="height: 150px;width:100px;" src="/productimage/{{ $product->image }}">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('update_view',$product->id) }}">Update</a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are You Sure to delete this?')" class="btn btn-danger" href="{{ url('delete_product', $product->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </table>

            </div>













        </div>
    </div>

    <!-- container-scroller -->

    @include('admin.script')

</body>

</html>

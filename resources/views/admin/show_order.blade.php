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

                <div class="container" align="center">

                    <table>

                        <tr style="background-color: gray;">
                            <th style="padding: 20px;">Customer name</th>
                            <th style="padding: 20px;">Phone</th>
                            <th style="padding: 20px;">Address</th>
                            <th style="padding: 20px;">Product Title</th>
                            <th style="padding: 20px;">Price</th>
                            <th style="padding: 20px;">Quantity</th>
                            <th style="padding: 20px;">Status</th>
                            <th style="padding: 20px;">Action</th>
                        </tr>

                        @foreach ($order as $order)

                        <tr align="center" style="background-color: rgb(83, 12, 12)">
                            <td style="padding: 20px;">{{$order->name}}</td>
                            <td style="padding: 20px;">{{$order->phone}}</td>
                            <td style="padding: 20px;">{{$order->address}}</td>
                            <td style="padding: 20px;">{{$order->product_name}}</td>
                            <td style="padding: 20px;">{{$order->price}}</td>
                            <td style="padding: 20px;">{{$order->quantity}}</td>
                            <td style="padding: 20px;">{{$order->status}}</td>
                            <td style="padding: 20px;">
                                <a class="btn btn-success" href="{{url('update_status',$order->id)}}">Delivered</a>
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

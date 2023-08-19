<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>
    <div class="container-scroller">
    @include("admin.navbar")

     <div class="container">
    <h1>Orders</h1>

    <form action="{{ url('/search') }}" method="get" align="center">

        @csrf

        <input type="text" name="search" style="color:tomato">

        <input type="submit" value="Search" class="btn btn-success">
    </form>
        
    <table style="margin-top: 50px;" align="left">
        <tr bgcolor="grey" align="center">
            <td style="padding:20px;">Name</td>
            <td style="padding:20px;">Phone</td>
            <td style="padding:20px;">Address</td>
            <td style="padding:20px;">Food Name</td>
            <td style="padding:20px;">Price</td>
            <td style="padding:20px;">Quantity</td>
            <td style="padding:20px;">Total Price</td>
        </tr>

        @foreach ($data as $data)
            
        
        <tr bgcolor="tomato" align="center">
            <td style="padding:20px;">{{ $data->name }}</td>
            <td style="padding:20px;">{{ $data->phone }}</td>
            <td style="padding:20px;">{{ $data->address }}</td>
            <td style="padding:20px;">{{ $data->foodname }}</td>
            <td style="padding:20px;">{{ $data->price }} Ks</td>
            <td style="padding:20px;">{{ $data->quantity }}</td>
            <td style="padding:20px;">{{ $data->price * $data->quantity }} Ks</td>
        </tr>
        @endforeach
    </table>

</div>
</div>
    @include("admin.adminscript")
  </body>
</html>


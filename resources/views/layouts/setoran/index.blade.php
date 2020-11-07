@extends('publik.layouts.app')

@section('content')

@extends('publik.layouts.app')

@section('content')

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        @foreach($setoran as $str)
        <tr>
          <th scope="row">1</th>
          <td>{{$str->jumlah_setoran}}</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
    </tbody>
</table>      


@endsection

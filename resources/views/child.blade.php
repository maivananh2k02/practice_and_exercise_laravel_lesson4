<?php $customers = [
    '0' => [
        'id' => 1,
        'name' => 'customer1',
        'bod' => '1998-09-01',
        'email' => 'customer1@gmail.com'
    ],

    '1' => [
        'id' => 2,
        'name' => 'customer2',
        'bod' => '1998-09-01',
        'email' => 'customer2@gmail.com'
    ],

    '2' => [
        'id' => 3,
        'name' => 'customer3',
        'bod' => '1998-09-01',
        'email' => 'customer3@gmail.com'
    ]
]; ?>
@extends('master')
@section('content')
    @if(count($customers) == 0)
        <tr>
            <td colspan="4">Không có dữ liệu</td>
        </tr>
    @else
        @foreach($customers as $key => $customer)
            <tr>
                <th scope="row">{{ ++$key }}</th>
                <td>{{ $customer['name'] }}</td>
                <td>{{ $customer['bod'] }}</td>
                <td>{{ $customer['email'] }}</td>
            </tr>
        @endforeach
    @endif
@endsection


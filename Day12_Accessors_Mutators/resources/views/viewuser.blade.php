@extends('layout')

@section('title')
    User Details
@endsection

@section('content')
<table class="tbale tbale-striped tbale-bordered">
    <tr>
        <th width="80px">Name :</th>
        <td>{{ $users->user_name }}</td>
    </tr>
    <tr>
        <th>Email :</th>
        <td>{{ $users->email }}</td>
    </tr>
    <tr>
        <th>Salary :</th>
        <td>{{ $users->salary }}</td>
    </tr>
    <tr>
        <th>Date of Birth :</th>
        <td>{{ $users->dob }}</td>
    </tr>
</table>
<a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
@endsection
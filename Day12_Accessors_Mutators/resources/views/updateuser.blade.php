@extends('layout')

@section('title')
    Update User Data
@endsection

@section('content')
<form action="{{ route('user.update', $users->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" value="{{ $users->user_name }}" class="form-control" name="username">
    </div>
    <div class="mb-3">
        <label for="useremail" class="form-label">User Email</label>
        <input type="text" value="{{ $users->email }}" class="form-control" name="useremail">
    </div>
    <div class="mb-3">
        <label for="usersalary" class="form-label">User Salary</label>
        <input type="number" value="{{ $users->salary }}" class="form-control" name="usersalary">
    </div>
    <div class="mb-3">
        <label for="userdob" class="form-label">User DOB</label>
        <input type="text" value="{{ $users->dob }}" class="form-control" name="userdob">
    </div>
    <div class="mb-3">
        <label for="userpass" class="form-label">User Password</label>
        <input type="text" class="form-control" name="userpass">
    </div>
    <div class="mb-3">
        <input type="submit" value="save" class="btn btn-success">
    </div>
</form>
@endsection
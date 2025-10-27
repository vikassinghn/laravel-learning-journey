@extends('layouts.masterlayout')

@section('content')
    <h2>Home Page</h2>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. At, ipsum. Expedita totam facilis, non quisquam nam repudiandae ea eum ipsum omnis quae optio voluptate! Distinctio doloremque officiis quo dicta eligendi veniam, assumenda aperiam cupiditate sapiente mollitia animi laudantium possimus odit, adipisci eum perferendis iusto ipsa voluptatibus cum, quam expedita voluptates aliquam numquam? Numquam, asperiores. Temporibus, accusamus odit! Dolores quod praesentium excepturi dolorem ipsum repellendus! Velit similique quod debitis quis sequi minus necessitatibus quia voluptatibus tempore iure itaque ullam, ab numquam, expedita molestias dicta. A et, quia maxime qui inventore optio quae doloremque, veniam nostrum in praesentium neque repudiandae, aperiam delectus!</p>
@endsection

@section('title')
    Home
@endsection

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
    
@endsection


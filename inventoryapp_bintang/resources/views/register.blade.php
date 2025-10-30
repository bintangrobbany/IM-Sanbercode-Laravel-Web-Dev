@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>
    <form action="/welcome" method="post">
        @csrf
        <label>First name</label><br>
        <input type="text" name="firstname" required maxlength="25"><br><br>
        <label>Last Name</label><br>
        <input type="text" name="lastname" required maxlength="25"><br><br>
        <label>Gender : </label><br>
        <input type="radio" name="gender" value="male">male<br>
        <input type="radio" name="gender" value="female">Female<br>
        <input type="radio" name="gender" value="other">Other<br><br>
        <label>Nationality : </label><br>
        <select id="nationality" name="nationality">
            <option value="indonesian">Indonesian</option>
            <option value="singaporean">Singaporean</option>
            <option value="malaysian">Malaysian</option>
            <option value="australian">Australian</option>
        </select><br><br>
        <label>Language Spoken :</label><br>
        <input type="checkbox">Bahasa Indonesia<br>
        <input type="checkbox">English<br>
        <input type="checkbox">Other<br><br>
        <label>Bio :</label><br>
        <textarea name="bio" rows="10" cols="30"></textarea><br>
        <input type="submit" value="Sign Up"><br><br>
    </form>
    <a href="/">Kembali</a>
@endsection
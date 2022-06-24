@extends('layout')
@section('main_content')
<body>
    <h1>Поиск событий в базе СКУД<h1>
        <div id="wrapper" ><br><br><br><br><br><br><br>

        <form  method="get" action="{{ route ('search') }}" >

        <label for="name">Укажите ФИО:</label> <br>
      <input  type="text" id ="lastName" name="lastName" placeholder="Фамилия" style="width:60%" > <br>
      <label for="name"></label>
      <input  type="text" id ="firstName" name="firstName" placeholder="Имя" style="width:60%" > <br>
      <label for="name"></label>
      <input  type="text" id ="middleName" name="middleName"placeholder="Отчество" style="width:60%" > <br>
      <br>
      
    <label for="party">Укажите временной промежуток события:</label><br>

    <input id="starDate" type="datetime-local" name="startDate"
           min="2006-01-01T00:00" style="width:30%"
           pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
    <input id="endDate" type="datetime-local" name="endDate"
           min="2006-01-01T08:30" style="width:30%"
           pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
    <br><br> 

    <input  type="submit" name="submit" value="Search"> 

    </form> 
    <div>
  </body> 
  @endsection
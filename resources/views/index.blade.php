<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/resources/views/todo.reset.css"> 
  <style>
    .container{
      background-color:#2d197c;
      position:relative;
      width:100vw;
      height:100vh;
    }

    .card{
      background-color:#fff;
      width:50vw;
      padding:30px;
      position:absolute;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      border-radius:10px;
    }


    .card_header{
      display:flex;
      justify-content:space-between;
    }

    .card_header-logout{
      display:flex;
      justify-content:space-between;
      align-items:center;
    }

    .user-name{
      margin-right:10px;
      font-size:16px;
    }

    .botton-logout{
      border: 2px solid #FF0000;
      color: #FF0000;
      background-color: #fff;
      text-align: left;
      font-size: 12px;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .button-search{
      display: inline-block;
      border: 2px solid #cdf119;
      color: #cdf119;
      text-decoration: none;
      margin-bottom: 10px;
      text-align: left;
      font-size: 12px;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .todo-create{
      display:flex;
      justify-content:space-between;
    }
    


    .title{
      font-weight:bold;
      font-size:24px;
      margin-bottom:15px;
    }

    .input-add{
      width:80%;
      padding:5px;
      border-radius:5px;
      border:1px solid #ccc;
      appearance:none;
      font-size:14px;
      outline:none;
    }

    tr{
      height:50px;
    }

    .select-tag{
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-size: 14px;
      outline: none;
    }

    .button-add{
      text-align:left;
      border:2px solid #dc70fa;
      font-size:12px;
      color:#dc70fa;
      background-color:#fff;
      font-weight:bold;
      padding:8px 16px;
      border-radius:5px;
      cursor:pointer;
      transition:0.4s;
      outline:none;
    }
    
    table{
      text-align:center;
      width:100%;
    }

    .input-update{
      width:90%;
      padding:5px;
      border-radius:5px;
      border:1px solid #ccc;
      appearance:none;
      font-size:14px;
      outline:none;
    }

    .button-update{
      text-align: left;
      border: 2px solid #fa9770;
      font-size: 12px;
      color: #fa9770;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }


    .button-delete{
      text-align: left;
      border: 2px solid #71fadc;
      font-size: 12px;
      color: #71fadc;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    body{
      margin:0;
      padding:0;
    }

    p{
      margin:0;
      padding:0;
    }

    






  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      
      <div class="card_header">
        <p class="title">Todo List</p>
        <div class="card_header-logout">
          <p class="user-name">???{{$user->name}}?????????????????????</P>
          <form action="/login" method="post">
            <input class="botton-logout" type=submit value="???????????????">
          </form>
        </div>
      </div>
      
      <a class="button-search" href="/todos/find">???????????????</a>


      <div class="inner">
        <form action="/todos/create" class="todo-create" method="post">
        @csrf
          @error('content')
          <p>{{$message}}</p>
          @enderror
          <input type="text" class="input-add" name="content">


          <select name="tag_id" class="select-tag">
            @foreach($tags as $tag)
              <option value="{{$tag->id}}">
              {{$tag->tag}}</option>
            @endforeach
          </select>
          <input class="button-add" type="submit" value="??????">
        </form>


        
        <table>
          <tr>
            <th>?????????</th>
            <th>????????????</th>
            <th>??????</th>
            <th>??????</th>
            <th>??????</th>
          </tr>
          @foreach ($todos as $todo)
          <form action="/todos/update" method="post">
            @csrf
            <tr>
              <td>{{$todo->created_at}}</td>
                
              <td><input type="text" class="input-update" value="{{$todo->content}}" name="content"></td>





              <td><select name="tag_id" class="select-tag">
                @foreach($tags as $tag)

                @if($todo->tag_id === $tag->id)
                return 'selected';
                else
                return '';
                <option value="{{$tag->id}}">{{$tag->tag}}</option>
                @endif

                @endforeach
                </select>
              </td>







              <input type="hidden" name="id" value="{{$todo->id}}">
              <input type="hidden" name="name_id" value="{{$todo->name_id}}">
              <td><input class="button-update" type="submit" value="??????"></td>
              <td><input class="button-delete" type="submit" value="??????" formaction="/todos/delete"></td>
            </tr>
          </form>
          @endforeach

        </table>
        
      </div>
    </div>
  </div>
</body>
</html>
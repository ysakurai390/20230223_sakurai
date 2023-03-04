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


    .todo-search{
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

    .butoon-back{
      border: 2px solid #6d7170;
      color: #6d7170;
      background-color: #fff;
      text-decoration: none;
      text-align: left;
      font-size: 12px;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }
    
    






  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      
      <div class="card_header">
        <p class="title">タスク検索</p>
        <div class="card_header-logout">
          <p class="user-name">「{{$user -> name}}」でログイン中</P>
          <form action="/login" method="post">
            <input class="botton-logout" type=submit value="ログアウト">
          </form>
        </div>
      </div>
    


      <div class="inner">
        
        <form action="/todos/search" class="todo-search" method="get">
        @csrf

          @error('content')
          <p>{{$message}}</p>
          @enderror

          <input type="text" class="input-add" name="content">

          

          <select name="tag_id" class="select-tag">
            <option value="0"></option>
            <option value="1">家事</option>
            <option value="2">勉強</option>
            <option value="3">運動</option>
            <option value="4">食事</option>
            <option value="5">移動</option>
          </select>

          <input class="button-add" type="submit" value="検索">
        </form>


        
        <table>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>タグ</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
          
          
          @if (@isset($todos))
          @foreach($todos as $todo)
          <form action="/todos/search" method="get">
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

              <td><input class="button-update" type="submit" value="更新" formaction="/todos/update"></td>

              <td><input class="button-delete" type="submit" value="削除" formaction="/todos/delete"></td>

            </tr>
          </form>
          @endforeach
          @endif
          
          
          
          
          
          

        </table>
        <a class="butoon-back" href="/">戻る</a>
        
      </div>
      
    </div>
    
  </div>
  
</body>
</html>
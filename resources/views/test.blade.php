<form action="{{route('post-mail')}}" method="POST">
    <input type="email" name="email"><br>
    <input type="text" name="name"><br>
    <input type="text" name="subject"><br>
    <input type="text" name="content"><br>
    <input type="text" name="_token" value="{{csrf_token()}}">
    <input type="submit" value="Vai caralho">
</form>

<h1>{{title}}</h1>

<hr>

<a href="{{URL}}/admin/users">
    <button type="button" class="btn btn-warning">Back</button>
</a>

<hr>

{{status}}

<form method="post">
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="name" class="form-control" value="{{name}}" required>
    </div>

    <div class="form-group mt-3">
        <label>Email</label>
        <input type="mail" name="mail" class="form-control" value="{{mail}}" required>        
    </div>
    
    <div class="form-group mt-3">
        <label>Senha</label>
        <input type="password" name="pass" class="form-control" value="">        
    </div>
    
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-success">Send</button>
    </div>
</form>
<h1>{{title}}</h1>

<hr>

<a href="{{URL}}/admin/testimonies">
    <button type="button" class="btn btn-warning">Back</button>
</a>

<hr>

<form method="post">
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{nome}}" required>
    </div>

    <div class="form-group mt-3">
        <label>Mensagem</label>
        <textarea name="mensagem" class="form-control" rows="5" required>{{mensagem}}</textarea>
    </div>
    
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-success">Send</button>
    </div>
</form>
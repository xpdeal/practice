<h1>Excluir Usuario</h1>

<hr>

<a href="{{URL}}/admin/testimonies">
    <button type="button" class="btn btn-warning">Back</button>
</a>
<hr>

<form method="post">
    <div class="form-group">
    Deseja realmente exluir o usuário <b>{{nome}}</b>
     "" <b>{{mensagem}}</b>?
    </div>
    
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-danger">Delete</button>
    </div>
</form>
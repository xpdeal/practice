<h1>Usuarios</h1>
<p>Usuarios Com acesso ao painel</p>

<hr>

<a href="{{URL}}/admin/users/new">
    <button type="button" class="btn btn-success">Cadastrar Usuario</button>
</a>

<hr>

{{status}}

<table class="table table-light table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th> Nome</th>
            <th>Email</th>            
            <th style="width: 200px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        {{itens}}
    </tbody>
</table>

{{pagination}}
<h1>Depoimentos</h1>
<p>Depoimentos dos usuários</p>

<hr>

<a href="{{URL}}/admin/testimonies/new">
    <button type="button" class="btn btn-success">Cadastrar Depoimentos</button>
</a>

<hr>

<table class="table table-light table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th style="width: 200px;">Nome</th>
            <th>Texto</th>
            <th>Data</th>
            <th style="width: 200px;">Ações</th>
        </tr>
    </thead>
    <tbody>
        {{itens}}
    </tbody>
</table>

{{pagination}}
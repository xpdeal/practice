<div class="container d-flex justify-content-center">
    <h1>{{titulo}}</h1>
    <br />
</div>
<div class="form-group col-md-6 offset-md-3">
    <form method="post" action="">
        <table class="table table-striped" id="example">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Action</th>
                    <th scope="col">Select</th>
                </tr>
            </thead>
            <tbody>
                {{list}}
            </tbody>
        </table>
        <input type="submit" class="btn btn-xs btn-danger" name="submit" value="Deletar">
    </form>
</div>
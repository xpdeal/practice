    <h1>Depoimentos </h1>
    <hr>

    {{itens}}
    
    {{pagination}}
    <hr>

    <section id="form">
        <h3> Envie seu depoimento</h3>
        <form method="post" action="?page=1">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="form-group">
                <label>Mensagem</label>
                <textarea class="form-control" rows="5" name="mensagem" required></textarea>
            </div>
            <div class="form-group mt-3">                
                <button type="submit" class="btn btn-success" >Enviar</button>
            </div>

        </form>
    </section>
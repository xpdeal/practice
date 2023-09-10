<div class="d-flex justify-content-center">
    <div class="card mt-3 mx-15 text-dark text-center" style="width: 500px;">
        <div class="card-header">
            <h1>Login</h1>
        </div>
        
        <div class="card-body">
            {{status}}
            <form method="post" class="">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="mail" class="form-control" name="mail" placeholder="Enter your e-mail" required autofocus>
                </div>
                
                <div class="form-group my-3">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="pass" placeholder="Enter your password" required>
                </div>
                
                <button type="submit" class="btn btn-lg btn-info">Enter</button> 
            </form>
        </div>
    </div>
</div>
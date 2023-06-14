<?= $this->include('layouts/header') ?>
<div class="container">
    <div class="login-form">
        <h2 class="text-center">Cyber Labs</h2>
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?= old('email') ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>        
    </div>
</div>
<?= $this->include('layouts/footer') ?>
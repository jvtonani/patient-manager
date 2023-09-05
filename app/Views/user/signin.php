<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Faça o login com o GitHub</h1>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($show_auth_error)) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $show_auth_error; ?>
                        </div>
                        <?php
                    }
                    if (session()->has('user')) {
                        redirect('/');
                    } else {
                        echo '<a href="' . $github_login_url . '" class="btn btn-primary btn-block">Login com GitHub</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

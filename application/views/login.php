<html>

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <style>
        .card-body {
            border-radius: 10px;

        }

        .card {
            margin-left: auto;
            margin-top: 100px;
            width: 300px;
            border-radius: 10px;

        }

        .marginleftbutton {
            margin-left: 28%;
        }

        .form-group {
            margin-bottom: 10px;

        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="col-md-7">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2" style="text-align:center;">Přihlášení</h4>
                    </header>
                    <article class="card-body">
                        <?php echo form_open('loginAuth'); ?>

                        <div class="form-group">
                            <input type="username" name="identity" class="form-control" placeholder="Uživatelské jméno">
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="password" type="password" placeholder="Heslo">
                        </div>

                        <br></br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block marginleftbutton"> Přihlásit </button>
                        </div>
                        <?php echo form_close(); ?>
                    </article>
                </div>
            </div>

        </div>

    </div>
    </div>


</body>

</html>
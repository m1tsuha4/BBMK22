<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets3/css/style.css" />
    <link rel="icon" href="../assets/img/logo-icon.jpg" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>Login Admin</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.html">
                <img src="<?= base_url(); ?>assets3/img/unand.png" alt="" width="40" height="40" />
                <img src="<?= base_url(); ?>assets3/img/bbmk.png" alt="" width="180" height="35" />
            </a>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container form-container form-container-login">
        <div class="row align-items-start">
            <div class="col-md-4 form-login">
                <form class="form-group" action="" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <h4>BBMK 2021</h4>
                    <p>Halo Admin!</p>
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control form-control-sm" id="floatingInput" placeholder="Username" />
                        <label for="floatingInput" class="form-label">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control form-control-sm" id="floatingPassword" placeholder="Password" />
                        <label for="floatingPassword" class="form-label">Password</label>
                    </div>
                    <button type="submit" name="login" class="btn btnForm">
                        Masuk
                    </button>
                </form>
            </div>
            <div class="col-md-8 img-form text-center">
                <img src="<?= base_url(); ?>assets3/img/form.png" alt="Form" />
            </div>
        </div>
    </div>
</body>

</html>
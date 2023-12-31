<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an account</h2>
                <p>Please fill out form to create an account</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg
                        <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'];?>"/>
                        <span class="invalid-feedback"><?php echo $data['name_error'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg
                        <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email'];?>"/>
                        <span class="invalid-feedback"><?php echo $data['email_error'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg
                        <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password'];?>"/>
                        <span class="invalid-feedback"><?php echo $data['password_error'];?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password: <sup>*</sup></label>
                        <input type="password" name="confirmPassword" class="form-control form-control-lg
                        <?php echo (!empty($data['confirm_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirmPassword'];?>"/>
                        <span class="invalid-feedback"><?php echo $data['confirm_error'];?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-success btn-block" value="register">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
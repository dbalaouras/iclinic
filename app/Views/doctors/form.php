<?= \Config\Services::validation()->listErrors(); ?>
<div class="card">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Προσθήκη
    </div>
    <div class="card-body">
        <form action="<?= $form_action; ?>" method="post">
            <div class="form-group row">
                <label for="amka" class="col-sm-2 col-form-label">ΑΜΚΑ</label>
                <div class="col-sm-6">
                    <?php
                    if ($is_new) {
                    ?>
                        <input type="input" class="form-control" id="amka" required="true" name="amka" maxlength="10" value="<?= esc($doctor['amka']); ?>">
                    <?php
                    } else {
                    ?>
                        <input type="text" readonly class="form-control-plaintext" required="true" id="amka" name="amka" maxlength="10" value="<?= esc($doctor['amka']); ?>">
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label">Όνομα</label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="first_name" required="true" name="first_name" value="<?= esc($doctor['first_name']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Επώνυμο</label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="last_name" required="true" name="last_name" value="<?= esc($doctor['last_name']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Έτος Γέννησης</label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="year_of_birth" required="true" name="year_of_birth" value="<?= esc($doctor['year_of_birth']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="speciality" class="col-sm-2 col-form-label">Ειδικότητα</label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="speciality" required="true" name="speciality" value="<?= esc($doctor['speciality']); ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Αποθήκευση</button>
        </form>
    </div>
</div>
<?= \Config\Services::validation()->listErrors(); ?>
<div class="card">
    <div class="card-body">
        <form action="<?= $form_action; ?>" method="post">
            <div class="form-group row">
                <label for="amka" class="col-sm-2 col-form-label">ΑΜΚΑ</label>
                <div class="col-sm-6">
                    <?php
                    if ($is_new) {
                    ?>
                        <input type="input" class="form-control" id="amka" name="amka" value="<?= esc($patient['amka']); ?>">
                    <?php
                    } else {
                    ?>
                        <input type="text" readonly class="form-control-plaintext" id="amka" name="amka" value="<?= esc($patient['amka']); ?>">
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label">Όνομα</label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="first_name" name="first_name" value="<?= esc($patient['first_name']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Επώνυμο</label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="last_name" name="last_name" value="<?= esc($patient['last_name']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Έτος Γέννησης</label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="year_of_birth" name="year_of_birth" value="<?= esc($patient['year_of_birth']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="allergies" class="col-sm-2 col-form-label">Αλλεργίες</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="allergies"><?= esc($patient['allergies']); ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Ενημέρωση στοιχείων</button>
        </form>
    </div>
</div>
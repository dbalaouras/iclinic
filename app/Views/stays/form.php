<?= \Config\Services::validation()->listErrors(); ?>
<div class="card">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Προσθήκη
    </div>
    <div class="card-body">
        <form action="<?= $form_action; ?>" method="post">
            <?php
            if (!$is_new) {
            ?>
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Α/Α</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" required="true" id="id" name="id" value="<?= esc($stay['id']); ?>">
                    </div>
                </div>
            <?php } ?>
            <div class="form-group row">
                <label for="patient_amka" class="col-sm-2 col-form-label">Ασθενής</label>
                <div class="col-sm-6">
                    <select name="patient_amka" class="custom-select" required="true">
                        <option value="">Επιλέξτε ασθενή</option>
                        <?php foreach ($patients as $patient) : ?>
                            <option <?php echo $patient['amka'] == $stay['patient_amka'] ? 'selected' : ''; ?> value="<?= $patient['amka'] ?>"><?= $patient['first_name'] . ' ' . $patient['last_name'] . ' (ΑΜΚΑ: ' . $patient['amka'] . ')' ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="start_datetime" class="col-sm-2 col-form-label">Ημερομηνία εισαγωγής</label>
                <div class="col-sm-6">
                    <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime" required="true" value="<?= esc($stay['start_datetime_iso8601']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="end_datetime" class="col-sm-2 col-form-label">Ημερομηνία εξαγωγής</label>
                <div class="col-sm-6">
                    <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime" value="<?= esc($stay['end_datetime_iso8601']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="exit_notes" class="col-sm-2 col-form-label">Σημειώσεις</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="exit_notes"><?= esc($stay['exit_notes']); ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Αποθήκευση</button>
        </form>
    </div>
</div>
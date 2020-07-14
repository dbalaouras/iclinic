<?= \Config\Services::validation()->listErrors(); ?>
<div class="card">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Προσθήκη
    </div>
    <div class="card-body">
        <form action="/exams/create" method="post">
            <?php
            if (!$is_new) {
            ?>
                <div class="form-group row">
                    <label for="code" class="col-sm-2 col-form-label">Α/Α</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" id="id" name="id" value="<?= esc($exam['id']); ?>">
                    </div>
                </div>
            <?php } ?>
            <div class="form-group row">
                <label for="code" class="col-sm-2 col-form-label">Κωδικός Εξέτασης</label>
                <div class="col-sm-6">
                    <input type="input" class="form-control" id="code" name="code" required="true" value="<?= esc($exam['code']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="patient_amka" class="col-sm-2 col-form-label">Ασθενής</label>
                <div class="col-sm-6">
                    <select name="patient_amka" class="custom-select">
                        <option value="">Επιλέξτε ασθενή</option>
                        <?php foreach ($patients as $patient) : ?>
                            <option <?php echo $patient['amka'] == $exam['patient_amka'] ? 'selected' : ''; ?> value="<?= $patient['amka'] ?>"><?= $patient['first_name'] . ' ' . $patient['last_name'] . ' (ΑΜΚΑ: ' . $patient['amka'] . ')' ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="scheduled_date" class="col-sm-2 col-form-label">Ημερομηνία</label>
                <div class="col-sm-6">
                    <input type="datetime-local" class="form-control" id="scheduled_date" name="scheduled_date" required="true" value="<?= esc($exam['scheduled_date_iso8601']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Κατάσταση</label>
                <div class="col-sm-6">
                    <select name="status" class="custom-select">
                        <option selected value="Νέα">Νέα</option>
                        <option value="Πραγματοποιήθηκε">Πραγματοποιήθηκε</option>
                        <option value="Ακυρώθηκε">Ακυρώθηκε</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Καταχώρηση εξέτασης</button>
        </form>
    </div>
</div>
<?php if (!empty($operations) && is_array($operations)) : ?>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Eξετάσεις
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ασθενής</th>
                            <th>Χειρουργείο</th>
                            <th>Ιατρός</th>
                            <th>Ημερομηνία</th>
                            <th>Κατάσταση</th>
                            <th>Διαχείρηση</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($operations as $operation) : ?>
                            <tr>
                                <td><?= esc($operation['patient_amka']); ?></td>
                                <td><?= esc($operation['code']); ?></td>
                                <td><?= esc($operation['primary_doctor_amka']); ?></td>
                                <td><?= esc($operation['scheduled_date']); ?></td>
                                <td><?= esc($operation['status']); ?></td>
                                <td><a href="/operations/<?= esc($operation['id'], 'url'); ?>">Επεξεργασία</a></td>
                            </tr>
                            <p></p>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Καταχωρημένα χειρουργεία
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p>Δεν υπάρχουν καταχωρημένα χειρουργεία.</p>
                <a href="/operations/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Προσθήκη</a>
            </div>
        </div>
    </div>
<?php endif ?>
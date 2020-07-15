<?php if (!empty($operations) && is_array($operations)) : ?>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Προβολή | <a href="/operations/create" class="active" role="button" aria-pressed="true">Προσθήκη</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Κωδικός Χειρουργείου</th>
                            <th>Ασθενής</th>
                            <th>Ιατρός</th>
                            <th>Ημερομηνία</th>
                            <th>Κατάσταση</th>
                            <th>Διαχείρηση</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($operations as $operation) : ?>
                            <tr>
                                <td><?= esc($operation['code']); ?></td>
                                <td><a href="/patients/<?= esc($operation['patient_amka']); ?>"><?= esc($operation['patient_first_name'] . ' ' . $operation['patient_last_name']); ?></a></td>
                                <td><a href="/doctors/<?= esc($operation['lead_doctor_amka']); ?>"><?= esc($operation['doctor_first_name'] . ' ' . $operation['doctor_last_name']); ?></a></td>
                                <td><?= esc($operation['scheduled_date']); ?></td>
                                <td><?= esc($operation['status']); ?></td>
                                <td>
                                    <a href="/operations/<?= esc($operation['id'], 'url'); ?>"><i class="fas fa-edit"></i></a>
                                    <a href="#" data-href="/operations/delete/<?= esc($operation['id'], 'url'); ?>"" data-toggle=" modal" data-target="#confirm-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
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
        <div class="card-body">
            <div class="table-responsive">
                <p>Δεν υπάρχουν καταχωρήσεις</p>
                <a href="/operations/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Προσθήκη</a>
            </div>
        </div>
    </div>
<?php endif ?>
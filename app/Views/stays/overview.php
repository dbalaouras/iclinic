<?php if (!empty($stays) && is_array($stays)) : ?>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Προβολή | <a href="/stays/create" class="active" role="button" aria-pressed="true">Προσθήκη</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ασθενής</th>
                            <th>Ημερομηνία εισαγωγής</th>
                            <th>Ημερομηνία εξαγωγής</th>
                            <th>Σημειώσεις</th>
                            <th>Διαχείρηση</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stays as $stay) : ?>
                            <tr>
                                <td><a href="/patients/<?= esc($stay['patient_amka']); ?>"><?= esc($stay['patient_first_name'] . ' ' . $stay['patient_last_name']); ?></a></td>
                                <td><?= esc($stay['start_datetime']); ?></td>
                                <td><?= esc($stay['end_datetime']); ?></td>
                                <td><?= esc($stay['exit_notes']); ?></td>
                                <td>
                                    <a href="/stays/<?= esc($stay['id'], 'url'); ?>"><i class="fas fa-edit"></i></a>
                                    <a href="#" data-href="/stays/delete/<?= esc($stay['id'], 'url'); ?>"" data-toggle="modal" data-target="#confirm-delete">
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
                <a href="/stays/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Προσθήκη</a>
            </div>
        </div>
    </div>
<?php endif ?>
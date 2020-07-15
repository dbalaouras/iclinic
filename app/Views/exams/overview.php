<?php if (!empty($exams) && is_array($exams)) : ?>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Προβολή | <a href="/exams/create" class="active" role="button" aria-pressed="true">Προσθήκη</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ασθενής</th>
                            <th>Εξέταση</th>
                            <th>Ημερομινία</th>
                            <th>Κατάσταση</th>
                            <th>Διαχείρηση</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($exams as $exam) : ?>
                            <tr>
                                <td><?= esc($exam['patient_amka']); ?></td>
                                <td><?= esc($exam['code']); ?></td>
                                <td><?= esc($exam['scheduled_date']); ?></td>
                                <td><?= esc($exam['status']); ?></td>
                                <td>
                                    <a href="/exams/<?= esc($exam['id'], 'url'); ?>"><i class="fas fa-edit"></i></a>
                                    <a href="#" data-href="/exams/delete/<?= esc($exam['id'], 'url'); ?>"" data-toggle="modal" data-target="#confirm-delete">
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
                <a href="/exams/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Προσθήκη</a>
            </div>
        </div>
    </div>
<?php endif ?>
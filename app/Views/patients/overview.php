<?php if (!empty($patients) && is_array($patients)) : ?>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Προβολή | 
            <a href="/patients/create" class="active" role="button" aria-pressed="true">Προσθήκη</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ΑΜΚΑ</th>
                            <th>Όνομα</th>
                            <th>Επώνυμο</th>
                            <th>Έτος Γέννησης</th>
                            <th>Διαχείρηση</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($patients as $patient) : ?>
                            <tr>
                                <td><?= esc($patient['amka']); ?></td>
                                <td><?= esc($patient['first_name']); ?></td>
                                <td><?= esc($patient['last_name']); ?></td>
                                <td><?= esc($patient['year_of_birth']); ?></td>
                                <td><a href="/patients/<?= esc($patient['amka'], 'url'); ?>">Επεξεργασία</a></td>
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
                <a href="/patients/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Προσθήκη</a>
            </div>
        </div>
    </div>
<?php endif ?>
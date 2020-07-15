<?php if (!empty($doctors) && is_array($doctors)) : ?>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Προβολή | <a href="/doctors/create" class="active" role="button" aria-pressed="true">Προσθήκη</a>
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
                            <th>Ειδικότητα</th>
                            <th>Διαχείρηση</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($doctors as $doctor) : ?>
                            <tr>
                                <td><?= esc($doctor['amka']); ?></td>
                                <td><?= esc($doctor['first_name']); ?></td>
                                <td><?= esc($doctor['last_name']); ?></td>
                                <td><?= esc($doctor['year_of_birth']); ?></td>
                                <td><?= esc($doctor['speciality']); ?></td>
                                <td>
                                    <a href="/doctors/<?= esc($doctor['amka'], 'url'); ?>"><i class="fas fa-edit"></i></a>
                                    <a href="#" data-href="/doctors/delete/<?= esc($doctor['amka'], 'url'); ?>"" data-toggle="modal" data-target="#confirm-delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="/operations/?lead_doctor_amka=<?= esc($doctor['amka'], 'url'); ?>">
                                        <i class="fas fa-procedures"></i>
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
                <a href="/doctors/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Προσθήκη</a>
            </div>
        </div>
    </div>
<?php endif ?>
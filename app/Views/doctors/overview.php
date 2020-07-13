<?php if (!empty($doctors) && is_array($doctors)) : ?>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Ιατρικό Προσωπικό
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
                                <td><a href="/doctors/<?= esc($doctor['amka'], 'url'); ?>">Επεξεργασία</a></td>
                            </tr>
                            <p></p>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else : ?>

    <h3>Δεν υπάρχουν ιατροί στο σύστημα</h3>

<?php endif ?>
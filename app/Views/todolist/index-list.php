<div class="mb-2">
    <strong class="fw-medium">List kegiatan</strong> -
    <small><?= date('l, d-m-Y') ?></small>
</div>
<?php if(empty($datatodolist)): ?>
    <div>
        <small class="form-text">Kosong</small>
    </div>
<?php endif; ?>
<ul>
    <?php foreach ($datatodolist as $row) : ?>
    <li class="mb-2">
        <div class="lh-1 mb-2">
            <strong class="fw-medium"><?= $row['title'] ?></strong>
            <div>
                <small class="form-text"><?= $row['deskripsi'] ?></small>
            </div>
        </div>
        <div>
            <a href="<?= base_url('todolist/update/'.$row['slug']) ?>" class="badge text-bg-primary"><i
                    class="fa-solid fa-pen"></i></a> <a
                href="<?= base_url('todolist/hapus/'.$row['slug']) ?>" class="badge text-bg-danger"
                onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">LIST VIDEO</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-xl-12 col-xxl-12">
    <table class="mt-2 hover" id="table-pertanyaan-all" style="width:100%">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- tr-nya dibuat foreach khusus user ini aja -->
            <?php foreach ($all_video as $p) : ?>
                <tr>
                    <td>
                        <div class="row mb-4">
                            <!-- detail tanya ke spesifik pertanyaannya -->
                            <a href="<?= $p['link_video']; ?>" target="_blank">
                                <div class="card flex-fill w-100">
                                    <div class="row m-3">
                                        <div class="col-4 p-0">
                                            <img src="http://img.youtube.com/vi/<?= $p['thumbnail_video']; ?>/mqdefault.jpg" class="img-fluid" alt="...">
                                        </div>
                                        <div class="col-8 p-0">
                                            <h1 class="card-title mb-1 judul-video"><?= $p['judul_video']; ?></h1>
                                            <p class="mb-0"><?= $p['caption_video']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>
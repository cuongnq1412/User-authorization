<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <p class="text-[#0957CB] font-semibold  text-2xl py-4">Danh sách Hội Nhóm</p>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Hội Nhóm </th>
                                    <th>Số Thành Viên </th>
                                    <th>Đia chỉ</th>
                                    <th>Report</th>
                                    <th style="width: 4rem;">Thao Tác</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $stt = 1 ?>
                                <?php foreach ($Groups as $group) : ?>
                                    <tr>
                                        <td><?= $stt ?></td>
                                        <td> <?= $group['name'] ?></td>
                                        <td><?= $group['profile_count'] ?></td>
                                        <td> <?= $group['address'] ?></td>
                                        <td>

                                            <?php if ($group['profile_count'] > 0) { ?>
                                                <a href="<?= BASE_PATH ?>/admin/group/csv?id=<?= $group['id'] ?>"><i
                                                        class="fa-solid fa-file"></i></a>
                                            <?php } else {
                                                echo ' Không Có Dữ Liệu ';
                                            } ?>


                                            <a>
                                                <i class="fa-solid fa-eye" style="color: #FFD43B;"></i>
                                            </a>


                                        </td>

                                        <td>

                                            <a href="<?= BASE_PATH ?>/admin/commune-review/accept?id=<?= $group['id'] ?>"
                                                style="margin-right:10px;"><i class="fa-solid fa-check"
                                                    style="color: #0fef0b;"></i></a>
                                            <a href="<?= BASE_PATH ?>/admin/commune-review/refuse?id=<?= $group['id'] ?>"><i
                                                    class="fa-solid fa-xmark" style="color: #e90707;"></i></a>

                                        </td>


                                    </tr>
                                    <?php $stt++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <script>
                            new DataTable('#example');
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                    <th>Báo Cáo </th>
                                    <th>Trạng Thái</th>
                                    <th style="width: 4rem;">Thao Tác</th>
                                    <th style="width: 4rem;"></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $stt = 1 ?>
                                <?php foreach ($Groups as $group) : ?>
                                <tr>
                                    <td><?= $stt ?></td>
                                    <td> <?= $group['name'] ?></td>
                                    <td><?= $group['profile_count'] ?></td>
                                    <td>
                                        <?php if ($group['profile_count'] > 0) { ?>
                                        <a href="<?= BASE_PATH ?>/admin/group/csv?id=<?= $group['id'] ?>"><i
                                                class="fa-solid fa-file"></i></a>
                                        <?php }else{
                                                    echo ' Không Có Dữ Liệu ';
                                                } ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($group['status'] == 0) {
                                            echo 'Chưa gửi báo cáo cho huyện';
                                        } elseif ($group['status'] == 1) {
                                            echo 'Đã gửi báo cáo cho huyện';
                                        } elseif ($group['status'] == 2) {
                                            echo 'Bị từ chối';
                                        } else {
                                            echo 'Đã xác nhận';
                                        }
                                        ?>

                                    </td>
                                    <td>

                                        <a href="<?= BASE_PATH ?>/admin/group/detail?id=<?= $group['id'] ?>"
                                            style="margin-right:10px;"><i class="fa-solid fa-eye"
                                                style="color: #FFD43B;"></i></a>
                                        <a href="<?= BASE_PATH ?>/admin/group/delete?id=<?= $group['id'] ?>"
                                            onclick="return confirm('Bạn có chắc chắn muốn hội nhóm viết này không?')"><i
                                                class="fa-solid fs-5 fa-trash-can text-danger"></i></a>

                                    </td>
                                    <td>
                                        <?php
                                        if ($group['status'] == 0) { ?>
                                        <a href="<?= BASE_PATH ?>/admin/group/list?id=<?= $group['id'] ?>"
                                            style="margin-right:10px;"> <i class="fa-solid fa-paper-plane"
                                                style="color: #0dfd35;"></i>
                                        </a>

                                        <?php } elseif ($group['status'] == 1) {
                                            echo '<i class="fa-solid fa-hourglass-start" style="color: #FFD43B;"></i>';
                                        } elseif ($group['status'] == 2) {
                                            echo '<i class="fa-solid fa-circle-exclamation" style="color: #ff2f0a;"></i>';
                                        } elseif ($group['status'] == 3) {
                                            echo '<i class="fa-solid fa-circle-check" style="color: #2bff00;"></i>';
                                        }
                                        ?>

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
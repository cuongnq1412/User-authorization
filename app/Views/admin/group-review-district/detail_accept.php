<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <p class="text-[#0957CB] font-semibold  text-2xl py-4">Danh sách Thành viên </p>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>CCCD </th>
                                    <th>Tên</th>
                                    <th>Trạng Thái</th>
                                    <th style="width: 4rem;">Thao Tác</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $stt = 1 ?>
                                <?php foreach ($Groups as $group) : ?>
                                <tr>
                                    <td><?= $stt ?></td>
                                    <td> <?= $group['cccd'] ?></td>
                                    <td><?= $group['name'] ?></td>

                                    <td>
                                        <?php
                                            if ($group['check_approved'] == 0) { ?>
                                        <a href="<?= BASE_PATH ?>/admin/profile/sendDistrict?id=<?= $group['id'] ?>"
                                            style="margin-right:10px;">
                                            <i class="fa-solid fa-paper-plane" style="color: #0dfd35;"></i>
                                        </a>
                                        <?php } elseif ($group['check_approved'] == 1) {
                                                echo '<i class="fa-solid fa-hourglass-start" style="color: #FFD43B;"></i>';
                                            } elseif ($group['check_approved'] == 2) {
                                                echo '<i class="fa-solid fa-circle-exclamation" style="color: #ff2f0a;"></i>';
                                            } elseif ($group['check_approved'] == 3) {
                                                echo '<i class="fa-solid fa-circle-check" style="color: #2bff00;"></i>';
                                            }
                                            ?>


                                    </td>
                                    <div class="modal fade" id="exampleModalCenter<?= $group['id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Profile detail
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item">CCCD : <?= $group['cccd'] ?></li>
                                                        <li class="list-group-item">Tên : <?= $group['name'] ?></li>
                                                        <li class="list-group-item">Sdt : <?= $group['phone'] ?></li>
                                                        <li class="list-group-item">Email : <?= $group['email'] ?></li>
                                                        <li class="list-group-item">Ngày sinh :<?= $group['birthday'] ?>
                                                        </li>
                                                        <li class="list-group-item">Nghề nghiệp :
                                                            <?= $group['occupation'] ?></li>
                                                        <li class="list-group-item">Chức vụ :
                                                            <?= $group['name_position'] ?></li>
                                                        <li class="list-group-item">Đơn vị : <?= $group['name_unit'] ?>
                                                        </li>
                                                        <li class="list-group-item">Địa chỉ : <?= $group['address'] ?>
                                                        </li>
                                                        <li class="list-group-item">trạng thái :
                                                            <?php
                                                                if ($group['check_approved'] == 0) {
                                                                    echo 'Chưa gửi lên huyện';
                                                                } elseif ($group['check_approved'] == 1) {
                                                                    echo 'Đã gửi lên huyện';
                                                                } elseif ($group['check_approved'] == 2) {
                                                                    echo 'Bị từ chối';
                                                                } elseif ($group['check_approved'] == 3) {
                                                                    echo 'Đã xác nhận';
                                                                }
                                                                ?>
                                                        </li>
                                                        <li class="list-group-item">Ngày tạo :
                                                            <?= $group['created_at'] ?></li>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <td>



                                        <a type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalCenter<?= $group['id'] ?>">
                                            <i class="fa-solid fa-eye" style="color: #FFD43B;"></i>
                                        </a>

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
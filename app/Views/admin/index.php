<div class="w-full">
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">




                        <div class="card mt-4" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <h3 class="mb-3"><?php echo $_SESSION['user']['name']; ?></h3>
                                <p class="small mb-0"><i class="fa-solid fa-cake-candles"></i> <span
                                        class="mx-2">|</span>

                                    <strong><?php echo $_SESSION['user']['birthday']; ?></strong>

                                </p>
                                <p class="small mb-0"><i class="fa-solid fa-location-dot"></i><span
                                        class="mx-2">|</span>

                                    <strong><?php echo $_SESSION['user']['address']; ?></strong>

                                </p>
                                <hr class="my-4">
                                <div class="d-flex justify-content-start align-items-center">
                                    <p class="mb-0 ">Nghề Nghiệp : <span
                                            class="text-muted small"><?php echo $_SESSION['user']['occupation']; ?>
                                        </span>
                                    </p>
                                    <p class="mb-0 mx-2 ">Đơn vị : <span
                                            class="text-muted small"><?php echo $_SESSION['user']['name_unit']; ?>
                                        </span>
                                    </p>
                                    <p class="mb-0 ">Chức Vụ : <span
                                            class="text-muted small"><?php echo $_SESSION['user']['name_position']; ?>
                                        </span>
                                    </p>

                                </div>
                            </div>
                        </div>





                        <p class="text-[#0957CB] font-semibold  text-2xl py-4">Thành Viên Của Nhóm
                            <?php echo $_SESSION['user']['name_a']; ?></p>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên </th>
                                    <th> Chức vụ </th>
                                    <th>Nghề Nghiệp</th>
                                    <th>Đơn Vị</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php $stt = 1 ?>
                                <?php foreach ($profiles as $profile) : ?>
                                    <tr>
                                        <td><?= $stt ?></td>
                                        <td> <?= $profile['name'] ?></td>
                                        <td><?= $profile['name_position'] ?></td>
                                        <td><?= $profile['occupation'] ?></td>
                                        <td><?= $profile['name_unit'] ?></td>




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
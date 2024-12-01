<div class="w-full">
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script> -->
    <div class="flex justify-center xl:w-11/13">
        <div class="w-11/12 xl:w-11/13 mt-4 mb-8">
            <div class="w-full bg-white rounded-lg min-h-screen">
                <div class="w-full flex justify-center h-auto">
                    <div class="w-11/12">
                        <div class="title-container flex items-center">
                            <h1 class="text-[#0957CB] font-semibold text-md py-4 h3">Thêm Thành Viên :</h1>
                        </div>
                        <form method="post" enctype="multipart/form-data" class="text-black">
                            <div class="grid md:grid-cols-2 grid-cols-1 md:gap-x-4 md:gap-y-0 gap-4">



                                <!-- CCCD -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="cccd" class="text-black font-semibold pb-1 capitalize">CCCD</label>
                                    <input type="text" id="cccd" class="p-2 border border-[#a5abb5] rounded"
                                        name="cccd">
                                </div>

                                <!-- Name -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="name" class="text-black font-semibold pb-1 capitalize">Tên</label>
                                    <input type="text" id="name" class="p-2 border border-[#a5abb5] rounded"
                                        name="name">
                                </div>

                                <!-- Phone -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="phone" class="text-black font-semibold pb-1 capitalize">Số điện
                                        thoại</label>
                                    <input type="text" id="phone" class="p-2 border border-[#a5abb5] rounded"
                                        name="phone">
                                </div>

                                <!-- Email -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="email" class="text-black font-semibold pb-1 capitalize">Email</label>
                                    <input type="email" id="email" class="p-2 border border-[#a5abb5] rounded"
                                        name="email">
                                </div>

                                <!-- Password -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="password" class="text-black font-semibold pb-1 capitalize">Mật
                                        khẩu</label>
                                    <input type="password" id="password" class="p-2 border border-[#a5abb5] rounded"
                                        name="password">
                                </div>

                                <!-- Birthday -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="birthday" class="text-black font-semibold pb-1 capitalize">Ngày
                                        sinh</label>
                                    <input type="date" id="birthday" class="p-2 border border-[#a5abb5] rounded"
                                        name="birthday">
                                </div>

                                <!-- Occupation -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="occupation" class="text-black font-semibold pb-1 capitalize">Nghề
                                        nghiệp</label>
                                    <input type="text" id="occupation" class="p-2 border border-[#a5abb5] rounded"
                                        name="occupation">
                                </div>

                                <!-- Status -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="status" class="text-black font-semibold pb-1 capitalize">Trạng
                                        thái</label>
                                    <select id="status" class="p-2 border border-[#a5abb5] rounded" name="status">
                                        <option value="hoạt động">Hoạt động</option>
                                        <option value="tạm ngưng">Không hoạt động</option>
                                    </select>
                                </div>

                                <!-- Position -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="position_id" class="text-black font-semibold pb-1 capitalize">Chức
                                        vụ</label>
                                    <select id="position_id" class="p-2 border border-[#a5abb5] rounded"
                                        name="position_id">
                                        <?php foreach ($getPosition as $position) : ?>
                                        <option value="<?= $position['id'] ?>">
                                            <?= $position['name_position'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="w-full flex flex-col py-2">
                                    <label for="association" class="text-black font-semibold pb-1 capitalize">Hội nhóm
                                    </label>
                                    <select id="association" class="p-2 border border-[#a5abb5] rounded"
                                        name="association_id">
                                        <?php foreach ($getAssociation as $association) : ?>
                                        <option value="<?= $association['id'] ?>">
                                            <?= $association['name'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>



                                <!-- Address -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="address_id" class="text-black font-semibold pb-1 capitalize">Địa
                                        chỉ</label>
                                    <input type="text" id="address_id" class="p-2 border border-[#a5abb5] rounded"
                                        name="address">
                                </div>

                                <!-- Unit -->
                                <div class="w-full flex flex-col py-2">
                                    <label for="unit_id" class="text-black font-semibold pb-1 capitalize">Đơn vị</label>
                                    <select id="unit_id" class="p-2 border border-[#a5abb5] rounded" name="unit_id">
                                        <?php foreach ($getUnit as $unit) : ?>
                                        <option value="<?= $unit['id'] ?>">
                                            <?= $unit['name_unit'] ?>
                                        </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>

                                <!-- Created At -->

                            </div>


                            <div class="w-full flex justify-end">
                                <input name="submit" type="submit"
                                    class="hover:text-[#0957CB] bg-[#0957CB] text-white rounded-lg p-3 text-sm font-semibold"
                                    value="Thêm Profile">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>